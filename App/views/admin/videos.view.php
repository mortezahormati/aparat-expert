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
                        <div class="card">
                            <!--begin::Card header-->
                            <div class="card-header border-0 pt-6">
                                <!--begin::Card title-->

                                <!--begin::Search-->
                                <div class="row w-100 align-items-center">
                                    <div class="col-md-6">
                                        <h6>ویدیوها </h6>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-2 mr-4 text-left">



                                    </div>
                                </div>
                                <!--end::Search-->

                                <!--begin::Card title-->
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Table-->

                                <div class="row  ">

                                    <div class="col-md-12 ">
                                        <div class="row justify-content-around  ">

                                            <?php if(!empty($all_videos)): ?>
                                            <?php foreach($all_videos as $video): ?>
                                            <div class="card bg-light p-2" style="width: 20%;">
                                                <video poster="<?= asset($video['video_image']) ?>" class="video-play" src="<?= asset($video['video_path']) ?>" muted>
                                                </video>
                                                <div class="card-body">
                                                    <?= $video['title'] ?>
                                                    <br>
                                                    تعداد بازدید : <?= $video['revision_count'] ?>

                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <a href="<?= asset('user/video/edit/'.$video['id']) ?>"  style="border-radius: 8px" class=" p-2  btn-primary text-white" title="ویرایش" ><img src="<?= asset('upload/aparat/svgexport-90.svg') ?>" alt=""></a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a  data-id='<?= $video['id'] ?>' href="" style="border-radius: 8px"  class="delete-video p-2 btn-danger " title="حذف"><img src="<?= asset('upload/aparat/svgexport-80.svg') ?>" alt=""></a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="" style="border-radius: 8px"  class="p-2 btn-success " title="لایک"><img src="<?= asset('upload/aparat/svgexport-46.svg') ?>" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php endforeach; ?>
                                            <?php endif; ?>


                                        </div>
                                    </div>

                                </div>


                                <!--end::Table-->

                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Container-->
                </div>

            </div>


        </div>
    </div>
</div>

<?php loadAdminPartial('footer'); ?>
<script type="text/javascript">
    $(document).ready(function () {

        $('.delete-video').click(function (e) {
            e.preventDefault()

            var deleteid = $(this).data('id');

            Swal.fire({
                text: "مطمعن از حذف این ویدیو هستید ؟",
                icon: "error",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "بله حذف شود",
                cancelButtonText: "خیر",
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: 'http://aparat-expert.local/user/video/delete',
                        type: 'POST',
                        data: {id: deleteid},
                        success: function (response) {
                            location.reload()
                        }
                    });


                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "درخواست حذف کنسل شد",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "متوجه شدم!",
                        customClass: {
                            confirmButton: "btn btn-info",
                        }
                    });
                }
            });
        })
    });

    $(document).ready(function () {

        $(".video-play").on("mouseover", function (event) {
            this.play();
        }).on('mouseout', function (event) {
            this.load();
        });
        // Video is loaded and can be played
    })



</script>