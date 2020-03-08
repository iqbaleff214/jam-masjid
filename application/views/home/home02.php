<div id="slideUtama" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <!-- item-1 -->
        <div class="carousel-item active utama" data-interval="<?php echo $interval; ?>">
            <div class="container pt-5 mt-5">
                <?php if ($kajian) : ?>
                    <div class="card text-white bg-primary mb-2">
                        <div class="card-header h2 py-3">Kajian Umum</div>
                    </div>
                    <!-- Isi -->
                    <div class="row">
                        <?php foreach ($kajian as $kjn) : ?>
                            <div class="col-3">
                                <div class="card border-primary">
                                    <div class="card-header bg-primary text-white h5"><?php echo hari($kjn['tanggal']) . ', ' . date('d', $kjn['tanggal']) . ' ' . bulan($kjn['tanggal']); ?></div>
                                    <img src="<?php echo base_url('assets/img/ustadz/') . $kjn['foto']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $kjn['nama']; ?></h5>
                                        <span class="card-text"><?php echo $kjn['waktu']; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- item-2 -->
        <?php if ($akhwat) : ?>
            <div class="carousel-item utama" data-interval="<?php echo $interval; ?>">
                <div class="container pt-3 mt-5">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header h2 py-3">Kajian Akhwat</div>
                    </div>
                    <!-- Isi -->
                    <div class="row">
                        <?php foreach ($akhwat as $akh) : ?>
                            <div class="col-3">
                                <div class="card border-danger">
                                    <div class="card-header bg-danger text-white h5"><?php echo hari($akh['tanggal']) . ', ' . date('d', $akh['tanggal']) . ' ' . bulan($akh['tanggal']); ?></div>
                                    <img src="<?php echo base_url('assets/img/ustadz/') . $akh['foto']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $akh['nama']; ?></h5>
                                        <span class="card-text"><?php echo $akh['waktu']; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- item-3 -->
        <?php if ($khutbah) : ?>
            <div class="carousel-item utama" data-interval="<?php echo $interval; ?>">
                <div class="container pt-5 mt-5">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header h2 py-3">Khotib Jumat</div>
                    </div>
                    <!-- Isi -->
                    <div class="row">
                        <?php foreach ($khutbah as $ktb) : ?>
                            <div class="col-3">
                                <div class="card border-success">
                                    <div class="card-header bg-success text-white h5"><?php echo hari($ktb['tanggal']) . ', ' . date('d', $ktb['tanggal']) . ' ' . bulan($ktb['tanggal']); ?></div>
                                    <img src="<?php echo base_url('assets/img/ustadz/') . $ktb['foto']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <!-- <h5 class="card-title"></h5>
                                            <span class="card-text"></span> -->
                                        <table class="">
                                            <tr>
                                                <th>Khotib</th>
                                                <td>&nbsp;</td>
                                                <td class="card-text"><?php echo $ktb['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Muadzin</th>
                                                <td>&nbsp;</td>
                                                <td class="card-text"><?php echo $ktb['muadzin']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
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