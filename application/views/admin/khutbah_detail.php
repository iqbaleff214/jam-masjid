<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php if ($title != "Tambah Khotib") : ?>
                <div class="col-md-<?php echo ($title == "Edit Khotib") ? '4' : '12'; ?>">
                    <div class="card card-profile">
                        <div class="card-body mt-2">
                            <h6 class="float-left text-gray">Bulan <?php echo bulan($khotib['tanggal']); ?></h6>
                            <h6 class="float-right text-gray">Jumat ke-<?php echo pekan($khotib['tanggal']); ?></h6>
                            <div class="row mt-4">
                                <div class="col-md-12 col-sm-12">
                                    <h3 class="card-title"><?php echo $khotib['nama']; ?></h3>
                                    <h4 class="card-title text-gray">Khotib</h4>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <h3 class="card-title"><?php echo $khotib['muadzin']; ?></h3>
                                    <h4 class="card-title text-gray">Muadzin</h4>
                                </div>
                            </div>
                            <?php if ($title == "Lihat Khotib") : ?>
                                <a class="btn btn-round btn-sm float-right btn-primary" href="<?php echo base_url('khotib'); ?>">
                                    <!-- <i class="material-icons">arrow_back</i> -->
                                    <i class="fa fa-arrow-left"></i>
                                    &nbsp;Kembali
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($title != "Lihat Khotib") : ?>
                <div class="col-md-<?php echo ($title == "Tambah Khotib") ? '12' : '8'; ?>">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a class="btn btn-round btn-sm float-right btn-primary" href="<?php echo base_url('khotib'); ?>">
                                <!-- <i class="material-icons">arrow_back</i> -->
                                <i class="fa fa-arrow-left"></i>
                                &nbsp;Kembali
                            </a>
                            <h3 class="card-title"><?php echo ($title == "Tambah Khotib") ? 'Khotib Baru' : 'Edit Khotib '; ?></h3>
                            <!-- <p class="card-category">Complete your profile</p> -->
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo ($title == "Tambah Khotib") ? base_url('khotib/add') : base_url('khotib/edit/') . $khotib['id_khutbah']; ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="tgl">Tanggal</label>
                                            <input id="tgl" type="date" class="form-control" name="tanggal" value="<?php echo ($title == 'Edit Khotib') ? date('Y-m-d', $khotib['tanggal']) . "\" readonly=\"readonly" : date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" data-style="btn btn-link" name="ustadz">
                                                <?php if ($title != 'Edit Khotib') : ?>
                                                    <option value="null" selected disabled>--Pilih Khotib--</option>
                                                <?php endif; ?>
                                                <?php foreach ($ustadz as $ust) : ?>
                                                    <option value="<?php echo $ust['id_ustadz']; ?>" <?php if ($title == 'Edit Khotib' && $ust['id_ustadz'] == $khotib['id_ustadz']) echo 'selected'; ?>><?php echo $ust['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" data-style="btn btn-link" name="muadzin">
                                                <?php if ($title != 'Edit Khotib') : ?>
                                                    <option value="null" selected disabled>--Pilih Muadzin--</option>
                                                <?php endif; ?>
                                                <?php foreach ($muadzin as $mzn) : ?>
                                                    <option value="<?php echo $mzn['id_muadzin']; ?>"<?php if ($title == 'Edit Khotib' && $mzn['id_muadzin'] == $khotib['id_muadzin']) echo 'selected'; ?>><?php echo $mzn['muadzin']; ?></option>
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