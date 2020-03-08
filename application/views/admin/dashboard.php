<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <p class="card-category float-right">
                            <?php echo hari(time()) . ', ' . date('d') . ' ' . bulan(time()) . ' ' . date('Y'); ?>
                        </p>
                        <h3 class="card-title">Resume Data</h3>
                        <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#reset">
                            <i class="fas fa-exclamation-triangle"></i>
                            &nbsp;Reset Data
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-user-alt"></i>
                        </div>
                        <p class="card-category">Ustadz</p>
                        <h3 class="card-title"><?php echo $count_ustadz; ?>
                            <!-- <small>orang</small> -->
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <!-- <i class="material-icons text-danger">warning</i> -->
                            <span>Jumlah Ustadz terdaftar</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($kajian_umum) : ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <!-- <i class="material-icons">store</i> -->
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <p class="card-category">Kajian Umum</p>
                            <h3 class="card-title"><?php echo $kajian_umum['nama']; ?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <span><?php echo timeAgo($kajian_umum['tanggal']) . ', ' . $kajian_umum['waktu']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($kajian_akhwat) : ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-calendar-alt"></i>
                                <!-- <i class="material-icons">store</i> -->
                            </div>
                            <p class="card-category">Kajian Akhwat</p>
                            <h3 class="card-title"><?php echo $kajian_akhwat['nama']; ?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <span><?php echo timeAgo($kajian_akhwat['tanggal']) . ', ' . $kajian_akhwat['waktu']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($khotib) : ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-calendar-day"></i>
                                <!-- <i class="material-icons">store</i> -->
                            </div>
                            <p class="card-category">Khotib</p>
                            <h3 class="card-title"><?php echo $khotib['nama']; ?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <span><?php echo timeAgo($khotib['tanggal']); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <a class="btn btn-round btn-sm float-right btn-primary" href="<?php echo base_url('kajian/addwaktu'); ?>">
                            <i class="far fa-clock"></i>
                            &nbsp;Tambah
                        </a>
                        <h4 class="card-title">Waktu Kajian</h4>
                        <p class="card-category">Keterangan waktu untuk Kajian. <br> Contoh: setelah Maghrib, setelah Shubuh.</p>
                    </div>
                    <div class="card-body">
                        <?php if ($waktu) : ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <th>#</th>
                                        <th>Waktu</th>
                                        <th>Kajian</th>
                                        <th>Keterangan</th>
                                        <th></th>
                                    </thead>
                                    <?php $no = 0; ?>
                                    <tbody>
                                        <?php foreach ($waktu as $wkt) : ?>
                                            <tr>
                                                <td><?php echo ++$no; ?></td>
                                                <td><?php echo $wkt['waktu']; ?></td>
                                                <td><?php echo ($this->db->query('SELECT COUNT(id_kajian) AS jml FROM tb_kajian WHERE id_waktu = ' . $wkt['id_waktu'])->row_array()['jml']); ?></td>
                                                <td><?php echo $wkt['keterangan']; ?></td>
                                                <td class="td-actions text-right">
                                                    <a href="<?php echo base_url('kajian/editwaktu/') . $wkt['id_waktu']; ?>" rel="tooltip" class="btn btn-success">
                                                        <i class="fas fa-pen"></i>
                                                        <!-- <i class="fa fa-user-edit"></i> -->
                                                        <br><small>Edit</small>
                                                    </a>
                                                    <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo 'hapus' . $wkt['id_waktu']; ?>">
                                                        <i class="fas fa-times"></i>
                                                        <!-- <i class="fa fa-user-slash"></i> -->
                                                        <br><small>Hapus</small>
                                                    </button>
                                                </td>
                                                <!-- Hapus Modal -->
                                                <div class="modal fade" id="<?php echo 'hapus' . $wkt['id_waktu']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="hapusLabel">Peringatan!</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Anda yakin ingin menghapus data ini? Semua Kajian yang ada di waktu ini akan ikut terhapus!
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <a href="<?php echo base_url('kajian/deletewaktu/') . $wkt['id_waktu']; ?>" class="btn btn-primary">Iya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else : ?>
                            Data Kosong
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <a class="btn btn-round btn-sm float-right btn-primary" href="<?php echo base_url('khotib/addmuadzin'); ?>">
                            <i class="fas fa-podcast"></i>
                            &nbsp;Tambah
                        </a>
                        <h4 class="card-title">Muadzin</h4>
                        <p class="card-category">Muadzin harian</p>
                    </div>
                    <div class="card-body">
                        <?php if ($muadzin) : ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <th>#</th>
                                        <th>Muadzin</th>
                                        <th>Alamat</th>
                                        <th></th>
                                    </thead>
                                    <?php $no = 0; ?>
                                    <tbody>
                                        <?php foreach ($muadzin as $mdz) : ?>
                                            <tr>
                                                <td><?php echo ++$no; ?></td>
                                                <td><?php echo $mdz['muadzin']; ?></td>
                                                <td><?php echo $mdz['alamat']; ?></td>
                                                <td class="td-actions text-right">
                                                    <a href="<?php echo base_url('khotib/editmuadzin/') . $mdz['id_muadzin']; ?>" rel="tooltip" class="btn btn-success">
                                                        <!-- <i class="fas fa-pen"></i> -->
                                                        <i class="fa fa-user-edit"></i>
                                                        <br><small>Edit</small>
                                                    </a>
                                                    <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo 'hapusMdz' . $mdz['id_muadzin']; ?>">
                                                        <!-- <i class="fas fa-times"></i> -->
                                                        <i class="fa fa-user-slash"></i>
                                                        <br><small>Hapus</small>
                                                    </button>
                                                </td>
                                                <!-- Hapus Modal -->
                                                <div class="modal fade" id="<?php echo 'hapusMdz' . $mdz['id_muadzin']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="hapusLabel">Peringatan!</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Anda yakin ingin menghapus data ini? Semua Khutbah yang terdapat Muadzin ini akan ikut terhapus!
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <a href="<?php echo base_url('khotib/deletemuadzin/') . $mdz['id_muadzin']; ?>" class="btn btn-primary">Iya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else : ?>
                            Data Kosong
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hapus Modal -->
<div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="hapusLabel">Peringatan!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin ingin menghapus semua data yang ada? <br>
                Data yang telah dihapus tidak dapat dikembalikan!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                <a href="<?php echo base_url('dashboard/reset') ?>" class="btn btn-secondary">Iya</a>
            </div>
        </div>
    </div>
</div>