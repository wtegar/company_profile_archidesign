<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Hero Start -->
<div class="container-fluid bg-primary p-5 mb-5 custom-background-products">
    <div class="row py-5">
        <div class="col-12 text-center">
            <?php foreach ($profil as $perusahaan) : ?>
                <h1 class="display-1 text-white animated zoomIn"><?php echo lang('Blog.titleActivities');
                                                                    if (!empty($perusahaan)) {
                                                                        echo ' ' . $perusahaan->nama_perusahaan;
                                                                    } ?></h1>
            <?php endforeach; ?>
            <a href="<?= base_url('/') ?>" class="h4 text-white"><?php echo lang('Blog.headerHome'); ?></a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="" class="h4 text-white"><?php echo lang('Blog.headerActivities'); ?></a>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- About Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <?php foreach ($profil as $descper) : ?>
            <div class="row gx-5 align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="position-relative">
                        <img class="w-100 rounded wow zoomIn lazyload" data-wow-delay="0.6s" data-src="/asset-user/images/<?= $tbaktivitas->foto_aktivitas ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                                                                        echo $tbaktivitas->nama_aktivitas_en;
                                                                                                                                                                    } ?>
                                <?php if (lang('Blog.Languange') == 'in') {
                                    echo $tbaktivitas->nama_aktivitas_in;
                                } ?>" style="object-fit: cover; object-position: center; height: 100%;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-4">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary"><?php echo lang('Blog.headerActivities'); ?></h5>
                            </div>
                        </div>
                        <h1 class="display-5 mb-0"><?php if (lang('Blog.Languange') == 'en') {
                                                        echo $tbaktivitas->nama_aktivitas_en;
                                                    } elseif (lang('Blog.Languange') == 'in') {
                                                        echo $tbaktivitas->nama_aktivitas_in;
                                                    } ?></h1>
                    </div>

                    <p class="mb-4">
                        <?php if (lang('Blog.Languange') == 'en') {
                            echo $tbaktivitas->deskripsi_aktivitas_en;
                        } elseif (lang('Blog.Languange') == 'in') {
                            echo $tbaktivitas->deskripsi_aktivitas_in;
                        } ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<!-- About End -->

<style>
    .position-relative {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .w-100 {
        width: 100%;
    }

    .rounded {
        border-radius: .25rem;
    }

    .lazyload {
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }
</style>

<?= $this->endSection('content') ?>