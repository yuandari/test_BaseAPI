<body>
    <div id="layoutSidenav_content">
        <main>
            <!-- Page Heading -->
            <div class="container-fluid px-4">
                <!-- Tittle -->
                <h4 class="mt-3 text-center"><?= $title ?></h4>

                <div class="mb-2">
                    <div>
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>

                <a class="btn btn-sm btn-success mb-3 mt-3" href="<?= base_url('Pegawai/tambahPegawai') ?>">
                    <i class="fas fa-plus"></i>Tambah Data
                </a>

                <table class="table table-bordered table-striped">
                    <tr class="bg-primary">
                        <th class="text-center">NIP</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($pegawai as $p) : ?>
                        <tr>
                            <td><?= $p->nip ?></td>
                            <td><?= $p->nama ?></td>
                            <td><?= $p->title ?></td>
                            <td>
                                <center>
                                    <a class="btn btn-sm btn-primary" href="<?= base_url('Pegawai/updatePegawai/' . $p->id_pegawai) ?>">
                                        <i class="fas fa-edit"> Edit</i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="<?= base_url('Pegawai/deletePegawai/' . $p->id_pegawai) ?>">
                                        <i class="fas fa-trash"> Hapus</i>
                                    </a>
                                </center>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <!-- Nav Item - Logout -->
                <a class=" nav-link pb-2 pt-1" href="<?= base_url('Login/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                    <div class="nav-link-icon btn btn-sm btn-danger text-right">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </div>
                </a>
            </div>
        </main>