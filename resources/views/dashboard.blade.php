<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMART WPT DASHBOARD</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        html{

            scroll-behavior:smooth;
        }

        *{

            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            background:#050816;
            color:white;
            font-family:'Segoe UI', sans-serif;
            overflow-x:hidden;
        }

        /* =======================
           SIDEBAR
        ======================= */

        .sidebar{

            width:250px;
            height:100vh;

            position:fixed;

            left:0;
            top:0;

            background:#071122;

            border-right:1px solid rgba(255,255,255,0.1);

            padding:20px;
        }

        .logo{

            font-size:30px;

            font-weight:bold;

            color:#27d8ff;

            margin-bottom:40px;
        }

        .logo span{

            color:white;
        }

        .menu a{

            display:block;

            color:white;

            text-decoration:none;

            padding:15px;

            margin-bottom:10px;

            border-radius:12px;

            transition:0.3s;
        }

        .menu a:hover{

            background:#0d6efd;
        }

        .menu i{

            margin-right:10px;
        }

        /* =======================
           MAIN
        ======================= */

        .main{

            margin-left:250px;

            padding:30px;
        }

        .top-title{

            display:flex;

            justify-content:space-between;

            align-items:center;

            margin-bottom:30px;
        }

        .title h1{

            font-size:40px;

            font-weight:bold;
        }

        .title span{

            color:#3b82f6;
        }

        .status-online{

            background:#081423;

            padding:20px;

            border-radius:20px;

            border:1px solid rgba(255,255,255,0.1);
        }

        .status-online h3{

            color:#00ff7f;
        }

        .status-online.offline h3{

            color:#ff4d4f;
        }

        /* =======================
           CARD
        ======================= */

        .dashboard-card{

            background:#081423;

            border-radius:20px;

            padding:25px;

            border:1px solid rgba(255,255,255,0.1);

            transition:0.3s;

            height:100%;
        }

        .dashboard-card:hover{

            transform:translateY(-5px);

            box-shadow:0 0 20px rgba(0,255,255,0.2);
        }

        .dashboard-card h5{

            color:#b6b6b6;
        }

        .dashboard-card h1{

            margin-top:15px;

            font-size:40px;

            font-weight:bold;
        }

        .text-blue{

            color:#3b82f6;
        }

        .text-green{

            color:#00ff7f;
        }

        .text-yellow{

            color:#ffcc00;
        }

        .text-purple{

            color:#c084fc;
        }

        .text-cyan{

            color:#22d3ee;
        }

        /* =======================
           CHART
        ======================= */

        .chart-box{

            background:#081423;

            border-radius:20px;

            padding:30px;

            margin-top:30px;

            border:1px solid rgba(255,255,255,0.1);
        }

        /* =======================
           TABLE
        ======================= */

        .table-box{

            background:#081423;

            border-radius:20px;

            padding:30px;

            margin-top:30px;

            border:1px solid rgba(255,255,255,0.1);
        }

/* =======================
   MODERN TABLE
======================= */

.modern-table{

    width:100%;

    border-collapse:collapse;

    overflow:hidden;

    border-radius:20px;
}

.modern-table thead{

    background:#0d1b2a;
}

.modern-table thead th{

    padding:18px;

    color:#3b82f6;

    font-size:18px;

    font-weight:600;

    border-bottom:1px solid rgba(255,255,255,0.1);
}

.modern-table tbody tr{

    background:#081423;

    transition:0.3s;
}

.modern-table tbody tr:hover{

    background:#0f1d33;

    transform:scale(1.01);
}

.modern-table tbody td{

    padding:18px;

    border-bottom:1px solid rgba(255,255,255,0.05);

    color:#ffffff;
}

/* STATUS ON */

.status-on{

    color:#00ff7f;

    font-weight:bold;
}

/* AUTO */

.mode-auto{

    color:#3b82f6;

    font-weight:bold;
}

        thead{

            color:#3b82f6;
        }

        /* =======================
           SYSTEM INFO
        ======================= */

        .system-info{

            background:#081423;

            border-radius:20px;

            padding:30px;

            margin-top:30px;

            border:1px solid rgba(255,255,255,0.1);
        }

    </style>

</head>

<body>

<!-- =======================
     SIDEBAR
======================= -->

<div class="sidebar">

    <div class="logo">

        ⚡ SMART <span>WPT</span>

    </div>

    <div class="menu">

        <a href="#dashboard">

            <i class="fa-solid fa-house"></i>

            Dashboard
        </a>

        <a href="#monitoring">

            <i class="fa-solid fa-chart-line"></i>

            Monitoring
        </a>

        <a href="#riwayat">

            <i class="fa-solid fa-clock-rotate-left"></i>

            Riwayat Data
        </a>

        <a href="#tentang">

            <i class="fa-solid fa-circle-info"></i>

            Tentang Sistem
        </a>

    </div>

</div>

<!-- =======================
     MAIN CONTENT
======================= -->

<div class="main">

    <!-- HEADER -->

    <div class="top-title" id="dashboard">

        <div class="title">

            <h1>

                SMART WPT <span>DASHBOARD</span>

            </h1>

            <p>

                Monitoring Sistem Wireless Power Transfer IoT
            </p>

        </div>

        <div class="status-online" id="connectionStatusBox">

            <small>Status Koneksi</small>

            <h3 id="connectionStatusText">

                ESP32 ONLINE
            </h3>

            <small id="updateTime">

                Update realtime
            </small>

        </div>

    </div>

    <!-- =======================
         CARD MONITORING
    ======================= -->

    <div class="row g-4">

        <!-- LDR -->

        <div class="col-lg-2 col-md-4 col-sm-6">

            <div class="dashboard-card">

                <h5>NILAI LDR</h5>

                <h1 class="text-yellow" id="ldrValue">

                    0
                </h1>

                <p>Intensitas Cahaya</p>

            </div>

        </div>

        <!-- STATUS LAMPU -->

        <div class="col-lg-2 col-md-4 col-sm-6">

            <div class="dashboard-card">

                <h5>STATUS LAMPU</h5>

                <h1 class="text-green" id="lampStatus">

                    OFF
                </h1>

                <p>Status Lampu IoT</p>

            </div>

        </div>

        <!-- MODE -->

        <div class="col-lg-2 col-md-4 col-sm-6">

            <div class="dashboard-card">

                <h5>MODE SISTEM</h5>

                <h1 class="text-blue" id="modeSystem">

                    AUTO
                </h1>

                <p>Mode Monitoring</p>

            </div>

        </div>

        <!-- TEGANGAN -->

        <div class="col-lg-2 col-md-4 col-sm-6">

            <div class="dashboard-card">

                <h5>TEGANGAN</h5>

                <h1 class="text-purple" id="teganganValue">

                    0 V
                </h1>

                <p>Volt (V)</p>

            </div>

        </div>

        <!-- ARUS -->

        <div class="col-lg-2 col-md-4 col-sm-6">

            <div class="dashboard-card">

                <h5>ARUS</h5>

                <h1 class="text-cyan" id="arusValue">

                    0 A
                </h1>

                <p>Ampere (A)</p>

            </div>

        </div>

        <!-- DAYA -->

        <div class="col-lg-2 col-md-4 col-sm-6">

            <div class="dashboard-card">

                <h5>DAYA</h5>

                <h1 class="text-yellow" id="dayaValue">

                    0 W
                </h1>

                <p>Watt (W)</p>

            </div>

        </div>

    </div>

    <!-- =======================
         GRAFIK LDR
    ======================= -->

    <div class="chart-box" id="monitoring">

        <h4 class="mb-4">

            Grafik Nilai LDR Realtime
        </h4>

        <canvas id="myChart"></canvas>

    </div>

    <!-- =======================
         GRAFIK POWER
    ======================= -->

    <div class="chart-box mt-4">

        <h4 class="mb-4">

            Grafik Monitoring Tegangan, Arus dan Daya
        </h4>

        <canvas id="powerChart"></canvas>

    </div>

    <!-- =======================
     TABLE MODERN
======================= -->

<div class="table-box" id="riwayat">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4>

            Riwayat Data Monitoring
        </h4>

        <span class="badge bg-primary p-2">

            Realtime Data
        </span>

    </div>

    <div class="table-responsive">

        <table class="modern-table">

            <thead>

                <tr>

                    <th>Waktu</th>

                    <th>LDR</th>

                    <th>Lampu</th>

                    <th>Mode</th>

                    <th>Tegangan</th>

                    <th>Arus</th>

                    <th>Daya</th>

                </tr>

            </thead>

            <tbody id="tableData">

            </tbody>

        </table>

    </div>

</div>

    <!-- =======================
         SYSTEM INFO
    ======================= -->

    <div class="system-info" id="tentang">

        <h4 class="mb-4">

            Informasi Sistem
        </h4>

        <p>

            Perangkat : ESP32
        </p>

        <p>

            Sistem : Smart Wireless Power Transfer IoT
        </p>

        <p>

            Dashboard : Laravel Monitoring Realtime
        </p>

    </div>

</div>

<!-- =======================
     SCRIPT
======================= -->

<script>

    // =======================
    // CHART LDR
    // =======================

    const ctx = document.getElementById('myChart');

    const myChart = new Chart(ctx, {

        type: 'line',

        data: {

            labels: [],

            datasets: [{

                label: 'Nilai LDR',

                data: [],

                borderColor: '#3b82f6',

                backgroundColor: 'rgba(59,130,246,0.2)',

                tension: 0.4,

                fill:true
            }]
        }
    });

    // =======================
    // POWER CHART
    // =======================

    const powerCtx =
    document.getElementById('powerChart');

    const powerChart =
    new Chart(powerCtx, {

        type:'line',

        data:{

            labels:[],

            datasets:[

                {

                    label:'Tegangan (V)',

                    data:[],

                    borderColor:'#c084fc',

                    tension:0.4
                },

                {

                    label:'Arus (A)',

                    data:[],

                    borderColor:'#22d3ee',

                    tension:0.4
                },

                {

                    label:'Daya (W)',

                    data:[],

                    borderColor:'#ffcc00',

                    tension:0.4
                }
            ]
        }
    });

    // =======================
    // FETCH DATA
    // =======================

    const statusBox =
        document.getElementById('connectionStatusBox');

    const statusText =
        document.getElementById('connectionStatusText');

    function updateConnectionStatus(isOnline) {

        statusText.innerHTML =
            isOnline ? 'ESP32 ONLINE' : 'ESP32 OFFLINE';

        statusBox.classList.toggle('offline', ! isOnline);
    }

    async function fetchData() {

        try {
            const response = await fetch('/api/latest');

            if (! response.ok) {
                throw new Error('Gagal mengambil data monitoring');
            }

            const data = await response.json();

        updateConnectionStatus(data.is_online);

        // =======================
        // UPDATE CARD
        // =======================

        document.getElementById('ldrValue').innerHTML =
            data.ldr;

        document.getElementById('lampStatus').innerHTML =
            data.is_online ? (data.lampu ? 'ON' : 'OFF') : 'OFFLINE';

        document.getElementById('modeSystem').innerHTML =
            data.mode;

        document.getElementById('teganganValue').innerHTML =
            data.tegangan + " V";

        document.getElementById('arusValue').innerHTML =
            data.arus + " A";

        document.getElementById('dayaValue').innerHTML =
            data.daya + " W";

        // =======================
        // UPDATE TIME
        // =======================

        const currentTime = new Date().toLocaleTimeString();

        document.getElementById('updateTime').innerHTML =
            data.created_at
                ? "Terakhir Data Masuk : " + new Date(data.created_at).toLocaleTimeString()
                : "Belum ada data masuk";

        // =======================
        // UPDATE CHART LDR
        // =======================

        myChart.data.labels.push(currentTime);

        myChart.data.datasets[0].data.push(data.ldr);

        if(myChart.data.labels.length > 10){

            myChart.data.labels.shift();

            myChart.data.datasets[0].data.shift();
        }

        myChart.update();

        // =======================
        // UPDATE POWER CHART
        // =======================

        powerChart.data.labels.push(currentTime);

        // tegangan
        powerChart.data.datasets[0].data.push(
            data.tegangan
        );

        // arus
        powerChart.data.datasets[1].data.push(
            data.arus
        );

        // daya
        powerChart.data.datasets[2].data.push(
            data.daya
        );

        // max data
        if(powerChart.data.labels.length > 10){

            powerChart.data.labels.shift();

            powerChart.data.datasets[0].data.shift();

            powerChart.data.datasets[1].data.shift();

            powerChart.data.datasets[2].data.shift();
        }

        powerChart.update();

        // =======================
        // UPDATE TABLE
        // =======================

let row = `

<tr>

    <td>${currentTime}</td>

    <td>${data.ldr}</td>

    <td class="status-on">

        ${data.lampu ? 'ON' : 'OFF'}

    </td>

    <td class="mode-auto">

        ${data.mode}

    </td>

    <td>${data.tegangan} V</td>

    <td>${data.arus} A</td>

    <td>${data.daya} W</td>

</tr>
`;
        document.getElementById('tableData').innerHTML =
            row + document.getElementById('tableData').innerHTML;

        const tableBody = document.getElementById('tableData');

        while (tableBody.children.length > 10) {
            tableBody.removeChild(tableBody.lastElementChild);
        }
        } catch (error) {
            updateConnectionStatus(false);

            document.getElementById('updateTime').innerHTML =
                "Koneksi data bermasalah";
        }
    }

    // =======================
    // AUTO REFRESH
    // =======================

    fetchData();

    setInterval(fetchData, 3000);

</script>

</body>
</html>
