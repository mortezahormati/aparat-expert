<?php loadPartial('head'); ?>


    <style>
        .type_msg {position: relative;}
        .input_msg_write input {
            background: #00000017 none repeat scroll 0 0;
            border: 1px solid #00000017;
            border-radius: 25px;
            color: #4c4c4c;
            font-size: 12px;
            min-height: 48px;
            width: 100%;
        }
        .msg_send_btn {
            background: #3d8497f2 none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 12px;
            height: 33px;
            position: absolute;
            left: 9px;
            top: 7px;
            width: 35px;
        }
    </style>    <!--nav-bar-->
<?php loadPartial('nav-bar'); ?>

    <!--end nav bar-->
    <div id="wrapper" class="">
        <!-- Sidebar -->
        <?php loadPartial('sidebar'); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid ">
                <div class="row">
                    <div class="container-fluid  ">
                        <div class="row ">
                            <div class="col-md-9 h-md-300px ">
                                <!-- video-->
                                <div id="trailer"
                                     class="section d-flex justify-content-center embed-responsive embed-responsive-16by9">
                                    <video id="video" class="embed-responsive-item" controls loop muted>
                                        <source src="<?= asset('upload/videos/digital-timer.mp4') ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <!-- end_video-->
                                <br>
                                <!--video-title-like-->
                                <div class="row mx-auto justify-content-between bg-black ">
                                    <div class="col-md-8">
                                        <h4>
                                            تایم کانتر 5 ثانیه ای
                                        </h4>
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-2 text-left">
                                        <p>
                                            <?= number_format('8543'); ?>
                                            <img src="<?= asset('upload/videos/digital-timer.mp4') ?>" width="14px" alt="">
                                        </p>
                                    </div>

                                </div>
                                <!--end-video-title-like-->
                                <br>
                                <!-- channel_info-->
                                <div class="row mx-auto justify-content-between bg-black align-items-center ">

                                    <div class="col-md-5">
                                        <a class="btn-link">
                                            <img class="rounded-circle" src="<?= asset('upload/channel_banner/nm2.webp') ?>"
                                                 style="width: 60px" alt="">
                                            <span style="font-size: 12px">
                                            نام کانال ویدیو
                                            <span style="font-size: 10px">
                                                898 دنبال شونده
                                            </span>
                                        </span>

                                        </a>

                                    </div>

                                    <div class="col-md-5 justify-content-around align-items-center text-left ">

                                        <a href="" class="btn-link ml-3 mt-4"
                                           style="text-decoration: none; color: #000000b2;">
                                            <img class="rounded-circle" src="<?= asset('upload/aparat/svgexport-49.svg') ?>"
                                                 style="width: 24px" alt="">
                                            <span style="font-size: 12px">
                                           16
                                        </span>

                                        </a>
                                        <a href="" class="btn-link ml-3 mt-4"
                                           style="text-decoration: none; color: #000000b2;">
                                            <img class="rounded-circle" src="<?= asset('upload/aparat/svgexport-50.svg') ?>"
                                                 style="width: 24px" alt="">
                                            <span style="font-size: 12px">
                                           ذخیره
                                        </span>

                                        </a>
                                        <a href="" class="btn-link ml-3 mt-4"
                                           style="text-decoration: none; color: #000000b2;">
                                            <img class="rounded-circle" src="<?= asset('upload/aparat/svgexport-51.svg') ?>"
                                                 style="width: 24px" alt="">
                                            <span style="font-size: 12px">
                                           دانلود
                                        </span>

                                        </a>
                                        <a href="" class="btn   btn-danger ml-3" style="border-radius: 5%">
                                            <img src="<?= asset('upload/aparat/svgexport-55.svg') ?>" alt="" width="14px">
                                            <span>دنبال کردن</span>
                                        </a>


                                    </div>
                                    <!--end_channel_info-->
                                </div>
                                <hr>
                                <div class="row mx-auto justify-content-between bg-black align-items-center mt-5 ">
                                    <div class="col-md-12">
                                        <p class="text-right">
                                            در قسمت دهم سراغ موضوع جذاب برندسازی رفتیم، توی این قسمت رضا مهدوی، موسس
                                            آژانس برندینگ و خلاقیت رضا مهدوی و حامد فتاحی برنامه‌ساز و تهیه‌کننده
                                            تیزرهای تبلیغاتی درباره "تاثیر ویدیوهای ویروسی و بازاریابی چریکی در
                                            برندسازی" با هم گپ زدن.
                                            اگه موضوع برندسازی از طریق ساخت ویدیوهای ویروسی و بازاریابی چریکی برای شما
                                            هم جذابه پیشنهاد می‌کنیم این قسمت رو از دست ندین.
                                            برنامه توتاک رو دوشنبه‌ هر هفته از آپارات تماشا کنین.
                                            در ضمن ورژن صوتی این برنامه رو می‌تونین از شنوتو، کست باکس، اپل پادکست، گوگل
                                            پادکست و یوتیوب گوش کنین.
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="" class="btn-link "
                                           style="font-size:12px;text-decoration: none;color: #768484;">
                                            #تماشا کنین
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mx-auto justify-content-between bg-black align-items-center mt-5 ">
                                    <div class="col-md-12">
                                        <h4>دیدگاه ها</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="type_msg">
                                            <div class="input_msg_write">
                                                <input type="text" class="write_msg" placeholder="دیدگاه خود را بیان کنید" />
                                                <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mx-auto justify-content-between bg-black align-items-center mt-5 ">
                                    <div class="col-md-12">
                                        <div class="card border-1">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <!--begin::Wrapper-->
                                                <div class="row">
                                                <div class=" col-md-2 mb-4">
                                                    <!--begin::Container-->
                                                    <div class=" align-items-center ml-5  ">
                                                        <!--begin::Author-->
                                                        <div class="ml-2">
                                                            <div  class="text-small text-success">
                                                                <img src="<?= asset('upload/avatars/150-1.jpg') ?>" class="rounded-circle" width="50px" alt="">
                                                            </div>
                                                        </div>
                                                        <!--end::Author-->
                                                        <!--begin::Info-->
                                                        <div class=" text-dark">
                                                            <!--begin::Text-->
                                                            <div class=" align-items-center">
                                                                <!--begin::Username-->
                                                                <h6  class="mt-2 font-weight-bold">Sandra Piquet</h6>
                                                                <!--end::Username-->
                                                                <span class="text-muted "><small>2 Days ago</small></span>
                                                            </div>
                                                            <!--end::Text-->
                                                            <!--begin::Date-->

                                                            <!--end::Date-->
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Container-->
                                                    <!--begin::Actions-->

                                                    <!--end::Actions-->
                                                </div>
                                                <div class=" col-md-10 mt-5 pt-2">
                                                    <p class="font-normal">I run a team of 20 product managers, developers, QA and UX Previously we designed everything ourselves.</p>
                                                </div>
                                                </div>

                                                <!--end::Wrapper-->
                                                <!--begin::Desc-->
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">

                                <div class="row mx-auto justify-content-between bg-black ">
                                    <div class="col-md-8">
                                        <p>
                                            ویدیوهای مشابه
                                        </p>
                                    </div>
                                </div>
                                <div class="row mx-auto justify-content-between bg-black "
                                     style="background-color: #6c757d0f!important;padding: 5px">
                                   <?php foreach ($similar_videos as $l): ?>
                                    <div class="col-md-5">
                                        <video
                                                poster="<?= asset($l['video_image']) ?>"
                                                class="video-play"
                                                style="max-width: 145px"
                                                src="<?= asset($l['video_path']) ?>">
                                        </video>
                                    </div>
                                    <div class="col-md-7">
                                        <p>
                                            <?= $l['title'] ?>
                                            <br>
                                            <small class="text-muted"> <?= jalaliTimeAgo($l['created_at']) ?> </small>


                                            <small class="text-muted"></small>
                                        </p>
                                    </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!--footer-->
<?php loadPartial('footer'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        var video =$("#video");
        console.log(video.duration);
    })
</script>
