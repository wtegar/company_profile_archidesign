<?= $this->extend('user/template/template') ?>
<?= $this->section('content'); ?>

<style>
    .position-relative {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .article-item {
        display: flex;
        height: 110px;
        overflow: hidden;
        border-radius: 0.25rem;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        border: 1px solid #e0e0e0;
    }
    .article-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .article-image-link {
        display: block;
        width: 110px;
        height: 110px;
    }
    .article-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 0.25rem 0 0 0.25rem;
        transition: transform 0.2s ease-in-out;
    }
    .article-image-link:hover .article-image {
        transform: scale(1.05);
    }
    .article-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        flex: 1;
        padding: 0 1rem;
        white-space: normal;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .article-title {
        white-space: normal;
        word-wrap: break-word;
        overflow-wrap: break-word;
        width: auto;
    }
    .article-date {
        font-size: 1rem;
        margin-left: auto;
    }
    .d-flex {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
    }
    .w-100 {
        width: 100%;
    }
    .lazyload {
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }
    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
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
        color: #000; /* Default color */
        text-decoration: none;
    }
    .bg-white a:hover {
        color: #007bff; /* Color on hover */
        transition: color 0.3s;
    }
    .custom-border {
        border: 1px solid #e0e0e0;
        border-radius: 0.25rem;
    }
</style>

<!-- Hero Start -->
<div class="container-fluid bg-primary p-5 mb-5 custom-background-products">
    <div class="row py-5">
        <div class="col-12 text-center">
            <?php foreach ($profil as $perusahaan) : ?>
                <h1 class="display-1 text-white animated zoomIn">
                    <?= lang('Blog.titleOurarticle') . (!empty($perusahaan) ? ' ' . $perusahaan->nama_perusahaan : '') ?>
                </h1>
            <?php endforeach; ?>
            <a href="<?= base_url('/') ?>" class="h4 text-white"><?= lang('Blog.headerHome') ?></a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="" class="h4 text-white"><?= lang('Blog.headerArticle') ?></a>
        </div>
    </div>
</div>
<!-- Hero End -->

<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="row gx-5 align-items-center custom-border">
            <!-- Image Column -->
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="position-relative">
                    <img class="w-100 rounded lazyload" data-wow-delay="0.6s" src="<?= base_url('asset-user/images/' . $artikel['foto_artikel']); ?>" alt="<?= esc($artikel['judul_artikel']); ?>" style="object-fit: cover; object-position: center; height: 100%;">
                </div>
            </div>
            <!-- Text Column -->
            <div class="col-lg-7">
                <div class="mb-4 mt-4">
                    <a class="text-uppercase mb-0 text-body article-date"><?= date('d F Y', strtotime($artikel['created_at'])); ?></a>
                    <h1 class="display-5 mb-0 article-title"><?= esc($artikel['judul_artikel']); ?></h1>
                </div>
                <p class="fs-5"><?= esc($artikel['deskripsi_artikel']); ?></p>
            </div>
        </div>
    </div>
</div>

<!-- Additional Articles Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="section-title mb-3 text-center">
                <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Baca Juga</h5>
            </div>
            <?php 
            // Get 3 random keys from the array
            if (count($artikel_lain) > 0) {
                $random_keys = array_rand($artikel_lain, min(3, count($artikel_lain))); // Memastikan tidak lebih dari jumlah artikel lain
                foreach ($random_keys as $key) : 
                    $artikel_item = $artikel_lain[$key];
                    // Menentukan judul dan deskripsi berdasarkan bahasa yang dipilih
                    $judul_artikel = (session('lang') === 'en') ? esc($artikel_item->judul_artikel_en) : esc($artikel_item->judul_artikel);
                    $deskripsi_artikel = (session('lang') === 'en') ? esc($artikel_item->deskripsi_artikel_en) : esc($artikel_item->deskripsi_artikel);
            ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card position-relative d-flex flex-column h-100 mb-3">
                        <a href="<?= base_url('/artikel/detail/' . $artikel_item->slug_id) ?>"> <!-- Menggunakan slug_id -->
                            <div class="card-img">
                                <img class="img-fluid w-100" src="<?= base_url('asset-user/images/' . $artikel_item->foto_artikel); ?>" loading="lazy" alt="<?= esc($artikel_item->judul_artikel); ?>">
                            </div>
                        </a>
                        <div class="bg-white border border-top-0 p-4 flex-grow-1 d-flex flex-column justify-content-between">
                            <div>
                                <a class="h2" href="<?= base_url('/artikel/detail/' . $artikel_item->slug_id) ?>"><?= $judul_artikel ?></a> <!-- Menggunakan slug_id -->
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-body"><?= esc(substr(strip_tags($deskripsi_artikel), 0, 50)) ?>...</span>
                            </div>
                            <span class="text-uppercase text-body"><?= date('d F Y', strtotime($artikel_item->created_at)); ?></span>
                        </div>
                    </div>
                </div>
            <?php 
                endforeach; 
            } else {
                echo "<p>Tidak ada artikel lain yang tersedia.</p>";
            }
            ?>
        </div>
    </div>
</div>
<!-- Additional Articles End -->

<?= $this->endSection('content'); ?>
