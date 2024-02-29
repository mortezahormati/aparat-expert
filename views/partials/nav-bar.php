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
            <img src="<?= asset('upload/logo.png') ?>" alt="" height="50px">
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
                    <a href="<?= asset('login') ?>" style="padding: 0.5rem 1rem;color: #6f7285;text-decoration: none">
                        <i class="fa fa-user"></i>
                        <span class="font-weight-600 text-sm-left">ورود و ثبت نام </span>
                    </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-md-0"></form>
        </div>
    </div>

</nav>
