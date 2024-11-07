<?= $this->extend('user/template/template') ?>
<?= $this->section('content'); ?>

<!-- Tambahkan Meta Tags di sini -->
<?= $this->section('head'); ?>
<title><?= esc($Title) ?></title>
<meta name="description" content="<?= esc($Meta) ?>">
<?= $this->endSection(); ?>

<!-- Hero Start -->
<div class="container-fluid bg-primary p-5 mb-5 custom-background-products">
    <div class="row py-5">
        <div class="col-12 text-center">
            <?php foreach ($profil as $perusahaan) : ?>
                <h1 class="display-1 text-white animated zoomIn"><?php echo lang('Blog.titleOurproducts');
                                                                    if (!empty($perusahaan)) {
                                                                        echo ' ' . $perusahaan->nama_perusahaan;
                                                                    } ?></h1>
            <?php endforeach; ?>
            <a href="<?= base_url('/') ?>" class="h4 text-white"><?php echo lang('Blog.headerHome'); ?></a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="" class="h4 text-white"><?php echo lang('Blog.headerProducts'); ?></a>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- About Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <?php foreach ($profil as $descper) : ?>
            <div class="row gx-5 align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="w-100 h-100 rounded wow zoomIn lazyload" data-wow-delay="0.3s" data-src="/asset-user/images/<?= esc($tbproduk->foto_produk) ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                                                                        echo esc($tbproduk->nama_produk_en);
                                                                                                                                                                    } elseif (lang('Blog.Languange') == 'in') {
                                                                                                                                                                        echo esc($tbproduk->nama_produk_in);
                                                                                                                                                                    } ?>" style="object-fit: cover; object-position: center;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-4">
                        <div class="section-title">
                            <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary"><?php echo lang('Blog.headerProducts'); ?></h5>
                        </div>
                        <h1 class="display-5 mb-0"><?php if (lang('Blog.Languange') == 'en') {
                                                        echo esc($tbproduk->nama_produk_en);
                                                    } elseif (lang('Blog.Languange') == 'in') {
                                                        echo esc($tbproduk->nama_produk_in);
                                                    } ?></h1>
                    </div>

                    <p class="mb-4">
                        <?php if (lang('Blog.Languange') == 'en') {
                            echo esc($tbproduk->deskripsi_produk_en);
                        } elseif (lang('Blog.Languange') == 'in') {
                            echo esc($tbproduk->deskripsi_produk_in);
                        } ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- About End -->

<style>
    .row {
        display: flex;
        align-items: center;
    }

    .position-relative {
        height: 100%;
    }

    .w-100 {
        width: 100%;
    }

    .h-100 {
        height: 100%;
    }
</style>

<?= $this->endSection('content') ?>
