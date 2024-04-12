<?php loadAdminPartial('head'); ?>


<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <?php loadAdminPartial('ktAside'); ?>
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <?php loadAdminPartial('ktHeader'); ?>
            <div class="row">
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl">
                        <!--begin::Card-->
                        <div class="card mb-5">
                            <!--begin::Card header-->
                            <div class="card-header border-0 pt-6  bg-primary">
                                <!--begin::Card title-->

                                <!--begin::Search-->
                                <div class="row w-100 align-items-center">
                                    <div class="col-md-6">
                                        <h6>مشاهده دنبال کنندگان </h6>
                                    </div>
                                    <div class="col-md-4">

                                    </div>

                                </div>
                                <!--end::Search-->

                                <!--begin::Card title-->
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <div class="row">
                                    <?php loadAdminPartial('message'); ?>
                                </div>
                                <div class="row">
                                    <?php if (!is_null($followers_info)): ?>
                                        <?php foreach ($followers_info as $fi): ?>
                                            <div class="col-md-4 ">
                                                <!--begin::Card-->
                                                <div class="card mt-4">
                                                    <!--begin::Card body-->
                                                    <div class="card-body d-flex flex-center flex-column p-9 bg-light-info">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-65px symbol-circle mb-5">
                                                            <!--                                                    <span class="symbol-label fs-2x fw-bold text-warning " style='background-image: url('-->
                                                            <?php //= asset($fi['avatar_image']) ?><!--')'>-->
                                                            <img src="<?= asset($fi['avatar_image']) ?>" alt="">
                                                            <!--                                                    </span>-->
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Name-->
                                                        <a href="#"
                                                           class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0"><?= $fi['nick_name'] ?? '' ?></a>
                                                        <!--end::Name-->
                                                        <!--begin::Position-->
                                                        <div class="fw-bold text-gray-400 mb-6"><?= $fi['chanel_name'] ?? "" ?></div>
                                                        <!--end::Position-->
                                                        <!--begin::Info-->
                                                        <div class="d-flex text-center mb-5">
                                                            <!--begin::Stats-->
                                                            <div class=" rounded min-w-125px  mx-3 mb-3">
                                                                <a href="<?= $fi['facebook_address'] ?>">
                                                                    <div class="fs-6 fw-bolder text-gray-700"><img
                                                                                height="30px"
                                                                                width="30px"
                                                                                src="<?= asset('upload/logos/facebook.png') ?>"
                                                                                alt=""></div>
                                                                    <div class="fw-bold text-gray-400 mt-2">آدرس فیسبوک
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class=" rounded min-w-125px  mx-3 mb-3">
                                                                <a href="<?= asset('channel/').trim($fi['chanel_name']) ?>">
                                                                <div class="fs-6 fw-bolder text-gray-700"><img
                                                                            height="30px"
                                                                            width="30px"
                                                                            class="rounded"
                                                                            src="<?= asset($fi['channel_cover_image']) ?>"
                                                                            alt=""></div>
                                                                <div class="fw-bold text-gray-400 mt-2">مشاهده کانال
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <!--end::Stats-->
                                                            <!--begin::Stats-->
                                                            <div class=" rounded min-w-125px  mx-3 mb-3">
                                                                <a href="<?= $fi['telegram_address'] ?>">
                                                                <div class="fs-6 fw-bolder text-gray-700"><img
                                                                            height="30px"
                                                                            width="30px"
                                                                            src="<?= asset('upload/logos/telegram.png') ?>"
                                                                            alt=""></div>
                                                                <div class="fw-bold text-gray-400 mt-2">آدرس تلگرام
                                                                </div>
                                                            </div>
                                                            <!--end::Stats-->
                                                        </div>
                                                        <!--end::Info-->
                                                        <!--begin::Follow-->
                                                        <a href="#" class="unfollow-me btn btn-sm btn-light-danger"
                                                           data-id="<?= $fi['id'] ?>">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
                                                            <span class="svg-icon svg-icon-3">
													<img src="<?= asset('upload/aparat/svgexport-183.svg') ?>" alt="">
												</span>
                                                            من را دنبال نکند
                                                        </a>
                                                        <!--end::Follow-->
                                                    </div>
                                                    <!--begin::Card body-->
                                                </div>
                                                <!--begin::Card-->
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="height: 80px"></div>
                        <div class="card mt-5">
                            <!--begin::Card header-->
                            <div class="card-header border-0 pt-6 bg-danger">
                                <!--begin::Card title-->

                                <!--begin::Search-->
                                <div class="row w-100 align-items-center">
                                    <div class="col-md-6">
                                        <h6>مشاهده دنبال شوندگان </h6>
                                    </div>
                                    <div class="col-md-4">

                                    </div>

                                </div>
                                <!--end::Search-->

                                <!--begin::Card title-->
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <div class="row">
                                    <?php loadAdminPartial('message'); ?>
                                </div>
                                <div class="row">
                                    <?php if (!is_null($follows_info)): ?>
                                        <?php foreach ($follows_info as $fi): ?>
                                            <div class="col-md-4 ">
                                                <!--begin::Card-->
                                                <div class="card mt-4">
                                                    <!--begin::Card body-->
                                                    <div class="card-body d-flex flex-center flex-column p-9 bg-light-danger">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-65px symbol-circle mb-5">
                                                            <!--                                                    <span class="symbol-label fs-2x fw-bold text-warning " style='background-image: url('-->
                                                            <?php //= asset($fi['avatar_image']) ?><!--')'>-->
                                                            <img src="<?= asset($fi['avatar_image']) ?>" alt="">
                                                            <!--                                                    </span>-->
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Name-->
                                                        <a href="#"
                                                           class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0"><?= $fi['nick_name'] ?? '' ?></a>
                                                        <!--end::Name-->
                                                        <!--begin::Position-->
                                                        <div class="fw-bold text-gray-400 mb-6"><?= $fi['chanel_name'] ?? "" ?></div>
                                                        <!--end::Position-->
                                                        <!--begin::Info-->
                                                        <div class="d-flex text-center mb-5">
                                                            <!--begin::Stats-->
                                                            <div class=" rounded min-w-125px  mx-3 mb-3">
                                                                <a href="<?= $fi['facebook_address'] ?>">

                                                                <div class="fs-6 fw-bolder text-gray-700"><img
                                                                            height="30px"
                                                                            width="30px"
                                                                            src="<?= asset('upload/logos/facebook.png') ?>"
                                                                            alt=""></div>
                                                                <div class="fw-bold text-gray-400 mt-2">آدرس فیسبوک
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <div class=" rounded min-w-125px  mx-3 mb-3">
                                                                <a href="<?= asset('channel/').trim($fi['chanel_name']) ?>">

                                                                <div class="fs-6 fw-bolder text-gray-700"><img
                                                                            height="30px"
                                                                            width="30px"
                                                                            class="rounded"
                                                                            src="<?= asset($fi['channel_cover_image']) ?>"
                                                                            alt=""></div>
                                                                <div class="fw-bold text-gray-400 mt-2">مشاهده کانال
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <!--end::Stats-->
                                                            <!--begin::Stats-->
                                                            <div class=" rounded min-w-125px  mx-3 mb-3">
                                                                <a href="<?= $fi['telegram_address'] ?>">

                                                                <div class="fs-6 fw-bolder text-gray-700"><img
                                                                            height="30px"
                                                                            width="30px"
                                                                            src="<?= asset('upload/logos/telegram.png') ?>"
                                                                            alt=""></div>
                                                                <div class="fw-bold text-gray-400 mt-2">آدرس تلگرام
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <!--end::Stats-->
                                                        </div>
                                                        <!--end::Info-->
                                                        <!--begin::Follow-->
                                                        <a  class="btn unfollow btn-sm btn-light-danger"
                                                           data-id="<?= $fi['id'] ?>">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
                                                            <span class="svg-icon svg-icon-3">
														<img src="<?= asset('upload/aparat/svgexport-183.svg') ?>" alt="">
												            </span>
                                                            <!--end::Svg Icon-->دنبال نمیکنم</a>
                                                        <!--end::Follow-->
                                                    </div>
                                                    <!--begin::Card body-->
                                                </div>
                                                <!--begin::Card-->
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php loadAdminPartial('footer'); ?>

<script>
    $(document).ready(function () {
        $('.unfollow').on('click' , function (e) {
            e.preventDefault();
            var follower_id = $('.unfollow').data('id');
            $.ajax({
                url: 'http://aparat-expert.local/channel/unfollows',
                type: 'POST',
                dataType: "json",
                data: { id:follower_id },
                success: function(response){

                    if(response.data ==="true"){
                        Swal.fire({
                            text: "شما کانال مورد نظر را آنفالوو کردید.!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "متوجه شدم!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            }
                        }).then((result) => {

                            location.reload()

                        });
                    }else{
                        Swal.fire({
                            text: "مشکلی پیش آمده است مجددا امتحان کنید.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "متوجه شدم!",
                            customClass: {
                                confirmButton: "btn btn-info",
                            }
                        });
                    }

                }
            });

        })
        $('.unfollow-me').on('click' , function (e) {
            e.preventDefault();
            var follower_id = $('.unfollow-me').data('id');
            $.ajax({
                url: 'http://aparat-expert.local/channel/unfollow-me',
                type: 'POST',
                dataType: "json",
                data: { id:follower_id },
                success: function(response){
                    if(response.data ==="true"){
                        Swal.fire({
                            text: "شما فرد مورد نظر را از  لیست دنبال کنندگانتان خارج کردید.!",
                            icon: "warning",
                            buttonsStyling: false,
                            confirmButtonText: "متوجه شدم!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            }
                        }).then((result) => {

                            location.reload()

                        });
                    }else{
                        Swal.fire({
                            text: "مشکلی پیش آمده است مجددا امتحان کنید.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "متوجه شدم!",
                            customClass: {
                                confirmButton: "btn btn-info",
                            }
                        });
                    }

                }
            });

        })
    })

</script>