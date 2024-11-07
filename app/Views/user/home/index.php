<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Meta Tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= (session('lang') === 'en') ? $meta->meta_title_en : $meta->meta_title; ?></title>
<meta name="description" content="<?= (session('lang') === 'en') ? $meta->meta_description_en : $meta->meta_description; ?>">
<link rel="canonical" href="<?= $canonicalUrl; ?>">

<!-- TEST SLIDER img -->
<?= $this->include('user/home/slider'); ?>
<!-- END slider -->

<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center mx-auto mt-5" style="max-width: 500px;">
            <?php foreach ($profil as $title) : ?>
                <h3 class="display-5 mb-2"><?= $title->title_website; ?></h3>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <?php foreach ($profil as $descper) : ?>
                <div class="row gx-5 align-items-center" style="min-height: 500px;">
                    <div class="col-lg-5 mb-5 mb-lg-0 mt-4">
                        <div class="position-relative h-100 d-flex align-items-center justify-content-center">
                            <img class="rounded wow zoomIn lazyload" data-wow-delay="0.9s"
                                data-src="<?= base_url('asset-user/images/' . $descper->foto_utama); ?>"
                                style="object-fit: contain; object-position: center; max-width: 100%; max-height: 100%;">
                        </div>
                    </div>
                    <div class="col-lg-7 d-flex flex-column justify-content-center">
                        <div class="mb-1">
                            <div class="section-title">
                                <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary"><?php echo lang('Blog.titleAboutUs'); ?></h5>
                            </div>
                            <h3 class="display-5 mb-0"><?= $descper->nama_perusahaan; ?></h3>
                        </div>

                        <p class="mb-4">
                            <?php if (lang('Blog.Languange') == 'en') {
                                echo character_limiter($descper->deskripsi_perusahaan_en, 700);
                            } ?>
                            <?php if (lang('Blog.Languange') == 'in') {
                                echo character_limiter($descper->deskripsi_perusahaan_in, 700);
                            } ?>
                        </p>
                        <div class="button">
                            <a href="<?= base_url('about') ?>" class="btn btn-outline-primary btn-lg rounded-border"><?php echo lang('Blog.btnReadmore'); ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- About End -->



    <!-- Products Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center mx-auto mb-3 mt-1" style="max-width: 600px;">
                <h3 class="display-5 mb-0"><?php echo lang('Blog.btnOurproducts'); ?></h3>
            </div>
            <div class="container" style="overflow-x: auto;">
                <div class="row">
                    <?php $count = 0;
                    foreach ($tbproduk as $produk) :
                        if ($count < 3) { ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 mt-4">
                                <div class="card single-recent-cap mb-30">
                                    <a href="<?=base_url((session('lang') === 'en' ? 'en/product/' : 'id/produk/') . ($produk->slug_en ?? $produk->slug_id)) ?>"> <!-- Gunakan slug langsung di sini -->
                                        <div class="card-img" style="max-width: 100%; overflow: hidden;">
                                            <img src="<?= base_url('asset-user/images/' . $produk->foto_produk); ?>"
                                                alt="<?= (lang('Blog.Languange') == 'en') ? $produk->nama_produk_en : $produk->nama_produk_in; ?>"
                                                style="width: 100%; transition: transform 0.3s;">
                                        </div>
                                    </a>
                                    <div class="card-body recent-cap d-flex flex-column justify-content-center align-items-center" style="text-align: center;">
                                        <a href="<?= base_url((session('lang') === 'en' ? 'en/product/' : 'id/produk/') . ($produk->slug_en ?? $produk->slug_id)) ?>"> <!-- Gunakan slug langsung di sini -->
                                            <h3 class="card-title" style="transition: color 0.3s;">
                                                <?php if (lang('Blog.Languange') == 'en') {
                                                    echo $produk->nama_produk_en;
                                                } ?>
                                                <?php if (lang('Blog.Languange') == 'in') {
                                                    echo $produk->nama_produk_in;
                                                } ?>
                                            </h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    <?php
                            $count++;
                        }
                    endforeach; ?>
                </div>


                <br>
            </div>


        </div>
    </div>
    <!-- Products End -->


    <!-- Activities Start -->
    <div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="text-center mx-auto mb-3 mt-1" style="max-width: 600px;">
                        <h3 class="display-5 mb-0"><?php echo lang('Blog.titleActivities'); ?></h3>
                    </div>
                </div>
                <?php
                // Reverse the array to get the latest activities first
                $reversed_tbaktivitas = array_reverse($tbaktivitas);
                // Get only the 3 latest activities
                $latest_activities = array_slice($reversed_tbaktivitas, 0, 3);
                foreach ($latest_activities as $aktivitas) : ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-0">
                        <div class="card single-recent-cap mb-30">
                            <a href="<?= base_url((session('lang') === 'en' ? 'en/activities/' : 'id/kegiatan/') . ($aktivitas->slug_en ?? $aktivitas->slug_id)) ?>"> <!-- Gunakan slug langsung di sini -->
                                <div class="card-img" style="max-width: 100%; overflow: hidden;">
                                    <img src="<?= base_url('asset-user/images/' . $aktivitas->foto_aktivitas); ?>"
                                        alt="<?= (lang('Blog.Languange') == 'en') ? $aktivitas->nama_aktivitas_en : $aktivitas->nama_aktivitas_in; ?>"
                                        style="width: 100%; transition: transform 0.3s;">
                                </div>
                            </a>
                            <div class="card-body recent-cap d-flex flex-column justify-content-center align-items-center" style="text-align: center;">
                                <a href="<?= base_url((session('lang') === 'en' ? 'en/activities/' : 'id/kegiatan/') . ($aktivitas->slug_en ?? $aktivitas->slug_id)) ?>"> <!-- Gunakan slug langsung di sini -->
                                    <h3 class="card-title" style="transition: color 0.3s;">
                                        <?php if (lang('Blog.Languange') == 'en') {
                                            echo $aktivitas->nama_aktivitas_en;
                                        } ?>
                                        <?php if (lang('Blog.Languange') == 'in') {
                                            echo $aktivitas->nama_aktivitas_in;
                                        } ?>
                                    </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Activities End -->




    <style>
        .btn-outline-primary {
            background-color: transparent;
            border: 2px solid #007bff;
            /* Ganti dengan warna yang Anda inginkan */
            color: #007bff;
            /* Ganti dengan warna yang Anda inginkan */
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }

        .rounded-border {
            border-radius: 25px;
            /* Ganti dengan radius yang Anda inginkan */
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-img img {
            transition: transform 0.3s;
        }

        .card:hover .card-img img {
            transform: scale(1.1);
        }

        .card-body .card-title {
            transition: color 0.3s;
        }

        .card-body .card-title:hover {
            color: #007bff;
            /* Atau warna yang Anda inginkan */
        }
    </style>


    <?= $this->endSection('content') ?>