<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Hero Start -->
<div class="container-fluid page-header-1 py-5 mb-5 wow fadeIn lazyloaded" style="background-image: url('<?= base_url('asset-user/images/hero_5.jpg'); ?>'); background-size: cover; background-position: center; visibility: visible; animation-name: fadeIn;">
<div class="row py-5">
    <div class="col-12 text-center">
        <?php foreach ($profil as $perusahaan) : ?>
            <h3 class="display-3 text-white animated zoomIn">
                <?php echo lang('Blog.titleOurContact'); ?>
                <?php if (!empty($perusahaan)) {
                    echo ' ' . $perusahaan->nama_perusahaan;
                } ?>
            </h3>
        <?php endforeach; ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-pink"><?php echo lang('Blog.headerHome'); ?></a></li>
                <li class="breadcrumb-item active text-white" aria-current="page"><?php echo lang('Blog.titleOurContact'); ?></li>
            </ol>
        </nav>
    </div>
</div>
</div>
<!-- Hero End -->


<!-- Contact Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <!-- Elemen-elemen kontak disini -->
            <div class="col-lg-6 mb-4 d-flex justify-content-center">
                <div class="map embed-responsive embed-responsive-16by9" style="width: 100%;">
                    <?php foreach ($profil as $maps) :  ?>
                        <?php echo $maps->link_maps ?>
                    <?php endforeach;  ?>
                </div>
            </div>
            <div class="col-lg-6 mb-4 d-flex justify-content-center">
                <?php foreach ($profil as $desc) : ?>
                    <div class="card contact-card" style="width: 100%;">
                        <div class="card-body" style="margin-left: 50px;">
                            <div class="section-title mb-4 mt-3">
                                <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Hubungi Kami</h5>
                            </div>
                            <blockquote class="blockquote">
                            <div class="col-lg-5">
            <div class="row px-3">
                <div class="col-12 p-0">
                    <?php foreach ($profil as $desc) : ?>

                       <h4>
                            <?php if (lang('Blog.Languange') == 'en') {
                                echo $desc->deskripsi_kontak_en;
                            } ?>
                            <?php if (lang('Blog.Languange') == 'in') {
                                echo $desc->deskripsi_kontak_in;
                            } ?>
                        </h4>
                            <h4><?php echo lang('Blog.email');  ?> : <?php echo  $desc-> email?></h4>
                        <h4><?php echo lang('Blog.notelp');  ?> : <?php echo  $desc-> no_hp?></h4>

                    <?php endforeach;  ?>
                </div>
            </div>
        </div>
                            </blockquote>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<style>
    .contact-card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .contact_details_row {
        display: flex;
        flex-direction: column;
        gap: 15px;

    }

    .contact-item {
        display: flex;
        align-items: center;
    }

    .contact-item .icon {
        background-color: #f46c25;
        border-radius: 50%;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        margin-right: 20px;
    }

    .contact-item .details h4 {
        margin: 0;
    }

    .contact-item .details p {
        margin: 0;
        font-size: 17px;
    }

    @media (max-width: 991px) {

        .map,
        .contact-card {
            margin-bottom: 30px;
        }
    }
</style>




<!-- Contact End -->


<?= $this->endSection('content'); ?>