<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Hero Start -->
<div class="container-fluid page-header-1 py-5 mb-5 wow fadeIn lazyloaded" style="background-image: url('<?= base_url('asset-user/images/hero_5.jpg'); ?>'); background-size: cover; background-position: center; visibility: visible; animation-name: fadeIn;">
    <div class="row py-5">
        <div class="col-12 text-center">
            <?php foreach ($profil as $perusahaan) : ?>
                <h3 class="display-3 text-white animated zoomIn">
                    <?php echo lang('Blog.titleAboutUs'); ?>
                    <?php if (!empty($perusahaan)) {
                        echo ' ' . $perusahaan->nama_perusahaan;
                    } ?>
                </h3>
            <?php endforeach; ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-pink"><?php echo lang('Blog.headerHome'); ?></a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page"><?php echo lang('Blog.titleAboutUs'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- About Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <?php foreach ($profil as $descper) : ?>
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn lazyload"
                            data-wow-delay="0.9s"
                            data-src="<?= base_url('asset-user/images/' . $descper->foto_utama); ?>"
                            style="object-fit: cover; object-position: center;">

                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-4">
                        <div class="section-title">
                            <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary"><?php echo lang('Blog.titleAboutUs'); ?></h5>
                        </div>
                        <h3 class="display-5 mb-0"><?= $descper->nama_perusahaan; ?></h3>
                    </div>

                    <p class="mb-4">
                        <?php if (lang('Blog.Languange') == 'en') {
                            echo nl2br($descper->deskripsi_perusahaan_en);
                        } ?>
                        <?php if (lang('Blog.Languange') == 'in') {
                            echo nl2br($descper->deskripsi_perusahaan_in);
                        } ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- About End -->


<?= $this->endSection('content') ?>