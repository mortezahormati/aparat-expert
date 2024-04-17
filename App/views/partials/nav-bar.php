<style>
    .search-input:focus{
        border-radius: 50px;
        background-color: #f5f5f9;
    }
</style>
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
        <a href="<?= asset('') ?>">
            <img src="<?= asset('upload/logo.png') ?>" alt="" height="50px">
        </a>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="form">
                    <i class="fa fa-search "  aria-hidden="true"></i>
                    <input type="text" id="search" class="form-control form-input search-input"
                           placeholder="جستجوی ویدیوهای رویدادها، شخصیت‌ها و ...">
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 serach-box d-none " style="min-height: 90px;background-color: #f5f5f9;border-radius: 16px;padding: 20px 30px;margin-top: 2px;position: absolute;z-index: 999;margin-right: 10%;border: 1px solid #df1a5d;">
<!--               users -->
               <div class="row users-search" >




               </div>
<!--                video-->
                <div class="row videos-search justify-content-center">


                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

    </div>

    <div class="col-md-3">
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">

                <?php if (\Framework\Session::has('user')): ?>

                    <div class="dropdown">
                        <a type="button" style="border-radius: 50px" class="btn btn-outline-info dropdown-toggle  "
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><?= 'خوش آمدید  ' . \Framework\Session::get('user')['nick_name'] ?></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                            <a class="dropdown-item" href="<?= asset('administrator') ?>">
                                <i class="fa fa-gear"></i>
                                <span>تنظیمات</span>
                            </a>
                            <?php if(\Framework\Session::get('user')['role'] === 'user'): ?>
                            <a class="dropdown-item" href="<?= asset('user/video/create') ?>">
                                <i class="fa fa-video-camera"></i>
                                <span>بارگذاری ویدیو</span>
                            </a>
                            <?php endif; ?>
                            <div class="dropdown-divider"></div>
                            <form class="dropdown-item" method="post" action="<?= asset('logout') ?>" >
                                <input type="hidden" name="_method" value="logout" >
                                <button type="submit" class="btn-sm btn-danger">
                                    <i class="fa fa-sign-out"></i>
                                    <span>خروج</span>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                <li class="nav-item ">
                    <a class="nav-link" href="<?= asset('user/video/create') ?>">
                        <button class="btn btn-sm btn-outline-primary " style="border-radius:50px">
                            <i class="fa fa-plus"></i>
                            <span class="font-weight-600 text-sm-left">بارگذاری ویدیو</span>
                        </button>
                    </a>
                </li>
                <li class="nav-item mt-3">

                    <a href="<?= asset('login') ?>" style="padding: 0.5rem 1rem;color: #6f7285;text-decoration: none">
                        <i class="fa fa-user"></i>
                        <span class="font-weight-600 text-sm-left">ورود و ثبت نام </span>
                    </a>
                </li>
            </ul>
            <?php endif; ?>


            <form class="form-inline my-2 my-md-0"></form>
        </div>
    </div>


</nav>

<script>



    $('#search').on('keyup' , function (e) {
       var count_char = $(this).val().length;
       if($(this).val() === ''){
            $('.serach-box').addClass('d-none');
           $('.videos-search').html('');
           $('.users-search').html('');
        }
       if(count_char >= 4){
           $data = $(this).val()
           $.ajax({
               type : 'get',
               dataType: "json",
               url : 'http://aparat-expert.local/search',
               data:{'search_name':$data},
               success:function(data){
                   // console.log(data.users);
                   var videos = data.videos;
                   var users = data.users;


                   if(videos.length > 0 ){
                       $('.serach-box').removeClass('d-none');
                       $('.videos-search').html('')
                       $('.videos-search').append(
                           `<div class="col-md-12 mb-3 mt-3"><h5>ویدیوها </h5><hr></div>`
                       )
                       $.each(videos , function ($key , $value){

                           $('.videos-search').append(
                               `
                        <div class="card mr-1" style="width: 20%; border: none !important;">
                            <video data-id="`+ $value.id +`" poster="http://aparat-expert.local/`+$value.video_image+`" class="video-play go-video"  muted="">
                            </video>
                            <div class="card-body">
                                <p class="card-text" style="font-size: 12px">
                                    `+$value.title +`
                                </p>

                            </div>
                        </div>
                           `
                           );
                       })
                   }

                   if(users.length > 0 ){
                       $('.serach-box').removeClass('d-none');
                       $('.users-search').html('')
                       $('.users-search').append(
                           `<div class="col-md-12 mb-3 "><h5>کانال ها  </h5><hr></div>`
                       );
                       $.each(users , function ($key , $value){
                           $('.users-search').append(
                               `
                               <div class="col-md-3 " >
                                   <a href="http://aparat-expert.local/channel/`+ $value.chanel_name + `" class="text-dark" style="text-decoration: none;cursor: pointer">
                                   <img class="rounded rounded-circle" style="width: 35px" src="http://aparat-expert.local/`+ $value.avatar_image +`" alt="">
                                       <small>`+ $value.chanel_name +`</small>
                                   </a>
                               </div>

                               `
                           );
                       })
                   }

               }

           })
       }

    });
    $(document).on('click','.go-video' ,function (e) {
        var clicked_id = $(this).data('id')
        window.location = "http://aparat-expert.local/video/"+clicked_id;
    })
</script>
