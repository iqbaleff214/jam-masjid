<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php if ($title != "Tambah Kajian") : ?>
                <div class="col-md-<?php echo ($title == "Edit Kajian") ? '4' : '12'; ?>">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="javascript:;">
                                <img class="img" src="<?php echo base_url('assets/img/ustadz/') . $ustadz['foto']; ?>" />
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $ustadz['nama']; ?></h4>
                            <h6 class="card-category text-gray"><?php echo $ustadz['no_telp']; ?></h6>
                            <p class="card-description">
                                <?php echo $ustadz['bio']; ?>
                            </p>
                            <?php if ($title == "Lihat Kajian") : ?>
                                <a class="btn btn-round btn-sm float-right btn-primary" href="<?php echo base_url('ustadz'); ?>">
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
                                            <input id="tgl" type="date" class="form-control" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" data-style="btn btn-link" name="ustadz">
                                                <option value="null" selected disabled>--Pilih Ustadz--</option>
                                                <?php foreach ($ustadz as $ust) : ?>
                                                    <option value="<?php echo $ust['id_ustadz']; ?>"><?php echo $ust['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" data-style="btn btn-link" name="waktu">
                                                <option value="null" selected disabled>--Pilih Waktu--</option>
                                                <?php foreach ($waktu as $wkt) : ?>
                                                    <option value="<?php echo $wkt['id_waktu']; ?>"><?php echo $wkt['waktu']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
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