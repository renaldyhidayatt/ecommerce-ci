<div class="page-heading">
    <h3><?php echo $heading; ?></h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="icon dripicons dripicons-shopping-bag"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">
                                        Pendapatan
                                    </h6>
                                    <h6 class="font-extrabold mb-0"><?= $totalPendapatan; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">User</h6>
                                    <h6 class="font-extrabold mb-0"><?= $totalUser; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Product</h6>
                                    <h6 class="font-extrabold mb-0"><?= $totalProduct; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Order</h6>
                                    <h6 class="font-extrabold mb-0"><?= $totalOrders; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pendapataan perbulan</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="chartPendapatan" style="width: 50%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<script src="<?= base_url("assets/extensions/chart.js/chart.umd.js") ?>"></script>


<script>
    var chartColors = {
        red: "rgb(255, 99, 132)",
        orange: "rgb(255, 159, 64)",
        yellow: "rgb(255, 205, 86)",
        green: "rgb(75, 192, 192)",
        info: "#41B1F9",
        blue: "#3245D1",
        purple: "rgb(153, 102, 255)",
        grey: "#EBEFF6",
    };

    var dataBulan = <?php echo json_encode($data_bulan); ?>;

  

    var dataPendapatan = <?php echo json_encode($data_pendapatan); ?>;

    console.log(dataPendapatan)

    // Membuat chart menggunakan Chart.js
    var ctx = document.getElementById("chartPendapatan").getContext("2d");
    var chart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [dataBulan],
            datasets: [{
                label: "Pendapatan",
                data: [dataPendapatan],
                backgroundColor: chartColors.grey,
                borderColor: chartColors.info,
                borderWidth: 1,
            }, ],
        },
        options: {
            responsive: true,
            barRoundness: 1,
            title: {
                display: true,
                text: "Pendapatan per Bulan",
            },
            legend: {
                display: false,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        padding: 10,
                    },
                    gridLines: {
                        drawBorder: false,
                    },
                }, ],
                xAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                }, ],
            },
        },
    });
</script>