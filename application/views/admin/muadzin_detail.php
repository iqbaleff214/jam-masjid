<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <a class="btn btn-round btn-sm float-right btn-primary" href="<?php echo base_url('dashboard'); ?>">
                            <!-- <i class="material-icons">arrow_back</i> -->
                            <i class="fa fa-arrow-left"></i>
                            &nbsp;Kembali
                        </a>
                        <h3 class="card-title"><?php echo ($title == "Tambah Muadzin") ? 'Tambah Muadzin' : 'Edit Muadzin '; ?></h3>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>
                    <div class="card-body">
                        <form action="<?php echo ($title == "Tambah Muadzin") ? base_url('khotib/addmuadzin') : base_url('khotib/editmuadzin/') . $muadzin['id_muadzin']; ?>" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Muadzin</label>
                                        <input type="text" class="form-control" name="muadzin" <?php if ($title == "Edit Muadzin") echo "value=\"" . $muadzin['muadzin'] . "\""; ?>>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" <?php if ($title == "Edit Muadzin") echo "value=\"" . $muadzin['alamat'] . "\""; ?>>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>