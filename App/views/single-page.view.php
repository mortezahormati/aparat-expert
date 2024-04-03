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
                                    <video id="video" class="embed-responsive-item video-revision" data-id="<?= $video['id'] ?>" controls loop >
                                        <source src="<?= asset($video['video_path'] ?? '') ?>" type="video/mp4">
                                    </video>
                                </div>
                                <!-- end_video-->
                                <br>
                                <!--video-title-like-->
                                <div class="row mx-auto justify-content-between bg-black ">
                                    <div class="col-md-8">
                                        <h4>
                                            <?= $video['title'] ?? '' ?>
                                        </h4>
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-2 text-left">
                                        <p>
                                            <span class="revision-span" ><?= number_format($video['revision_count'] ?? '0'); ?></span>
                                            <i class="fa fa-eye"></i>
                                        </p>
                                    </div>

                                </div>
                                <!--end-video-title-like-->
                                <br>
                                <!-- channel_info-->
                                <div class="row mx-auto justify-content-between bg-black align-items-center ">

                                    <div class="col-md-5">
                                        <a href="<?= asset('channel/').trim($user_channel_info['chanel_name']) ?>" class="btn text-dark ">
                                            <img class="rounded-circle" src="<?= asset('upload/channel_banner/nm2.webp') ?>"
                                                 style="width: 60px" alt="">
                                            <span style="font-size: 14px"><?= $user_channel_info['chanel_name'] ?>
                                                <br>

                                        </span>

                                        </a>

                                    </div>

                                    <div class="col-md-5 justify-content-around align-items-center text-left ">

                                         <span style="font-size: 14px;margin-left: 15px">
                                                <?= $followers_count['follows_count'].'   ' ?>دنبال شونده
                                         </span>
                                        <a href="" class="btn-link  mt-4 like-place"
                                           style="text-decoration: none; color: #000000b2;">
                                            <img class="rounded-circle like-count" data-id="<?= $video['id'] ?>" src="<?= asset('upload/aparat/svgexport-49.svg') ?>"
                                                 style="width: 24px" alt="">
                                        </a>
                                        <span class="ml-3 like-counter" style="font-size: 12px">

                                           <?= $video['like_count'] ?? '0' ?>
                                        </span>



                                        </a>
                                        <a href="<?= asset($video['video_path']) ?? '' ?>" class="btn-link ml-3 mt-4"
                                           style="text-decoration: none; color: #000000b2;" download>
                                            <img class="rounded-circle" src="<?= asset('upload/aparat/svgexport-51.svg') ?>"
                                                 style="width: 24px" alt="">
                                            <span style="font-size: 12px">
                                           دانلود
                                        </span>

                                        </a>
                                        <?php if(auth() && $user_channel_info['id'] !== auth()['id']  &&  !in_array($user_channel_info['id'] ,$followers_id ?? [])): ?>
                                            <a href="" class="btn   btn-danger ml-3 btn-add-followers" data-follower-id="<?= $user_channel_info['id'] ?>" style="border-radius: 5%">
                                                <i class="fa fa-plus"></i>
                                                <span>دنبال کردن</span>
                                            </a>
                                        <?php endif; ?>
                                        <?php if(auth() && $user_channel_info['id'] !== auth()['id']  && in_array($user_channel_info['id'] ,$followers_id ?? [])): ?>
                                            <a href="" class="btn  btn-outline-danger ml-3 btn-remove-followers" data-follower-id="<?= $user_channel_info['id'] ?>" style="border-radius: 5%">
                                                <i class="fa fa-minus"></i>
                                                <span>دنبال نکردن</span>
                                            </a>
                                        <?php endif; ?>



                                    </div>
                                    <!--end_channel_info-->
                                </div>
                                <hr>
                                <div class="row mx-auto justify-content-between bg-black align-items-center mt-5 ">
                                    <div class="col-md-12">
                                        <p class="text-right">
                                          <?= $video['description'] ?>
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                    <?php if (!is_null($tags)): ?>
                                        <?php foreach ($tags as $tag): ?>
                                        <a href="" class="btn-link "
                                           style="font-size:12px;text-decoration: none;color: #768484;margin-right: 5px">

                                            <?= '#'.$tag['persian_name'] ?>
                                        </a>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
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
                                                <input type="text" class="write_msg pr-4" placeholder="دیدگاه خود را بیان کنید" />
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
                                                data-id="<?= $l['id'] ?>"
                                                poster="<?= asset($l['video_image']) ?>"
                                                class="video-play go-video"
                                                style="max-width: 145px"
                                                src="<?= asset($l['video_path']) ?> " muted loop>
                                        </video>
                                    </div>
                                    <div class="col-md-7">
                                        <p style="font-size: 12px">
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
    // $(document).on('click','.video-revision' , function (e){
    $(document).on('click','.go-video' ,function (e) {
        var clicked_id = $(this).data('id')
        window.location = "http://aparat-expert.local/video/"+clicked_id;
    })

    $(document).on('click' , '.like-count' , function (e) {

        e.preventDefault()
        var id =$(this).data('id')
        var element = $(this)
        $.ajax({
            url: 'http://aparat-expert.local/video/likes',
            type: 'POST',
            dataType: "json",
            data: { id:id },
            success: function(response){
                if(response.proccess ==="success"){
                    element.attr('src' , 'http://aparat-expert.local/upload/aparat/svgexport-180.svg');
                    element.removeClass('like-count')
                    element.addClass('unlike-count')
                    $('.like-counter').html(response.video_like)
                }
            }
        });
    })
    $(document).on('click' , '.unlike-count' , function (e) {

        e.preventDefault()
        var id =$(this).data('id')
        var element = $(this)
        $.ajax({
            url: 'http://aparat-expert.local/video/unlikes',
            type: 'POST',
            dataType: "json",
            data: { id:id },
            success: function(response){
                if(response.proccess ==="success"){
                    element.attr('src' , 'http://aparat-expert.local/upload/aparat/svgexport-49.svg');
                    element.removeClass('unlike-count')
                    element.addClass('like-count')
                    $('.like-counter').html(response.video_like)
                }
            }
        });
    })
    $(document).ready(function () {
        $('.btn-add-followers').on('click' , function (e) {
            e.preventDefault();
            var follower_id = $('.btn-add-followers').data('follower-id');
            $.ajax({
                url: 'http://aparat-expert.local/channel/follows',
                type: 'POST',
                dataType: "json",
                data: { id:follower_id },
                success: function(response){
                    if(response.process ==="true"){
                        Swal.fire({
                            text: "درخواست شما با موفقیت انجام شد",
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
                    if(response.process ==="existed"){
                        Swal.fire({
                            text: "این کانال قبلا توسط شما دنبال شده است",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "متوجه شدم!",
                            customClass: {
                                confirmButton: "btn btn-info",
                            }
                        });
                    }
                    if(response.process ===false) {
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
        $('.btn-remove-followers').on('click' , function (e) {
            e.preventDefault();
            var follower_id = $('.btn-remove-followers').data('follower-id');
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

    })




    // })
    $(document).ready(function () {
        var video =$("#video");
        console.log(video.duration);
    })
</script>
