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
                <div class="row" style="margin-top: 2%">
                    <div class="container  ">
                        <div class="row  ">
                            <div class="col-md-12 ">
                                <img src="<?= asset('upload/banner.png') ?>" style="width: 100%" alt="">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row" style="margin-top: 5%">
                    <div class="container-fluid  ">
                        <div class="row  ">
                            <?php foreach($videos as $key => $values): ?>

                            <div class="col-md-12 mb-4">
                                <?php foreach ($categories as $category): ?>
                                <?php if($category['persian_name'] === $key): ?>
                                <div class="row mb-3">
                                    <div class="col-md-2 ">
                                        <h6 style="font-size: 16px;font-weight:800">
                                            <?= $key ?>
                                        </h6>
                                    </div>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <a href="<?= asset('category/'.$category['id']) ?>" style="text-decoration: none !important;" class="text-center text-danger text-decoration-none" aria-label="left" data-list-more-link="true" data-size="small">
                                            <div class="content">
                                                <span class="text" style="font-size: 12px;font-weight: 800"> مشاهده همه </span>
                                                <i class="fa fa-arrow-left"></i>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                                <?php endif; ?>
                                <?php endforeach; ?>


                                <div class="row justify-content-right  ">
                                    <?php foreach ($values as $video): ?>
                                    <div class="card mr-3" style="width: 18%; border: none !important;" >

                                        <video
                                                data-id="<?= $video['id'] ?>"
                                                poster="<?= asset($video['video_image'])  ?>"
                                                class="video-play go-video"
                                                src="<?= asset($video['video_path'])  ?>"
                                                muted>
                                        </video>

                                        <div class="card-body">
                                            <p class="card-text" style="font-size: 12px">
                                                <?= $video['title']  ?>
                                            </p>
                                            <small>
                                                <a href="<?= asset('channel/').trim($video['chanel_name']) ?>" class="text-dark" style="text-decoration: none">
                                                    <img src="<?= asset($video['avatar_image'])?>" width="20px" class="rounded-circle" alt="Cinque Terre">

                                                    <?=  str_replace('-',' ', $video['chanel_name']) ?>
                                                </a>
                                            </small>

                                            <br>
                                            <span>
                                                <small>45 بازدید .</small> <small> <?= jalaliTimeAgo($video['created_at']) ?> </small>
                                            </span>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                            <?php endforeach; ?>

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
    $(document).on('click','.go-video' ,function (e) {
        var clicked_id = $(this).data('id')
        window.location = "http://aparat-expert.local/video/"+clicked_id;
    })



</script>

