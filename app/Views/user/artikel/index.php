<?= $this->extend('user/template/template') ?>
<?= $this->section('content'); ?>

<!-- Hero Start -->
<div class="container-fluid page-header-1 py-5 mb-5 wow fadeIn lazyloaded" style="background-image: url('<?= base_url('asset-user/images/hero_5.jpg'); ?>'); background-size: cover; background-position: center; visibility: visible; animation-name: fadeIn;">
    <div class="row py-5">
        <div class="col-12 text-center">
            <?php foreach ($profil as $perusahaan) : ?>
                <h3 class="display-3 text-white animated zoomIn">
                    <?php echo lang('Blog.titleOurarticle'); ?>
                    <?php if (!empty($perusahaan)) {
                        echo ' ' . $perusahaan->nama_perusahaan;
                    } ?>
                </h3>
            <?php endforeach; ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-pink"><?php echo lang('Blog.headerHome'); ?></a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page"><?php echo lang('Blog.titleOurarticle'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary"><?php echo lang('Blog.headerArticle'); ?></h5>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <?php foreach ($artikelterbaru as $row) : ?>
                <div class="col-lg-4 mb-4">
                    <div class="card position-relative d-flex flex-column h-100 mb-3">
                        <a href="<?= base_url((session('lang') === 'en' ? 'en/article/' : 'id/artikel/') . ($row->slug_en ?? $row->slug_id)) ?>">
                            <div class="card-img">
                                <img class="img-fluid w-100" src="<?= base_url('asset-user/images/' . $row->foto_artikel); ?>" loading="lazy">
                            </div>
                        </a>
                        <div class="bg-white border border-top-0 p-4 flex-grow-1 d-flex flex-column justify-content-between">
                            <div>
                                <a class="h2" href="<?= base_url((session('lang') === 'en' ? 'en/article/' : 'id/artikel/') . ($row->slug_en ?? $row->slug_id)) ?>">
                                    <?= session('lang') === 'en' ? strip_tags($row->judul_artikel_en) : strip_tags($row->judul_artikel); ?>
                                </a>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-body">
                                    <?= session('lang') === 'en' ? substr(strip_tags($row->deskripsi_artikel_en), 0, 50) : substr(strip_tags($row->deskripsi_artikel), 0, 50); ?>...
                                </span>
                            </div>
                            <span class="text-uppercase text-body"><?= date('d F Y', strtotime($row->created_at)); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
    .image-container {
        position: relative;
        width: 100%;
        padding-top: 100%;
        /* 1:1 Aspect Ratio */
        overflow: hidden;
    }

    .image-container img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-10px);
    }

    .card-img {
        position: relative;
        overflow: hidden;
    }

    .card-img img {
        width: 100%;
        transition: transform 0.3s;
    }

    .card:hover .card-img img {
        transform: scale(1.1);
    }

    .bg-white a {
        color: #000;
        /* Default color */
        text-decoration: none;
    }

    .bg-white a:hover {
        color: #007bff;
        /* Color on hover */
        transition: color 0.3s;
    }
</style>

<?= $this->endSection('content'); ?>