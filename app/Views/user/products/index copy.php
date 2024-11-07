<?php

use Config\App;
?>
<?= $this->extend('user/template/template') ?>

<?= $this->Section('content'); ?>
<div class="intro-section site-blocks-cover innerpage" style="background-image: url('<?= base_url('asset-user/images/hero_4.jpg'); ?>">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-12 mt-5" data-aos="fade-up">
                <?php foreach ($profil as $perusahaan) : ?>
                    <h1><?php echo lang('Blog.titleOurproducts');
                        if (!empty($perusahaan)) {
                            echo ' ' . $perusahaan->nama_perusahaan;
                        } ?></h1>
                <?php endforeach; ?>
                <p class="text-white text-center">
                    <a href="<?= base_url('user/home') ?>"><?php echo lang('Blog.headerHome');  ?></a>
                    <span class="mx-2">/</span>
                    <span><?php echo lang('Blog.headerProducts');  ?></span>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            <?php foreach ($tbproduk as $produk) : ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="card single-recent-cap mb-30">
                                    <a href="<?= base_url('product/detail/' . $produk->id_produk . '/' . url_title($produk->nama_produk_en) . '_' . url_title($produk->nama_produk_in)) ?>">
                                        <div class="card-img" style="max-width: 100%; overflow: hidden;">
                                            <img src="asset-user/images/<?= $produk->foto_produk; ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                echo $produk->nama_produk_en;
                                                                                                            } ?>
                                            <?php if (lang('Blog.Languange') == 'in') {
                                                echo $produk->nama_produk_in;
                                            } ?>" style="width: 100%; transition: transform 0.3s;">
                                        </div>
                                    </a>
                                    <div class="card-body recent-cap d-flex flex-column justify-content-center align-items-center" style="text-align: center;">
                                        <a href="<?= base_url('product/detail/' . $produk->id_produk . '/' . url_title($produk->nama_produk_en) . '_' . url_title($produk->nama_produk_in)) ?>">
                                            <h2 class="card-title" style="transition: color 0.3s;">
                                                <?php if (lang('Blog.Languange') == 'en') {
                                                    echo $produk->nama_produk_en;
                                                } ?>
                                                <?php if (lang('Blog.Languange') == 'in') {
                                                    echo $produk->nama_produk_in;
                                                } ?>
                                            </h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- </div> -->

<?= $this->endSection('content'); ?>