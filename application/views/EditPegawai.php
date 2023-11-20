<body>
    <div id="layoutSidenav_content">
        <main>
            <!-- Page Heading -->
            <div class="container-fluid px-4">
                <!-- Tittle -->
                <h4 class="mt-4"><?= $title ?></h4>

                <div class="mb-4">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
                <a class="btn btn-sm btn-warning mb-3" href="<?= base_url('Pegawai') ?>">
                    <i class="fas fa-regular fa-circle-left"> </i> Kembali
                </a>

                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <?php foreach ($pegawaii as $p) : ?>
                            <form method="POST" action="<?= base_url('Pegawai/aksi_editpg') ?>">

                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="hidden" class="form-control" name="id_pegawai" id="id_pegawai" value="<?= $p->id_pegawai ?>">
                                    <input type="text" class="form-control" name="nip" id="nip" value="<?= $p->nip ?>" required>
                                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $p->nama ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 col-form-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="title" name="title" value="Ketua" <?= $p->title == "Ketua" ? "checked" : '' ?>>
                                            <label class="form-check-label" for="title">Ketua</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="title" name="title" value="Anggota" <?= $p->title == "ANggota" ? "checked" : '' ?>>
                                            <label class="form-check-label" for="title">Anggota</label>
                                        </div>
                                    </div>
                                    <?= form_error('aktivasi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </main>