<?php loadPartial('head'); ?>


<!--nav-bar-->
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
                                <video class="embed-responsive-item" controls autoplay loop muted>
                                    <source src="upload/videos/digital-timer.mp4" type="video/mp4">
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
                                        <img src="upload/aparat/svgexport-47.svg" width="14px" alt="">
                                    </p>
                                </div>

                            </div>
<!--end-video-title-like-->
                            <br>
<!-- channel_info-->
                            <div class="row mx-auto justify-content-between bg-black align-items-center ">

                                <div class="col-md-5">
                                    <a class="btn-link">
                                        <img class="rounded-circle" src="upload/channel_banner/nm2.webp" style="width: 60px" alt="" >
                                        <span style="font-size: 12px">
                                            نام کانال ویدیو
                                            <span style="font-size: 10px">
                                                898 دنبال شونده
                                            </span>
                                        </span>

                                    </a>

                                </div>

                                <div class="col-md-5 justify-content-around align-items-center text-left ">

                                    <a href="" class="btn-link ml-3 mt-4" style="text-decoration: none; color: #000000b2;">
                                        <img class="rounded-circle" src="upload/aparat/svgexport-49.svg" style="width: 24px" alt="" >
                                        <span style="font-size: 12px">
                                           16
                                        </span>

                                    </a>
                                    <a href="" class="btn-link ml-3 mt-4" style="text-decoration: none; color: #000000b2;">
                                        <img class="rounded-circle" src="upload/aparat/svgexport-50.svg" style="width: 24px" alt="" >
                                        <span style="font-size: 12px">
                                           ذخیره
                                        </span>

                                    </a>
                                    <a href="" class="btn-link ml-3 mt-4" style="text-decoration: none; color: #000000b2;">
                                        <img class="rounded-circle" src="upload/aparat/svgexport-51.svg" style="width: 24px" alt="" >
                                        <span style="font-size: 12px">
                                           دانلود
                                        </span>

                                    </a>
                                    <a href="" class="btn   btn-danger ml-3" style="border-radius: 5%">
                                        <img src="upload/aparat/svgexport-55.svg" alt="" width="14px">
                                        <span>دنبال کردن</span>
                                    </a>


                                </div>
<!--end_channel_info-->
                            </div>
                            <hr>
                            <div class="row mx-auto justify-content-between bg-black align-items-center mt-5 ">
                                <div class="col-md-12">
                                    <p class="text-right">
                                        در قسمت دهم سراغ موضوع جذاب برندسازی رفتیم، توی این قسمت رضا مهدوی، موسس آژانس برندینگ و خلاقیت رضا مهدوی و حامد فتاحی برنامه‌ساز و تهیه‌کننده تیزرهای تبلیغاتی درباره "تاثیر ویدیوهای ویروسی و بازاریابی چریکی در برندسازی" با هم گپ زدن.
                                        اگه موضوع برندسازی از طریق ساخت ویدیوهای ویروسی و بازاریابی چریکی برای شما هم جذابه پیشنهاد می‌کنیم این قسمت رو از دست ندین.
                                        برنامه توتاک رو دوشنبه‌ هر هفته از آپارات تماشا کنین.
                                        در ضمن ورژن صوتی این برنامه رو می‌تونین از شنوتو، کست باکس، اپل پادکست، گوگل پادکست و یوتیوب گوش کنین.
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <a href="" class="btn-link " style="font-size:12px;text-decoration: none;color: #768484;">
                                        #تماشا کنین
                                    </a>
                                </div>
                            </div>


                            </div>
                        <div class="col-md-3 bg-info   ">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!--footer-->
<?php loadPartial('footer');
