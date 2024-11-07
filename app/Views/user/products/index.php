<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>


<!-- Hero Start -->
<div class="container-fluid page-header-1 py-5 mb-5 wow fadeIn lazyloaded" style="background-image: url('<?= base_url('asset-user/images/hero_5.jpg'); ?>'); background-size: cover; background-position: center; visibility: visible; animation-name: fadeIn;">
    <div class="row py-5">
        <div class="col-12 text-center">
            <?php foreach ($profil as $perusahaan) : ?>
                <h3 class="display-3 text-white animated zoomIn">
                    <?php echo lang('Blog.titleOurproducts'); ?>
                    <?php if (!empty($perusahaan)) {
                        echo ' ' . $perusahaan->nama_perusahaan;
                    } ?>
                </h3>
            <?php endforeach; ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-pink"><?php echo lang('Blog.headerHome'); ?></a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page"><?php echo lang('Blog.titleOurproducts'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Products Start -->
<div class="container-fluid mt-5 pt-3 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="text-center mx-auto mb-5 mt-1" style="max-width: 600px;">
                    <h3 class="display-5 mb-0"><?php echo lang('Blog.btnOurproducts'); ?></h3>
                </div>
            </div>
            <?php foreach ($tbproduk as $produk) : ?>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4 mt-1">
                    <div class="card single-recent-cap mb-30 d-flex flex-column"> <!-- Added 'd-flex flex-column' for consistent card height -->
                        <a href="<?= base_url((session('lang') === 'en' ? 'en/product/' : 'id/produk/') . ($produk->slug_en ?? $produk->slug_id)) ?>">

                            <div class="card-img" style="max-width: 100%; overflow: hidden;">
                                <img src="<?= base_url('asset-user/images/' . $produk->foto_produk); ?>"
                                    alt="<?= (lang('Blog.Languange') == 'en') ? $produk->nama_produk_en : $produk->nama_produk_in; ?>"
                                    style="width: 100%; transition: transform 0.3s;">
                            </div>
                        </a>
                        <div class="card-body d-flex flex-column justify-content-between" style="text-align: center;">
                            <a href="<?= base_url((session('lang') === 'en' ? 'en/product/' : 'id/produk/') . ($produk->slug_en ?? $produk->slug_id)) ?>"> <!-- Gunakan slug langsung di sini -->
                                <h3 class="card-title" style="transition: color 0.3s; overflow: hidden;">
                                    <?php if (lang('Blog.Languange') == 'en') {
                                        echo $produk->nama_produk_en;
                                    }
                                    if (lang('Blog.Languange') == 'in') {
                                        echo $produk->nama_produk_in;
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
<!-- Products End -->

<style>
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
        height: 60px;
        /* Set a fixed height for the card title */
        overflow: hidden;
        /* Hide overflow text */
        display: flex;
        align-items: center;
    }

    .card-body .card-title:hover {
        color: #007bff;
        /* Or any color you prefer */
    }
</style>

<?= $this->endSection('content'); ?>