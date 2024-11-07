<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambahkan Meta</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">

                    <!-- Display error message if there is any -->
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4>Error</h4>
                            <p><?php echo session()->getFlashdata('error'); ?></p>
                        </div>
                    <?php endif; ?>

                    <!-- Form tambah meta -->
                    <form action="<?= base_url('admin/meta/proses_tambah') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <!-- Nama Halaman -->
                                <div class="mb-3">
                                    <label class="form-label">Nama Halaman</label>
                                    <input type="text" class="form-control" id="nama_halaman" name="nama_halaman" value="<?= old('nama_halaman') ?>">
                                </div>

                                <!-- Meta Title (ID) -->
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (ID)</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="<?= old('meta_title') ?>">
                                </div>

                                <!-- Meta Title (EN) -->
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (EN)</label>
                                    <input type="text" class="form-control" id="meta_title_en" name="meta_title_en" value="<?= old('meta_title_en') ?>">
                                </div>

                                <!-- Meta Description (ID) -->
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (ID)</label>
                                    <input type="text" class="form-control" id="meta_description" name="meta_description" value="<?= old('meta_description') ?>">
                                </div>

                                <!-- Meta Description (EN) -->
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (EN)</label>
                                    <input type="text" class="form-control" id="meta_description_en" name="meta_description_en" value="<?= old('meta_description_en') ?>">
                                </div>

                                <!-- Canonical Url -->
                                <div class="mb-3">
                                    <label class="form-label">Canonical Url</label>
                                    <input type="text" class="form-control" id="canonical_url" name="canonical_url" value="<?= old('canonical_url') ?>">
                                </div>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col">
                                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo session()->getFlashdata('success') ?>
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
