<!-- Topbar Start -->
<div class="container-fluid bg-light p-0">
    <?php foreach ($profil as $descper) : ?>
        <div class="row gx-0 d-none d-lg-flex justify-content-center">
            <div class="col-lg-7 px-5 text-start justify-content-center align-items-center d-lg-flex">
                <small>
                    <div class="h-100 d-inline-flex align-items-center py-3 topbar-item" style="padding: 10px 0; margin-right: 10px; margin-left: 10px;">
                        <p class="fas fa-map-marker-alt text-primary me-2"></p>
                        <p><?= $descper->alamat; ?></p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-3 topbar-item" style="padding: 10px 0; margin-right: 10px; margin-left: 10px;">
                        <p class="far fa-envelope text-primary me-2"></p>
                        <p><?= $descper->email; ?></p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-3 topbar-item" style="padding: 10px 0; margin-right: 10px; margin-left: 10px;">
                        <p class="fas fa-phone-alt text-primary me-2"></p>
                        <p><?= $descper->no_hp; ?></p>
                    </div>
                </small>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- Topbar End -->