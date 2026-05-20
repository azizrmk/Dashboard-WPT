<!DOCTYPE html>
<html>
<head>

    <title>SMART WPT DASHBOARD</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{

            background:#0f172a;
            color:white;
        }

        .card{

            background:#1e293b;
            border:none;
            border-radius:15px;
        }

    </style>

</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">

        SMART WPT DASHBOARD
    </h1>

    <div class="row">

        <div class="col-md-4">

            <div class="card p-4">

                <h4>Nilai LDR</h4>

                <h1>

                    {{ $latest->ldr ?? 0 }}

                </h1>

            </div>
        </div>

        <div class="col-md-4">

            <div class="card p-4">

                <h4>Status Lampu</h4>

                <h1>

                    {{ ($latest->lampu ?? 0) ? 'ON' : 'OFF' }}

                </h1>

            </div>
        </div>

        <div class="col-md-4">

            <div class="card p-4">

                <h4>Mode Sistem</h4>

                <h1>

                    {{ $latest->mode ?? 'AUTO' }}

                </h1>

            </div>
        </div>

    </div>

    <div class="card mt-4 p-4">

        <canvas id="chart"></canvas>

    </div>

</div>

<script>

const ctx = document.getElementById('chart');

new Chart(ctx, {

    type: 'line',

    data: {

        labels: [

            @foreach($chart as $item)

                "{{ $item->created_at->format('H:i:s') }}",

            @endforeach
        ],

        datasets: [{

            label: 'Nilai LDR',

            data: [

                @foreach($chart as $item)

                    {{ $item->ldr }},

                @endforeach
            ],

            borderWidth: 2
        }]
    }
});

</script>

</body>
</html>