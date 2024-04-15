<div id="sidebar-wrapper">
    <ul class="sidebar-nav mt-5">
        <li class="sidebar-brand ">
            <a href="<?= asset('') ?>">
                <i class="fa fa-home ml-2 icon-sidebar-ho"></i>
                <span>صفحه نخست </span>
            </a>

        </li>
        <li class="sidebar-bran ">
            <a href="<?= asset('most-revision-videos') ?>">
                <i class="fa fa-camera ml-2 icon-sidebar-ho"></i>
                <span>پربازدیدترین ها</span>
            </a>
        </li>


        <hr>
        <h6 class="mr-2 font-weight-bold text-danger">بخش های دیگر</h6>
        <?php if(\Framework\Session::has('categories') && count(\Framework\Session::get('categories')) > 0): ?>

        <?php foreach(\Framework\Session::get('categories') as $cat): ?>
        <li class="sidebar-brand ">
            <a href="<?= asset('category/'.$cat['id']) ?>">
                <i class="fa fa-video-camera ml-2 icon-sidebar-ho"></i>
                <span><?= $cat['persian_name'] ?></span>
            </a>
        </li>

        <?php endforeach; ?>

        <?php endif; ?>
        <?php if(auth()): ?>
        <li class="sidebar-brand ">
            <a href="<?= asset('favorites') ?>">
                <i class="fa fa-plus-square ml-2 icon-sidebar-ho"></i>
                <span><?='علاقه مندی های من' ?></span>
            </a>
        </li>
        <?php endif; ?>
        <hr>
        <p class="text-right mr-3 font-weight-light" style="font-size: 12px!important;">برای دنبال کردن کانال ها،
            مشاهده ویدیوهای پیشنهادی مطابق با سلیقه شما و تجربه کاربری بهتر وارد شوید.
        </p>
        <a href="<?= asset('login') ?>" class="btn btn-sm btn-outline-info mr-3 text-info" style="border-radius: 50px">
            <i class="fa fa-user"></i>
            <span> ورود به آپارات</span>
        </a>
        <hr>
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
                    <img src="<?= asset('upload/twit.png') ?>" style="width: 24px" alt="">
                </a>
                <a href="#" class="mr-1">
                    <img src="<?= asset('upload/ins.png') ?>" style="width: 24px" alt="">
                </a>
                <a href="#" class="mr-1">
                    <img src="<?= asset('upload/tele.png') ?>" style="width: 24px" alt="">
                </a>
                <a href="#" class="mr-1">
                    <img src="<?= asset('upload/linkedin.png') ?>" style="width: 24px" alt="">
                </a>

            </div>
        </li>


    </ul>

</div> <!-- /#sidebar-wrapper -->
