

<?php ?>

<?php loadPartial('head'); ?>


<!--nav-bar-->
<?php loadPartial('nav-bar'); ?>

<!--end nav bar-->
<div id="wrapper" class="toggled">
    <!-- Sidebar -->
    <?php loadPartial('sidebar'); ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid ">
            <div class="row">

                <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header"
                             style="background: url('<?= asset('upload/channel_banner/favorites.png') ?>') center center;">
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle"
                                 src="<?= asset('upload/channel_banner/favorites.png') ?>"
                                 alt="User Avatar">
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-8 text-center border-right">
                                    <div class="row">
                                        <div class="col-md-3 mr-5">
                                            <div class="description-block">
                                                <h5 class="mt-2 mr-5" style="font-weight: 800">
                                                    <?= 'علاقه مندی های من ' ?>
                                                </h5>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>

            </div>

            <div class="row" style="margin-top: 5%">
                <div class="col-md-12  ">
                    <div class="row justify-content-right  ">
                        <?php foreach ($videos as $video): ?>
                            <div class="card mr-3" style="border: none;width: 19%;">
                                <video
                                        data-id="<?= $video['id']?>"
                                        poster="<?= asset($video['video_image']) ?>"
                                        class="video-play video-link"
                                        muted
                                        src="<?= asset($video['video_path']) ?>">
                                </video>
                                <div class="card-body">
                                    <p class="card-text"><?= $video['title'] ?></p>

                                    <p class="card-text">
                                        <small><?= $video['revision_count'] ?? '0' ?> بازدید .</small>
                                        <small> <?= jalaliTimeAgo($video['created_at']) ?> </small>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div> <!-- /#page-content-wrapper -->
</div> <!-- /#wrapper -->
<!-- Bootstrap core JavaScript -->


<!--footer-->
<?php loadPartial('footer'); ?>
<script>
    $(document).on('click' , '.video-link', function (e) {
        var clicked_id = $(this).data('id')
        window.location = "http://aparat-expert.local/video/"+clicked_id;
    })
</script>




