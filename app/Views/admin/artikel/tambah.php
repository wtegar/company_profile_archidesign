<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambahkan Artikel</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4>Error</h4>
                            <p><?= session()->getFlashdata('error'); ?></p>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/artikel/proses_tambah') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <!-- Bahasa Indonesia -->
                                <h4>Bahasa Indonesia</h4>
                                <div class="mb-3">
                                    <label class="form-label">Judul Artikel</label>
                                    <input type="text" class="form-control" id="judul_artikel" name="judul_artikel" value="<?= old('judul_artikel') ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Artikel</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_artikel" name="deskripsi_artikel"><?= old('deskripsi_artikel') ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (ID)</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="<?= old('meta_title') ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (ID)</label>
                                    <textarea type="text" class="form-control" id="meta_description" name="meta_description"><?= old('meta_description') ?></textarea>
                                </div>
                                <!-- Bahasa Inggris -->
                                <h4>Bahasa Inggris</h4>
                                <div class="mb-3">
                                    <label class="form-label">Judul Artikel (English)</label>
                                    <input type="text" class="form-control" id="judul_artikel_en" name="judul_artikel_en" value="<?= old('judul_artikel_en') ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Artikel (English)</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_artikel_en" name="deskripsi_artikel_en"><?= old('deskripsi_artikel_en') ?></textarea>
                                </div>
                                <!-- Meta Title dan Meta Description dalam Bahasa Inggris -->
                                <h4>Meta Information (English)</h4>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (English)</label>
                                    <input type="text" class="form-control" id="meta_title_en" name="meta_title_en" value="<?= old('meta_title_en') ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (English)</label>
                                    <textarea type="text" class="form-control" id="meta_description_en" name="meta_description_en"><?= old('meta_description_en') ?></textarea>
                                </div>
                                <!-- Gambar Artikel -->
                                <div class="mb-3">
                                    <label class="form-label">Gambar Artikel</label>
                                    <input class="form-control <?= ($validation && $validation->hasError('foto_artikel')) ? 'is-invalid' : '' ?>" type="file" id="foto_artikel" name="foto_artikel">
                                    <?php if ($validation && $validation->hasError('foto_artikel')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto_artikel') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <p>*Ukuran gambar maksimal 572x572 pixels</p>
                                <p>*Format gambar harus berekstensi jpg/png/jpeg</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col">
                                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('success') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--//app-card-->
        </div><!--//row-->

        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection('content'); ?>