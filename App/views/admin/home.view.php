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

        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <?php loadAdminPartial('ktHeader'); ?>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <?php loadAdminPartial('message'); ?>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="row m-4 ">
                        <div class="col-md-4">
                            <!--begin::Card-->
                            <div class="card card-flush">
                                <!--begin::Card header-->
                                <div class="card-header justify-content-center">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2><?= $user_videos_count ?? '0' ?></h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body justify-content-center text-center pt-1">
                                    <!--begin::Users-->
                                    <img src="<?= asset('upload/aparat/svgexport-17.svg') ?>" width="24px" alt="">
                                    <span>ویدیوی های شما</span>
                                    <!--end::Permissions-->
                                </div>

                                <!--end::Card footer-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <div class="col-md-4">
                            <!--begin::Card-->
                            <div class="card card-flush">
                                <!--begin::Card header-->
                                <div class="card-header justify-content-center">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2><?= $user_followers_count ?? '0' ?></h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body justify-content-center text-center pt-1">
                                    <!--begin::Users-->
                                    <img src="<?= asset('upload/aparat/svgexport-18.svg') ?>" width="24px" alt="">
                                    <span>دنبال کنندگان</span>
                                    <!--end::Permissions-->
                                </div>

                                <!--end::Card footer-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <div class="col-md-4">
                            <!--begin::Card-->
                            <div class="card card-flush">
                                <!--begin::Card header-->
                                <div class="card-header justify-content-center">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2><?= $user_revision_count ?? '0' ?></h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body justify-content-center text-center pt-1">
                                    <!--begin::Users-->
                                    <img src="<?= asset('upload/aparat/svgexport-10.svg') ?>" width="24px" alt="">
                                    <span>بازدید ویدیو</span>
                                    <!--end::Permissions-->
                                </div>

                                <!--end::Card footer-->
                            </div>
                            <!--end::Card-->
                        </div>

                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="row m-4 ">
                        <div class="col-md-6">
                            <!--begin::Card-->
                            <div class="card card-flush h-md-100">
                                <!--begin::Card header-->
                                <div class="card-header mb-5 justify-content-around ">
                                    <!--begin::Card title-->
                                    <div class="card-title justify-content-between" style="width: 98%">
                                        <h6>ویدیوهای من</h6>

                                        <a href="#" class="btn btn-sm  btn-outline-dark">
                                            <span class="text-sm">مشاهده همه</span>
                                            <img src="<?= asset('upload/icons/duotune/arrows/arr021.svg') ?>"
                                                 width="14px" alt="">
                                        </a>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body mt-12 pt-3 text-center justify-content-center"
                                     style="overflow-y: scroll">

                                        <?php if (!empty($user_videos)): ?>
                                    <div class="row">
                                            <?php foreach ($user_videos as $user_video): ?>
                                                <div class="col-md-6">
                                                    <a href="">
                                                        <div class="card">
                                                            <img class="card-img-top" height="150px"
                                                                 src="<?= $user_video['video_image'] ?>"
                                                                 alt="Card image cap">
                                                            <div class="card-body">
                                                                <p class="card-text"><?= $user_video['title'] ?></p>
                                                                <p class="card-text">
                                                                    <small class="text-muted">
                                                                        <?= Morilog\Jalali\Jalalian::forge($user_video['created_at'])->format('%B %d، %Y') ?>
                                                                    </small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php endforeach; ?>
                                    </div>
                                        <?php else: ?>
                                            <img src="<?= asset('upload/aparat/empty-video.png') ?>" alt="">

                                        <?php endif; ?>



                                    <!--end::Permissions-->
                                </div>

                            </div>
                            <!--end::Card-->
                        </div>
                        <div class="col-md-6">
                            <!--begin::Card-->
                            <div class="card card-flush h-md-100">
                                <!--begin::Card header-->
                                <div class="card-header mb-5 justify-content-around ">
                                    <!--begin::Card title-->
                                    <div class="card-title justify-content-between" style="width: 98%">
                                        <h6>دیدگاهها</h6>

                                        <a href="#" class="btn btn-sm  btn-outline-dark">
                                            <span class="text-sm">مشاهده همه</span>
                                            <img src="<?= asset('upload/icons/duotune/arrows/arr021.svg') ?>"
                                                 width="14px" alt="">
                                        </a>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body mt-12 pt-3 text-center justify-content-center">
                                    <img src="<?= asset('upload/aparat/empty-comment.png') ?>" alt="">
                                    <!--end::Permissions-->
                                </div>

                            </div>
                            <!--end::Card-->
                        </div>

                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <?php loadAdminPartial('footer'); ?>

            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
<!--begin::Drawers-->
<!--begin::Activities drawer-->



