<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <a class="btn btn-round btn-sm float-right btn-primary" href="<?php echo base_url('ustadz/add'); ?>">
                            <!-- <i class="material-icons">add_circle</i> -->
                            <i class="fa fa-user-plus"></i>
                            &nbsp;Tambah
                        </a>
                        <h3 class="card-title ">Daftar Ustadz</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($ustadz) : ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class=" text-primary">
                                        <th class="text-center">#</th>
                                        <th></th>
                                        <th>Nama</th>
                                        <th>No. Telp</th>
                                        <th>Alamat</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        <?php foreach ($ustadz as $ust) : ?>
                                            <tr>
                                                <td class="text-center"><?php echo ++$no; ?></td>
                                                <td class=" table-shopping">
                                                    <div class="img-container">
                                                        <img src="<?php echo base_url('assets/img/ustadz/') . $ust['foto']; ?>" rel="nofollow" alt="...">
                                                    </div>
                                                </td>
                                                <td><?php echo $ust['nama']; ?></td>
                                                <td><?php echo $ust['no_telp']; ?></td>
                                                <td><?php echo $ust['alamat']; ?></td>
                                                <td class="td-actions text-right">
                                                    <a href="<?php echo base_url('ustadz/show/') . $ust['id_ustadz']; ?>" rel="tooltip" class="btn btn-info">
                                                        <!-- <i class="material-icons">person</i> -->
                                                        <i class="fa fa-user"></i>
                                                        <br><small>Lihat</small>
                                                    </a>
                                                    <a href="<?php echo base_url('ustadz/edit/') . $ust['id_ustadz']; ?>" rel="tooltip" class="btn btn-success">
                                                        <!-- <i class="material-icons">edit</i> -->
                                                        <i class="fa fa-user-edit"></i>
                                                        <br><small>Edit</small>
                                                    </a>
                                                    <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo 'hapus' . $ust['id_ustadz']; ?>">
                                                        <!-- <i class="material-icons">close</i> -->
                                                        <i class="fa fa-user-slash"></i>
                                                        <br><small>Hapus</small>
                                                    </button>

                                                </td>
                                                <!-- Hapus Modal -->
                                                <div class="modal fade" id="<?php echo 'hapus' . $ust['id_ustadz']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true">
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
                                                                <a href="<?php echo base_url('ustadz/delete/') . $ust['id_ustadz']; ?>" class="btn btn-primary">Iya</a>
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