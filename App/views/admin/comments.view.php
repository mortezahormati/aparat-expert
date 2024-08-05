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

                                <div class="row w-100 align-items-center">
                                    <div class="col-md-12">
                                        <div class="card" style="width: 40%; border: none !important;" >

                                            <video
                                                data-id="<?= $video['id'] ?>"
                                                poster="<?= asset($video['video_image'])  ?>"
                                                class="video-play go-video"
                                                src="<?= asset($video['video_path'])  ?>"
                                                muted>
                                            </video>

                                            <div class="card-body">
                                                <h2 class="card-text" style="font-size: 18px">
                                                    <?= $video['title']  ?>
                                                </h2>
                                                <h4>
                                                    <a href="<?= asset('channel/').trim(auth()['chanel_name']) ?>" class="text-dark" style="text-decoration: none">
                                                        <img src="<?= asset(auth()['avatar_image'])?>" width="20px" class="rounded-circle" alt="Cinque Terre">

                                                        <?=  str_replace('-',' ', auth()['chanel_name']) ?>
                                                    </a>
                                                </h4>
                                                <br>
                                                <span>
                                                <small> <?= $video['revision_count'] ?? '0' ?> بازدید .</small> <small> <?= jalaliTimeAgo($video['created_at']) ?> </small>
                                            </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Table-->
                                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                               id="kt_table_users">
                                            <!--begin::Table head-->
                                            <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-center text-muted fw-bolder fs-7 text-uppercase gs-0">

                                                <th class="min-w-125px sorting">
                                                    نام
                                                </th>
                                                <th>
                                                     نام کانال
                                                </th>
                                                <th class="min-w-250px sorting">
                                                    متن دیدگاه
                                                </th>
                                                <th>
                                                    وضعیت دیدگاه
                                                </th>
                                                <th class="min-w-100px sorting">
                                                    تاریخ ایجاد
                                                </th>
                                                <th class=" min-w-100px sorting_disabled">
                                                    عملیات
                                                </th>
                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="text-gray-600 fw-bold text-center">

                                            <?php foreach ($comments as $ca): ?>
                                                <tr class="<?= $ca['id'] % 2 === 0 ? 'even' : 'bg-secondary' ?>">
                                                    <td>

                                                        <div class=""><img class="rounded-circle ml-2" width="25px" src="<?= asset($ca['avatar_image'] ?? '') ?>" alt=""><p><?= $ca['nick_name'] ?></p></div>

                                                    </td>
                                                    <td>
                                                        <p><?= $ca['chanel_name'] ?></p>
                                                    </td>
                                                    <td class=" align-items-center">
                                                        <span class="text-center"> <?= $ca['text'] ?></span>
                                                    </td>
                                                    <td class=" align-items-center">
                                                        <span class="text-center <?= $ca['show_comments'] == '1' ? 'text-success':'text-warning' ?>"> <?= $ca['show_comments'] =='1' ? 'تایید شده' : 'تایید نشده'  ?></span>
                                                    </td>

                                                    <td data-order=""> <?= jalaliTimeAgo($ca['created_at']) ?></td>
                                                    <td class="">

                                                        <?php if( $ca['show_comments'] == '0'): ?>
                                                        <a data-comment-id="<?= $ca['id'] ?>" class=" btn-sm btn-success px-3 cm-confirm">تایید</a>
                                                        <?php endif; ?>
                                                        <a data-comment-id="<?= $ca['id'] ?>" class=' btn-sm text-white btn-danger px-3 cm-remove'>حذف </a>

                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>


                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                    </div>

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
    // on remove-comment
    $(document).on('click' , '.cm-remove' , function (e) {
        e.preventDefault();
        var comment_id = $(this).data('comment-id');

        Swal.fire({
            text: "پس از تایید این دیدگاه حذف خواهد شد ،آیا مطمعن هستید ؟",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "بله تایید میکنم",
            cancelButtonText: "خیر",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-primary"
            }
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: 'http://aparat-expert.local/administrator/comments/remove',
                    type: 'POST',
                    dataType: "json",
                    data: { id:comment_id },
                    success: function(response){
                        if(response.process==="success"){
                            Swal.fire({
                                text: "کامنت با موفقیت حذف شد",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "متوجه شدم!",
                                customClass: {
                                    confirmButton: "btn btn-info",
                                }
                            }).then((result) => {
                                location.reload()
                            });
                        }
                        if(response.process==='error'){
                            var error = response.error;
                            Swal.fire({
                                text: error,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "متوجه شدم!",
                                customClass: {
                                    confirmButton: "btn btn-info",
                                }
                            })
                        }
                        if(response.process==='notAjax'){
                            Swal.fire({
                                text: "مشکلی پیش آمده مجددا امتحان کنید",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "متوجه شدم!",
                                customClass: {
                                    confirmButton: "btn btn-info",
                                }
                            })
                        }
                    }
                });

            } else if (result.dismiss === 'cancel') {
                Swal.fire({
                    text: "درخواست حذف دیدگاه کنسل شد",
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
    //on confirm-comment
    $(document).on('click' ,'.cm-confirm',function(e){

        var comment_id = $(this).data('comment-id');

        Swal.fire({
            text: "پس از تایید این دیدگاه در صفحه ی ویدیو به نمایش گذاشته می شود،آیا مطمعن هستید ؟",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "بله تایید میکنم",
            cancelButtonText: "خیر",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-primary"
            }
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: 'http://aparat-expert.local/administrator/comments/confirm',
                    type: 'POST',
                    dataType: "json",
                    data: { id:comment_id },
                    success: function(response){

                        if(response.process==="success"){
                            console.log(123);
                            Swal.fire({
                                text: "کامنت تایید و در کانال به نمایش در خواهد آمد  ",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "متوجه شدم!",
                                customClass: {
                                    confirmButton: "btn btn-info",
                                }
                            })
                        }
                        if(response.process==='error'){
                            var error = response.error;
                            Swal.fire({
                                text: error,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "متوجه شدم!",
                                customClass: {
                                    confirmButton: "btn btn-info",
                                }
                            })
                        }
                        if(response.process==='notAjax'){
                            Swal.fire({
                                text: "مشکلی پیش آمده مجددا امتحان کنید",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "متوجه شدم!",
                                customClass: {
                                    confirmButton: "btn btn-info",
                                }
                            })
                        }
                    }
                });

            } else if (result.dismiss === 'cancel') {
                Swal.fire({
                    text: "درخواست تایید دیدگاه کنسل شد",
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
</script>
