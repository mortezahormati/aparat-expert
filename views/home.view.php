<?php ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!--    <link rel="stylesheet" href="assets/font-awesome.min.css" >-->
    <!--    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">


    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>

    <link href="css/custom.css" rel="stylesheet">
    <!------ Include the above in your HEAD tag ---------->
    <title>Document</title>
</head>
<body>


    <nav class="navbar navbar-expand navbar-dark" style="border-bottom: 1px solid #f5f5f9;">
        <div class="col-md-3">
            <a href="#menu-toggle" id="menu-toggle" class="navbar-brand-2">
                <i class="fa fa-bars"></i>
                <!--        <i class="fa fa-search" aria-hidden="true"></i>-->

                <!--        <span class="navbar-toggler-icon"></span>-->
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02"
                    aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="">
                <img src="upload/logo.png" alt="" height="50px">
            </a>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="form">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <input type="text" class="form-control form-input"
                               placeholder="جستجوی ویدیوهای رویدادها، شخصیت‌ها و ...">
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="#">
                            <button class="btn btn-sm btn-outline-primary " style="border-radius:50px">
                                <i class="fa fa-plus"></i>
                                <span class="font-weight-600 text-sm-left">بارگذاری ویدیو</span>
                            </button>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <a href="/login.php" style="padding: 0.5rem 1rem;color: #6f7285;text-decoration: none">
                            <i class="fa fa-user"></i>
                            <span class="font-weight-600 text-sm-left">ورود و ثبت نام </span>
                        </a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-md-0"></form>
            </div>
        </div>

    </nav>


<div id="wrapper" class="toggled">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav mt-5">
            <li class="sidebar-brand ">
                <a href="#">
                    <i class="fa fa-home ml-2 icon-sidebar-ho"></i>
                    <span>صفحه نخست </span>
                </a>
            </li>
            <li class="sidebar-brand">
                <a href="#">
                    <i class="fa fa-video-camera ml-2 icon-sidebar-ho"></i>
                    <span>لیست پخش زنده </span>
                </a>
            </li>
            <li class="sidebar-brand ">
                <a href="#">
                    <i class="fa fa-clock-o ml-2 icon-sidebar-ho"></i>
                    <span>سابقه تماشا </span>
                </a>
            </li>
            <hr>
            <h6 class="mr-2 font-weight-bold text-danger">بخش های دیگر</h6>
            <li class="sidebar-brand ">
                <a href="#">
                    <i class="fa fa-gamepad ml-2 icon-sidebar-ho"></i>
                    <span>آپارات گیم </span>
                </a>
            </li>
            <li class="sidebar-brand ">
                <a href="#">
                    <i class="fa fa-soccer-ball-o ml-2 icon-sidebar-ho"></i>
                    <span>آپارات اسپرت </span>
                </a>
            </li>
            <li class="sidebar-brand ">
                <a href="#">
                    <i class="fa fa-music ml-2 icon-sidebar-ho"></i>
                    <span>آپارات موزیک </span>
                </a>
            </li>
            <hr>
            <p class="text-right mr-3 font-weight-light" style="font-size: 12px!important;">برای دنبال کردن کانال ها،
                مشاهده ویدیوهای پیشنهادی مطابق با سلیقه شما و تجربه کاربری بهتر وارد شوید.
            </p>
            <a class="btn btn-sm btn-outline-info mr-3 text-info" style="border-radius: 50px">
                <i class="fa fa-user"></i>
                <span> ورود به آپارات</span>
            </a>
            <hr>
            <li class="sidebar-brand ">
                <a href="#">
                    <i class="fa fa-sun-o ml-2 icon-sidebar-ho"></i>
                    <span>حالت شب </span>
                </a>
            </li>
            <li class="sidebar-brand ">
                <a href="#">
                    <i class="fa fa-2x fa-mobile-phone ml-2 icon-sidebar-ho"></i>
                    <span>آپارات در موبایل </span>
                </a>
            </li>
            <hr>
            <li class="sidebar-brand ">
                <a href="#">
                    <i class="fa  fa-question-circle ml-2 icon-sidebar-ho"></i>
                    <span>پشتیبانی </span>
                </a>
            </li>
            <li class="sidebar-brand ">
                <a href="#">
                    <i class="fa fa-user-secret ml-2 icon-sidebar-ho"></i>
                    <span>قوانین </span>
                </a>
            </li>
            <li class="sidebar-brand ">
                <a href="#">
                    <i class="fa  fa-strikethrough ml-2 icon-sidebar-ho"></i>
                    <span>درآمدزایی </span>
                </a>
            </li>
            <li class="sidebar-brand ">
                <a href="#">
                    <i class="fa  fa-google-wallet ml-2 icon-sidebar-ho"></i>
                    <span>درآمدزایی </span>
                </a>
            </li>
            <hr>
            <li class="sidebar-brand ">
                <div class="row mr-4">
                    <a href="#" class="mr-1">
                        <img src="upload/twit.png" style="width: 24px" alt="">
                    </a>
                    <a href="#" class="mr-1">
                        <img src="upload/ins.png" style="width: 24px" alt="">
                    </a>
                    <a href="#" class="mr-1">
                        <img src="upload/tele.png" style="width: 24px" alt="">
                    </a>
                    <a href="#" class="mr-1">
                        <img src="upload/linkedin.png" style="width: 24px" alt="">
                    </a>

                </div>
            </li>


        </ul>

    </div> <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid ">
            <div class="row" style="margin-top: 2%">
                <div class="container  ">
                    <div class="row  ">
                        <div class="col-md-12 ">
                            <img src="upload/banner.png" style="width: 100%" alt="">
                        </div>
                    </div>
                </div>

            </div>

            <div class="row" style="margin-top: 5%">
                <div class="container  ">
                    <div class="row  ">

                        <div class="col-md-12 ">
                            <div class="row mb-3">
                                <div class="col-md-2 ">
                                    <h6>ویژه‌های آپارات
</h6>
                                </div>
                                <div class="col-md-8"></div>
                                <div class="col-md-2"></div>

                            </div>
                            <div class="row justify-content-around  ">
                                <div class="card" style="width: 18%;">
                                    <video
                                            poster="https://static.cdn.asset.aparat.cloud/avt/57279991-5075-l__3632.jpg?width=300&quality=90&secret=FlWOqJWqfdFpQl27IzJ8cQ"
                                            class="video-play"
                                            src="https://static.cdn.asset.aparat.com/avt/57279991_15s.mp4">
                                    </video>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18%;">
                                    <video
                                            poster="https://static.cdn.asset.aparat.cloud/avt/57279991-5075-l__3632.jpg?width=300&quality=90&secret=FlWOqJWqfdFpQl27IzJ8cQ"
                                            class="video-play"
                                            src="https://static.cdn.asset.aparat.com/avt/57279991_15s.mp4">
                                    </video>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18%;">
                                    <video
                                            poster="https://static.cdn.asset.aparat.cloud/avt/57279991-5075-l__3632.jpg?width=300&quality=90&secret=FlWOqJWqfdFpQl27IzJ8cQ"
                                            class="video-play"
                                            src="https://static.cdn.asset.aparat.com/avt/57279991_15s.mp4">
                                    </video>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18%;">
                                    <video
                                            poster="https://static.cdn.asset.aparat.cloud/avt/57279991-5075-l__3632.jpg?width=300&quality=90&secret=FlWOqJWqfdFpQl27IzJ8cQ"
                                            class="video-play"
                                            src="https://static.cdn.asset.aparat.com/avt/57279991_15s.mp4">
                                    </video>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18%;">
                                    <video
                                            poster="https://static.cdn.asset.aparat.cloud/avt/57279991-5075-l__3632.jpg?width=300&quality=90&secret=FlWOqJWqfdFpQl27IzJ8cQ"
                                            class="video-play"
                                            src="https://static.cdn.asset.aparat.com/avt/57279991_15s.mp4">
                                    </video>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5 ">
                            <div class="row mb-3">
                                <div class="col-md-2 ">
                                    <h6>آپارات موزیک
                                    </h6>
                                </div>
                                <div class="col-md-8"></div>
                                <div class="col-md-2">
                                    <a href="https://www.aparat.com/music" style="text-decoration: none !important;" class="text-center text-danger text-decoration-none" aria-label="left" data-list-more-link="true" data-size="small">
                                        <div class="content">
                                            <span class="text" style="font-size: 12px">ورود به آپارات موزیک</span>
                                            <i class="fa fa-arrow-left"></i>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="row justify-content-around  ">
                                <div class="card" style="width: 18%;">
                                    <video
                                            poster="https://static.cdn.asset.aparat.cloud/avt/57279991-5075-l__3632.jpg?width=300&quality=90&secret=FlWOqJWqfdFpQl27IzJ8cQ"
                                            class="video-play"
                                            src="https://static.cdn.asset.aparat.com/avt/57279991_15s.mp4">
                                    </video>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18%;">
                                    <video
                                            poster="https://static.cdn.asset.aparat.cloud/avt/57279991-5075-l__3632.jpg?width=300&quality=90&secret=FlWOqJWqfdFpQl27IzJ8cQ"
                                            class="video-play"
                                            src="https://static.cdn.asset.aparat.com/avt/57279991_15s.mp4">
                                    </video>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18%;">
                                    <video
                                            poster="https://static.cdn.asset.aparat.cloud/avt/57279991-5075-l__3632.jpg?width=300&quality=90&secret=FlWOqJWqfdFpQl27IzJ8cQ"
                                            class="video-play"
                                            src="https://static.cdn.asset.aparat.com/avt/57279991_15s.mp4">
                                    </video>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18%;">
                                    <video
                                            poster="https://static.cdn.asset.aparat.cloud/avt/57279991-5075-l__3632.jpg?width=300&quality=90&secret=FlWOqJWqfdFpQl27IzJ8cQ"
                                            class="video-play"
                                            src="https://static.cdn.asset.aparat.com/avt/57279991_15s.mp4">
                                    </video>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18%;">
                                    <video
                                            poster="https://static.cdn.asset.aparat.cloud/avt/57279991-5075-l__3632.jpg?width=300&quality=90&secret=FlWOqJWqfdFpQl27IzJ8cQ"
                                            class="video-play"
                                            src="https://static.cdn.asset.aparat.com/avt/57279991_15s.mp4">
                                    </video>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
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
<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/bootstrap.bundle.js"></script> <!-- Menu Toggle Script -->
<script>
$(document).ready(function () {
    $(".video-play").on("mouseover", function (event) {
        this.play();
    }).on('mouseout', function (event) {
        this.load();
    });

})


    $(function () {
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $(window).resize(function (e) {
            if ($(window).width() <= 768) {
                $("#wrapper").removeClass("toggled");
            } else {
                $("#wrapper").addClass("toggled");
            }
        });
    });


</script>
</body>
</html>