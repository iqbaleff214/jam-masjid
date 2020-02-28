<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php if ($title != "Tambah Ustadz") : ?>
                <div class="col-md-<?php echo ($title == "Edit Ustadz") ? '4' : '12'; ?>">
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
                            <?php if ($title == "Lihat Ustadz") : ?>
                                <a class="btn btn-round btn-sm float-right btn-primary" href="<?php echo base_url('ustadz'); ?>">
                                    <i class="material-icons">arrow_back</i>
                                    &nbsp;Kembali
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($title != "Lihat Ustadz") : ?>
                <div class="col-md-<?php echo ($title == "Tambah Ustadz") ? '12' : '8'; ?>">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a class="btn btn-round btn-sm float-right btn-primary" href="<?php echo base_url('ustadz'); ?>">
                                <i class="material-icons">arrow_back</i>
                                &nbsp;Kembali
                            </a>
                            <h3 class="card-title"><?php echo ($title == "Tambah Ustadz") ? 'Ustadz Baru' : 'Edit Ustadz ' . $ustadz['nama']; ?></h3>
                            <!-- <p class="card-category">Complete your profile</p> -->
                        </div>
                        <div class="card-body">
                            <?php echo form_open_multipart(($title == "Tambah Ustadz") ? 'ustadz/add' : 'ustadz/edit/' . $ustadz['id_ustadz']); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nama</label>
                                        <input type="text" class="form-control" name="nama" <?php if ($title == "Edit Ustadz") echo "value=\"" . $ustadz['nama'] . "\""; ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">No. Telp</label>
                                        <input type="text" class="form-control" name="no_telp" <?php if ($title == "Edit Ustadz") echo "value='" . $ustadz['no_telp'] . "'"; ?>>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Facebook</label>
                                        <input type="text" class="form-control" name="facebook" <?php if ($title == "Edit Ustadz") echo "value='" . $ustadz['facebook'] . "'"; ?>>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Instagram</label>
                                        <input type="text" class="form-control" name="instagram" <?php if ($title == "Edit Ustadz") echo "value='" . $ustadz['instagram'] . "'"; ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Alamat</label>
                                            <textarea class="form-control" rows="2" name="alamat"> <?php if ($title == "Edit Ustadz") echo  $ustadz['alamat']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Biodata</label>
                                            <textarea class="form-control" rows="6" name="bio"> <?php if ($title == "Edit Ustadz") echo $ustadz['bio']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fileinput fileinput-new pt-2" data-provides="fileinput">
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 100%; height: 150px">
                                            <?php if ($title == "Edit Ustadz") : ?>
                                                <img src="<?php echo base_url('assets/img/ustadz/') . $ustadz['foto']; ?>" alt="">
                                            <?php else : ?>
                                                <img src="<?php echo base_url('assets/img/ustadz/') . 'default.png'; ?>" alt="">
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <span class="btn btn-primary btn-file">
                                                <span class="fileinput-new">Pilih Foto</span>
                                                <span class="fileinput-exists">Ganti</span>
                                                <input type="file" name="foto">
                                            </span>
                                            <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Hapus</a>
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