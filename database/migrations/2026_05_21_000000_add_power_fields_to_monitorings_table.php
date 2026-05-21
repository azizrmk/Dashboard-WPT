<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('monitorings', function (Blueprint $table) {
            $table->decimal('tegangan', 8, 2)->nullable()->after('mode');
            $table->decimal('arus', 8, 2)->nullable()->after('tegangan');
            $table->decimal('daya', 8, 2)->nullable()->after('arus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('monitorings', function (Blueprint $table) {
            $table->dropColumn(['tegangan', 'arus', 'daya']);
        });
    }
};
