<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain pb-4">
                    <div class="card-header card-header-primary">
                        <a class="btn btn-round btn-sm float-right btn-primary" href="<?php echo base_url('kajian/add'); ?>">
                            <!-- <i class="material-icons">add_circle</i> -->
                            <i class="fa fa-user-plus"></i>
                            &nbsp;Tambah
                        </a>
                        <h3 class="card-title">Daftar Kajian</h3>
                        <p class="card-category">
                            <a href="#umum">Kajian Umum</a> dan <a href="#akhwat">Kajian Akhwat</a>
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title" id="umum">Kajian Umum</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($umum) : ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class=" text-primary">
                                        <th class="text-center">#</th>
                                        <th>Tanggal</th>
                                        <th>Ustadz</th>
                                        <th>Waktu</th>
                                        <th>Hari</th>
                                        <th>Pekan</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        <?php foreach ($umum as $kjn) : ?>
                                            <tr>
                                                <td class="text-center"><?php echo ++$no; ?></td>
                                                <td><?php echo date('d/M/Y', $kjn['tanggal']); ?></td>
                                                <td><?php echo $kjn['nama']; ?></td>
                                                <td><?php echo $kjn['waktu']; ?></td>
                                                <td><?php echo hari($kjn['tanggal']); ?></td>
                                                <td><?php echo pekan($kjn['tanggal']); ?></td>
                                                <td class="td-actions text-right">
                                                    <a href="<?php echo base_url('kajian/show/') . $kjn['id_kajian']; ?>" rel="tooltip" class="btn btn-info">
                                                        <!-- <i class="material-icons">person</i> -->
                                                        <i class="fa fa-user"></i>
                                                        <br><small>Lihat</small>
                                                    </a>
                                                    <a href="<?php echo base_url('kajian/edit/') . $kjn['id_kajian']; ?>" rel="tooltip" class="btn btn-success">
                                                        <!-- <i class="material-icons">edit</i> -->
                                                        <i class="fa fa-user-edit"></i>
                                                        <br><small>Edit</small>
                                                    </a>
                                                    <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo 'hapus' . $kjn['id_kajian']; ?>">
                                                        <!-- <i class="material-icons">close</i> -->
                                                        <i class="fa fa-user-slash"></i>
                                                        <br><small>Hapus</small>
                                                    </button>
                                                </td>
                                                <!-- Hapus Modal -->
                                                <div class="modal fade" id="<?php echo 'hapus' . $kjn['id_kajian']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusLabel">Hapus</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Anda yakin ingin menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <a href="<?php echo base_url('kajian/delete/') . $kjn['id_kajian']; ?>" class="btn btn-primary">Iya</a>
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
                            <p>Data Kosong</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title" id="akhwat">Kajian Akhwat</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($akhwat) : ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class=" text-primary">
                                        <th class="text-center">#</th>
                                        <th>Tanggal</th>
                                        <th>Ustadz</th>
                                        <th>Waktu</th>
                                        <th>Hari</th>
                                        <th>Pekan</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        <?php foreach ($akhwat as $akw) : ?>
                                            <tr>
                                                <td class="text-center"><?php echo ++$no; ?></td>
                                                <td><?php echo date('d/M/Y', $akw['tanggal']); ?></td>
                                                <td><?php echo $akw['nama']; ?></td>
                                                <td><?php echo $akw['waktu']; ?></td>
                                                <td><?php echo hari($akw['tanggal']); ?></td>
                                                <td><?php echo pekan($akw['tanggal']); ?></td>
                                                <td class="td-actions text-right">
                                                    <a href="<?php echo base_url('kajian/show/') . $akw['id_kajian']; ?>" rel="tooltip" class="btn btn-info">
                                                        <!-- <i class="material-icons">person</i> -->
                                                        <i class="fa fa-user"></i>
                                                        <br><small>Lihat</small>
                                                    </a>
                                                    <a href="<?php echo base_url('kajian/edit/') . $akw['id_kajian']; ?>" rel="tooltip" class="btn btn-success">
                                                        <!-- <i class="material-icons">edit</i> -->
                                                        <i class="fa fa-user-edit"></i>
                                                        <br><small>Edit</small>
                                                    </a>
                                                    <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo 'hapus' . $akw['id_kajian']; ?>">
                                                        <!-- <i class="material-icons">close</i> -->
                                                        <i class="fa fa-user-slash"></i>
                                                        <br><small>Hapus</small>
                                                    </button>
                                                </td>
                                                <!-- Hapus Modal -->
                                                <div class="modal fade" id="<?php echo 'hapus' . $akw['id_kajian']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusLabel">Hapus</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Anda yakin ingin menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <a href="<?php echo base_url('kajian/delete/') . $akw['id_kajian']; ?>" class="btn btn-primary">Iya</a>
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
                            <p>Data Kosong</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>