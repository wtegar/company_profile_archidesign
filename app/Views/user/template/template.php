<?php
$lang = session()->get('lang') ?? 'en';

?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>
    <?=
    session()->get('lang') == 'id'
      ? ($tbproduk->meta_title ?? $tbaktivitas->meta_title ?? $artikel['meta_title'] ?? $meta->meta_title ?? 'Judul Standar Bahasa Indonesia')
      : ($tbproduk->meta_title_en ?? $tbaktivitas->meta_title_en ?? $artikel['meta_title'] ?? $meta->meta_title_en ?? 'Default English Title');
    ?>">
  </title>

  <!-- Meta Tags -->
  <meta name="title" content="<?=
                              session()->get('lang') == 'id'
                                ? ($tbproduk->meta_title ?? $tbaktivitas->meta_title ?? $artikel['meta_title'] ?? $meta->meta_title ?? 'Judul Standar Bahasa Indonesia')
                                : ($tbproduk->meta_title_en ?? $tbaktivitas->meta_title_en ?? $artikel['meta_title'] ?? $meta->meta_title_en ?? 'Default English Title');
                              ?>">
  <meta name="description" content="<?=
                                    session()->get('lang') == 'id'
                                      ? ($tbproduk->meta_description ?? $tbaktivitas->meta_description ?? $artikel['meta_description'] ?? $meta->meta_description ?? 'Deskripsi Standar Bahasa Indonesia')
                                      : ($tbproduk->meta_description_en ?? $tbaktivitas->meta_description_en ?? $artikel['meta_description'] ?? $meta->meta_description_en ?? 'Default English Description');
                                    ?>">

  <!-- Canonical Tag -->
  <link rel="canonical" href="<?= current_url(); ?>">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Open+Sans&display=swap" rel="stylesheet">
  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('asset-user') ?>/lib/flaticon/font/flaticon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  <!-- Libraries Stylesheet -->
  <link href="<?= base_url('asset-user') ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url('asset-user') ?>/lib/animate/animate.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="<?= base_url('asset-user') ?>/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="<?= base_url('asset-user') ?>/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/jquery-ui.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/aos.css">
  <link href="<?= base_url('asset-user') ?>/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
  <script src="<?= base_url('asset-user') ?>/js/lazysizes.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/style.css">



</head>

<body>

  <?= $this->include('user/layout/header'); ?>
  <?= $this->include('user/layout/nav'); ?>

  <!-- render halaman konten -->
  <?= $this->renderSection('content'); ?>

  <!-- footer -->
  <?= $this->include('user/layout/footer');  ?>

  <!-- WhatsApp Icons -->
  <div class="floating-container">
    <div class="element-container" style="margin-bottom: 20px;">
      <?php foreach ($profil as $iconwa) : ?>
        <a class="whats-app" href="<?= $iconwa->link_whatsapp ?>" target="">
          <img src="<?= base_url('asset-user/images/iconwa.png'); ?>" alt="WhatsApp" class="my-float" style="width: 60px; height: 60px; border-radius: 50%; padding: 10px; transition: background-color 0.3s ease-in-out;">
        </a>
      <?php endforeach; ?>
    </div>
  </div>



  <!-- Your scripts here -->
  <script src="<?= base_url('asset-user') ?>/js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery-ui.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/popper.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/bootstrap.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/owl.carousel.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery.stellar.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery.countdown.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery.easing.1.3.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/aos.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery.fancybox.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery.sticky.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery.mb.YTPlayer.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/lazysizes.min.js"></script>






  <script src="<?= base_url('asset-user') ?>/js/main.js"></script>


  <script>
    "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>