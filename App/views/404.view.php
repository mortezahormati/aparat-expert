<?php ?>
<?php loadPartial('head'); ?>


<!--nav-bar-->
<?php loadPartial('nav-bar'); ?>

<div id="wrapper" class="">
    <!-- Sidebar -->
    <?php loadPartial('sidebar'); ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid ">
            <div class="col-md-12 justify-content-center text-center">
                <img alt="404 - Page Not Found" class="image" src="<?= asset('upload/static/404.gif') ?>">
                <h1 class="sc-hKwDye inkweE heading title">
                    <span class="error-bold colon-after">
                        <span>خطای  <?= $status ?></span>
                    </span>
                   <?= $message ?>
                </h1>

                <span class="sc-pVTFL uMIwL caption paragraph" color="gray">

                </span>
            </div>
        </div>
    </div>


<?php //loadPartial('footer'); ?>





