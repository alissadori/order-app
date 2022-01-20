<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3><?= $title; ?></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h5>Penjualan Hari Ini</h5>
                                <h3><?= rupiah($total_hariini); ?></h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                            <!--<a href="/report" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>-->
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h5>Penjualan Minggu Ini</h5>
                                <h3><?= rupiah($total_mingguini); ?></h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-calendar-week"></i>
                            </div>
                            <!--<a href="/report" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>-->
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h5>Penjualan Bulan Ini</h5>
                                <h3><?= rupiah($total_bulanini); ?></h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <!--<a href="/report" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>-->
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h5>Total Penjualan</h5>
                                <h3><?= rupiah($total); ?></h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <!--<a href="/report" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>-->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <i class="fas fa-chart-line"></i> Laporan Grafik Penjualan
                            </div>
                            </br>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>&nbsp;Pilih Bulan </label>
                                    <input type="month" class="form-control" id="" value="<?= date('Y-m') ?>" />
                                </div>
                            </div>
                            <div class="card-body bg-white">
                                <canvas id="grafikPenjualan"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>

<?= $this->section('scripts'); ?>
<script src="<?= base_url('assets/chart/Chart.min.js'); ?>"></script>
<script src="<?= base_url('assets/chart/utils.js'); ?>"></script>

<script>
    var ctx = document.getElementById("grafikPenjualan").getContext('2d');
    ctx.height = 500;
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($grafik['namaProduk']); ?>,
            datasets: [{
                label: 'Grafik Penjualan',
                data: <?= json_encode($grafik['jumlahPenjualan']); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<?= $this->endSection('scripts'); ?>