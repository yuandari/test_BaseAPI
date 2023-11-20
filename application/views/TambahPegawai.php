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
                <a class="btn btn-sm btn-warning mb-3" href="<?= base_url('Pegawai/index') ?>">
                    <i class="fas fa-regular fa-circle-left"> </i> Kembali
                </a>

                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('Pegawai/aksi_tambahpg/') ?>">
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" class="form-control" name="nip" id="nip" value="<?= set_value('nip'); ?>">
                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama'); ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-3 col-form-label text-left">Jabatan</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="title1" name="title" value="Ketua">
                                    <label class="form-check-label" for="title">Ketua</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="title2" name="title" value="Anggota">
                                    <label class="form-check-label" for="title">Anggota</label>
                                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-12 text-right">
                                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>