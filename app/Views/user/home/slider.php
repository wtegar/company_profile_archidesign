<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php foreach ($tbslider as $key => $slider) : ?>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="<?= $key; ?>" <?= ($key === 0) ? 'class="active"' : ''; ?> aria-label="Slide <?= $key + 1; ?>"></button>
            <?php endforeach; ?>
        </div>
        <div class="carousel-inner">
            <?php foreach ($tbslider as $key => $slider) : ?>
                <div class="carousel-item <?= ($key === 0) ? 'active' : ''; ?>">
                <img class="d-block w-100 carousel-image lazyload" data-src="<?= base_url('asset-user/images/' . $slider->file_foto_slider); ?>" alt="Image">
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

<!-- Custom CSS -->
<style>
    .carousel-image {
        height: 500px;
        /* Set a fixed height */
        object-fit: cover;
        /* Maintain aspect ratio and cover the area */
    }
</style>