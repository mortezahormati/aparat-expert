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
                             style="background: url('<?= asset($selected_category['cover_image']) ?>') center center;">
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle"
                                 src="<?= asset($selected_category['avatar_image']) ?>"
                                 alt="User Avatar">
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-8 text-center border-right">
                                    <div class="row">
                                        <div class="col-md-3 mr-5">
                                            <div class="description-block">
                                                <h5 class="mt-2 mr-5" style="font-weight: 800">
                                                    <?= $selected_category['persian_name'] ?>
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
<!--<div class="card" style="width: 18%;">-->
<!--    <video-->
<!--            poster="https://static.cdn.asset.aparat.cloud/avt/57279991-5075-l__3632.jpg?width=300&quality=90&secret=FlWOqJWqfdFpQl27IzJ8cQ"-->
<!--            class="video-play"-->
<!--            src="https://static.cdn.asset.aparat.com/avt/57279991_15s.mp4">-->
<!--    </video>-->
<!--    <div class="card-body">-->
<!--        <p class="card-text">Some quick example text to build on the card title and-->
<!--            make-->
<!--            up the bulk of the card's content.</p>-->
<!--    </div>-->
<!--</div>-->



