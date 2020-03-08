<div id="slideUtama" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <!-- item-1 -->
        <div class="carousel-item active utama" data-interval="<?php echo $interval; ?>">
            <div class="container pt-5 mt-5">
                <div class="card mb-3 border-primary">
                    <div class="card-header h1 bg-primary text-white">
                        Kajian Umum
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Ustadz</th>
                                    <th scope="col">Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kajian as $um) : ?>
                                    <tr>
                                        <td><?php echo date('d', $um['tanggal']) . ' ' . bulan($um['tanggal']); ?></td>
                                        <td><?php echo hari($um['tanggal']); ?></td>
                                        <td><?php echo $um['nama']; ?></td>
                                        <td><?php echo $um['waktu']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- item-2 -->
        <div class="carousel-item utama" data-interval="<?php echo $interval; ?>">
            <div class="container pt-5 mt-5">
                <div class="card mb-3 border-danger" style="min-width: 100%; width: 100%">
                    <div class="card-header h1 bg-danger text-white">
                        Kajian Akhwat
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Ustadz</th>
                                    <th scope="col">Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($akhwat as $akh) : ?>
                                    <tr>
                                        <td><?php echo date('d', $akh['tanggal']) . ' ' . bulan($akh['tanggal']); ?></td>
                                        <td><?php echo hari($akh['tanggal']); ?></td>
                                        <td><?php echo $akh['nama']; ?></td>
                                        <td><?php echo $akh['waktu']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- item-3 -->
        <div class="carousel-item utama" data-interval="<?php echo $interval; ?>">
            <div class="container pt-5 mt-5">
                <div class="card mb-3 border-success" style="min-width: 100%; width: 100%">
                    <div class="card-header h1 bg-success text-white">
                        Khotib Jumat
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jumat ke</th>
                                    <th scope="col">Khotib</th>
                                    <th scope="col">Muadzin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($khutbah as $jmt) : ?>
                                    <tr>
                                        <td><?php echo date('d', $jmt['tanggal']) . ' ' . bulan($jmt['tanggal']); ?></td>
                                        <td><?php echo pekan($jmt['tanggal']); ?></td>
                                        <td><?php echo $jmt['nama']; ?></td>
                                        <td><?php echo $jmt['muadzin']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#slideUtama" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#slideUtama" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="row fixed-bottom">
    <div class="col-2 bg-primary text-light">
        <div class="m-2 center">
            <h1>Shubuh</h1>
        </div>
    </div>
    <div class="col-2 bg-info text-light">
        <div class="m-2 center">
            <h1>Syuruq</h1>
        </div>
    </div>
    <div class="col-2 bg-warning">
        <div class="m-2 center">
            <h1>Zhuhur</h1>
        </div>
    </div>
    <div class="col-2 bg-success text-light">
        <div class="m-2 center">
            <h1>Ashar</h1>
        </div>
    </div>
    <div class="col-2 bg-danger text-light">
        <div class="m-2 center">
            <h1>Maghrib</h1>
        </div>
    </div>
    <div class="col-2 bg-dark text-light">
        <div class="m-2 center">
            <h1>Isya</h1>
        </div>
    </div>
</div>