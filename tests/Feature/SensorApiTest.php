<?php

namespace Tests\Feature;

use App\Models\Monitoring;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SensorApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_latest_sensor_data_returns_defaults_when_empty(): void
    {
        $response = $this->getJson('/api/latest');

        $response
            ->assertOk()
            ->assertJson([
                'status' => 'offline',
                'is_online' => false,
                'last_seen_seconds' => null,
                'timeout_seconds' => 10,
                'ldr' => 0,
                'lampu' => false,
                'mode' => '-',
                'tegangan' => 0,
                'arus' => 0,
                'daya' => 0,
                'created_at' => null,
            ]);
    }

    public function test_latest_sensor_data_is_online_before_timeout(): void
    {
        Monitoring::forceCreate([
            'ldr' => 512,
            'lampu' => true,
            'mode' => 'AUTO',
            'tegangan' => 12.5,
            'arus' => 0.8,
            'daya' => 10,
            'created_at' => now()->subSeconds(9),
            'updated_at' => now()->subSeconds(9),
        ]);

        $this->getJson('/api/latest')
            ->assertOk()
            ->assertJsonPath('status', 'online')
            ->assertJsonPath('is_online', true)
            ->assertJsonPath('timeout_seconds', 10);
    }

    public function test_latest_sensor_data_is_offline_after_timeout(): void
    {
        Monitoring::forceCreate([
            'ldr' => 512,
            'lampu' => true,
            'mode' => 'AUTO',
            'tegangan' => 12.5,
            'arus' => 0.8,
            'daya' => 10,
            'created_at' => now()->subSeconds(11),
            'updated_at' => now()->subSeconds(11),
        ]);

        $this->getJson('/api/latest')
            ->assertOk()
            ->assertJsonPath('status', 'offline')
            ->assertJsonPath('is_online', false)
            ->assertJsonPath('timeout_seconds', 10)
            ->assertJsonPath('ldr', 0)
            ->assertJsonPath('lampu', false)
            ->assertJsonPath('tegangan', 0)
            ->assertJsonPath('arus', 0)
            ->assertJsonPath('daya', 0);
    }

    public function test_sensor_data_can_be_stored_with_power_values(): void
    {
        $payload = [
            'ldr' => 512,
            'lampu' => true,
            'mode' => 'AUTO',
            'tegangan' => 12.5,
            'arus' => 0.8,
            'daya' => 10,
        ];

        $this->postJson('/api/sensor', $payload)
            ->assertCreated()
            ->assertJsonPath('status', 'success')
            ->assertJsonPath('data.ldr', 512)
            ->assertJsonPath('data.lampu', true)
            ->assertJsonPath('data.mode', 'AUTO')
            ->assertJsonPath('data.tegangan', 12.5)
            ->assertJsonPath('data.arus', 0.8)
            ->assertJsonPath('data.daya', 10);

        $this->assertDatabaseHas('monitorings', [
            'ldr' => 512,
            'lampu' => true,
            'mode' => 'AUTO',
            'tegangan' => 12.5,
            'arus' => 0.8,
            'daya' => 10,
        ]);
    }

    public function test_sensor_data_requires_core_fields(): void
    {
        $this->postJson('/api/sensor', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['ldr', 'lampu', 'mode']);

        $this->assertDatabaseCount(Monitoring::class, 0);
    }
}
