<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php if ($title != "Tambah Kajian") : ?>
                <div class="col-md-<?php echo ($title == "Edit Kajian") ? '4' : '12'; ?>">
                    <div class="card card-profile">
                        <div class="card-body mt-2">
                            <h6 class="float-left text-gray">Hari <?php echo hari($kajian['tanggal']); ?></h6>
                            <h6 class="float-right text-gray">Pekan ke-<?php echo pekan($kajian['tanggal']); ?></h6>
                            <h4 class="card-title">Ustadz <?php echo $kajian['nama']; ?></h4>
                            <h2 class="card-title"><?php echo $kajian['judul']; ?></h2>
                            <h4 class="text-gray"><?php echo $kajian['waktu']; ?></h4>
                            <p class="card-description">
                                <?php echo $kajian['deskripsi']; ?>
                            </p>
                            <?php if ($title == "Lihat Kajian") : ?>
                                <a class="btn btn-round btn-sm float-right btn-primary" href="<?php echo base_url('kajian'); ?>">
                                    <i class="material-icons">arrow_back</i>
                                    &nbsp;Kembali
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($title != "Lihat Kajian") : ?>
                <div class="col-md-<?php echo ($title == "Tambah Kajian") ? '12' : '8'; ?>">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a class="btn btn-round btn-sm float-right btn-primary" href="<?php echo base_url('kajian'); ?>">
                                <i class="material-icons">arrow_back</i>
                                &nbsp;Kembali
                            </a>
                            <h3 class="card-title"><?php echo ($title == "Tambah Kajian") ? 'Kajian Baru' : 'Edit Kajian ' . $kajian['nama']; ?></h3>
                            <!-- <p class="card-category">Complete your profile</p> -->
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo ($title == "Tambah Kajian") ? base_url('kajian/add') : base_url('/kajian/edit/') . $kajian['id_kajian']; ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="tgl">Tanggal</label>
                                            <input id="tgl" type="date" class="form-control" name="tanggal" value="<?php echo ($title == 'Edit Kajian') ? date('Y-m-d', $kajian['tanggal']) . "\" readonly=\"readonly" : date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" data-style="btn btn-link" name="ustadz">
                                                <?php if ($title != 'Edit Kajian') : ?>
                                                    <option value="null" selected disabled>--Pilih Ustadz--</option>
                                                <?php endif; ?>
                                                <?php foreach ($ustadz as $ust) : ?>
                                                    <?php if ($title == 'Edit Kajian') : ?>
                                                        <?php if ($ust['id_ustadz'] == $kajian['id_ustadz']) : ?>
                                                            <option value="<?php echo $ust['id_ustadz']; ?>" selected><?php echo $ust['nama']; ?></option>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <option value="<?php echo $ust['id_ustadz']; ?>"><?php echo $ust['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" data-style="btn btn-link" name="waktu">
                                                <?php if ($title != 'Edit Kajian') : ?>
                                                    <option value="null" selected disabled>--Pilih Waktu--</option>
                                                <?php endif; ?>
                                                <?php foreach ($waktu as $wkt) : ?>
                                                    <?php if ($title == 'Edit Kajian') : ?>
                                                        <?php if ($wkt['id_waktu'] == $kajian['id_waktu']) : ?>
                                                            <option value="<?php echo $wkt['id_waktu']; ?>" selected><?php echo $wkt['waktu']; ?></option>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <option value="<?php echo $wkt['id_waktu']; ?>"><?php echo $wkt['waktu']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Judul</label>
                                            <input type="text" class="form-control" name="judul" <?php if ($title == 'Edit Kajian') echo 'value="' . $kajian['judul'] . '"'; ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Deskripsi</label>
                                                <textarea class="form-control" rows="6" name="deskripsi"> <?php if ($title == 'Edit Kajian') echo $kajian['deskripsi']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>