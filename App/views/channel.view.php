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
                             style="background: url('<?= asset($user['channel_cover_image'])  ?>') center center;">
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle"
                                 src="<?= asset($user['avatar_image'])?>"
                                 alt="User Avatar">
                        </div>
                        <div class="widget-social-link">
                            <a href="" style="text-decoration: none !important;"
                               class="text-center text-info text-decoration-none" aria-label="left"
                               data-list-more-link="true" data-size="small">
                                <div class="content">
                                    <a href="<?= 'https://t.me/'.$user['telegram_address'] ?>" class=""><i class="fa fa-telegram"></i></a>
                                    <a href="<?= $user['facebook_address'] ?>" class=""><i class="fa fa-facebook"></i></a>
                                    <a href="<?= $user['web_url'] ?>" class=""><i class="fa fa-rss"></i></a>
<!--                                    <a href="" class=""><i class="fa fa-"></i></a>-->

                                </div>
                            </a>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-8 text-center border-right">
                                    <div class="row">
                                        <div class="col-md-3 mr-5">
                                            <div class="description-block">
                                               <h5 class="mt-2 mr-5" style="font-weight: 800">
                                                   <?= $user['chanel_name'] ?>
                                               </h5>
                                            </div>
                                        </div>
                                        <?php if(auth() && $user['id'] !== auth()['id']): ?>
                                        <div class="col-md-3">
                                            <div class="description-block">

                                                <a class="btn btn-danger p-2 text-white" style="width: 100px">  <i class="fa fa-plus "></i>
                                                    دنبال کردن</a>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 text-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="description-header">112.5 هزار</h5>
                                            <small class="text-muted">دنبال کننده</small>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="description-header">61.8 میلیون</h5>
                                            <small class="text-sm text-muted">بازدید</small>
                                        </div>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
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

                    <div class="row  ">
                        <div class="col-md-12 ">
                            <div class="">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs mb-5" style="border-bottom:none !important; ">
                                        <li class="active"><a href="#home" class="btn btn-secondary p-2" style="width: 100px"
                                                        data-toggle="tab" aria-expanded="false">خانه</a></li>
                                        <li class="mr-5 "><a href="#all_video" class="btn btn-secondary p-2"
                                                             style="width: 100px" data-toggle="tab"
                                                             aria-expanded="false">همه ویدیوها</a></li>
                                        <li class="mr-5"><a href="#about_channel" class="btn btn-secondary p-2"
                                                                   style="width: 100px" data-toggle="tab"
                                                                   aria-expanded="true">درباره کانال</a></li>
                                    </ul>






                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home">
                                            <div class="row">
                                                <div class="col-md-12 mt-3 mb-5">
                                                    <div class="row">
                                                        <video width="20%"
                                                                poster="<?= asset($last_video['video_image'])?>"
                                                                class="video-play"
                                                               muted
                                                                src="<?= asset($last_video['video_path'])?>">
                                                        </video>
                                                        <div class="col-md-7 mt-5">
                                                            <h5 class="bold"><?= $last_video['title']?></h5>

                                                            <p class="text-muted text-sm">
                                                                <small>45 بازدید .</small> <small> <?= jalaliTimeAgo($last_video['created_at']) ?> </small>
                                                            </p>
                                                            <p  class="text-muted text-sm">
                                                                <?= $last_video['description']?>
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-2 ">
                                                    <h5 >ویدیوهای دیگر
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="row justify-content-right  ">

                                                <?php foreach ($old_videos as $video): ?>
                                                <div class="card mr-3" style="border: none;width: 19%;">
                                                    <video
                                                            poster="<?= asset($video['video_image'])?>"
                                                            class="video-play"
                                                            muted
                                                            src="<?= asset($video['video_path'])?>">
                                                    </video>
                                                    <div class="card-body">
                                                        <p class="card-text"><?= $video['title']?></p>

                                                        <p class="card-text">
                                                            <small>45 بازدید .</small> <small> <?= jalaliTimeAgo($video['created_at']) ?> </small>
                                                        </p>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="all_video">
                                            <div class="row justify-content-right  ">
                                                <?php foreach ($videos as $video): ?>
                                                    <div class="card mr-3" style="border: none;width: 19%;">
                                                        <video
                                                                poster="<?= asset($video['video_image'])?>"
                                                                class="video-play"
                                                                muted
                                                                src="<?= asset($video['video_path'])?>">
                                                        </video>
                                                        <div class="card-body">
                                                            <p class="card-text"><?= $video['title']?></p>

                                                            <p class="card-text">
                                                                <small>45 بازدید .</small> <small> <?= jalaliTimeAgo($video['created_at']) ?> </small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>

                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="about_channel">
                                            <b>تیتر</b>

                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                                طراحان گرافیک است.
                                                چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                                برای شرایط فعلی تکنولوژی مورد
                                                نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                                                زیادی در شصت و سه درصد گذشته،
                                                حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها
                                                شناخت بیشتری را برای طراحان
                                                رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.
                                                در این صورت می توان امید
                                                داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان
                                                رسد وزمان مورد نیاز شامل
                                                حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی
                                                اساسا مورد استفاده قرار گیرد.
                                            </p>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                            </div>
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



