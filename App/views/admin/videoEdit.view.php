<?php loadPartial('head'); ?>

<?php loadPartial('nav-bar'); ?>

<div id="wrapper" class="">
    <!-- Sidebar -->
    <?php loadPartial('sidebar'); ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid bg-light p-4">
            <form class="" action="<?= asset('user/video/create') ?>" method="post" enctype="multipart/form-data">
                <div class="row mt-4 p-4">
                    <div class="container  ">
                        <div class="row bg-light">
                            <div class="col-md-12">
                                <?php loadAdminPartial('errors' , ['errors' => $errors ?? []]); ?>
                            </div>
                        </div>

                        <div class="row bg-light">


                            <div class="col-md-7 ml-2 ">
                                <div class="form-group">
                                    <small class="text-danger">*</small>
                                    <label> عنوان ویدیو </label>

                                    <input type="text" name="title" class="form-control"
                                           placeholder="وارد کردن اطلاعات ..." value="<?= $video['title'] ?? '' ?>" required>
                                </div>
                                <div class="form-group">
                                    <small class="text-danger">*</small>
                                    <label>متن</label>
                                    <textarea name="description" class="form-control" rows="3"
                                              placeholder="وارد کردن اطلاعات ..."><?= $video['description'] ?? '' ?></textarea>
                                    <small>
                                        در توضیحات، اطلاعاتی مفید و کافی با جمله‌بندی معنادار مرتبط با ویدیو بنویسید و
                                        از تکرار عنوان و تکرار بیش از حد کلمات کلیدی بپرهیزید.

                                    </small>
                                </div>
                                <div class="form-group">
                                    <small class="text-danger">*</small>
                                    <label>دسته بندی ویدیو <small>(اجباری)
                                        </small></label>

                                    <select class="js-example-basic-single form-control select2 select2-hidden-accessible"
                                            name="category_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($categories as $ca): ?>
                                        <option value="<?= $ca['id'] ?>"
                                        <?= $ca['id']==$video['category_id'] ? 'selected' : ''  ?>
                                        ><?= $ca['persian_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <small> انتخاب دسته‌بندی به آپارات کمک می‌کند تا محتوای شما در کنار محتواهای هم
                                        موضوع قرار گیرد.</small>
                                </div>
                                <div class="form-group">
                                    <small class="text-danger">*</small>
                                    <label>برچسب‌های ویدیو</label>
                                    <small class="text-danger">(اجباری - حداقل دو مورد)</small>
                                    <select class="js-example-basic-multiple form-control select2 " name="tags[]"
                                            multiple="multiple" style="width: 100%">
                                        <?php foreach ($selected_tags as $ta): ?>
                                        <option value="<?= $ta['id'] ?>" selected><?= $ta['persian_name'] ?></option>
                                        <?php endforeach ?>
                                        <?php foreach ($noun_selected_tags as $tas): ?>
                                            <option value="<?= $tas['id'] ?>"><?= $tas['persian_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">

                                    <label>ارسال دیدگاه</label>

                                    <select class="js-example-basic-single-2 form-control select2 select2-hidden-accessible"
                                            name="confirm_comment" style="width: 100%;" tabindex="-1"
                                            aria-hidden="true">

                                        <option value="1" <?=  (isset($video)  ? ($video['confirm_comment'] == '1' ? 'selected':'' ): '')?> >امکان نظردهی برای همه آزاد باشد</option>

                                        <option value="2" <?=  (isset($video)  ? ($video['confirm_comment'] == '2' ? 'selected':'' ): '')?>>امکان نظردهی برای همه غیر فعال باشد</option>
                                    </select>
                                    <small> انتخاب دسته‌بندی به آپارات کمک می‌کند تا محتوای شما در کنار محتواهای هم
                                        موضوع قرار گیرد.</small>
                                </div>




                            </div>
                            <div class="col-md-4 mr-2 " >
                                <div class="form-group">
                                    <small class="text-danger">*</small>
                                    <label>تاریخ انتشار</label>
                                    <input name="confirm_at" class="confirm-time form-control" value="value="<?= $video['confirm_at'] ?? '' ?> style="width: 60%"/>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <small class="text-danger">*</small>
                                    <label>انتخاب ویدیو</label>
                                    <div class="file-upload">
                                        <label>
                                            <input type="file" name="video_path">
                                            <img class="form-control" src="<?= asset('upload/static/upload-light.svg') ?>">
                                        </label>
                                    </div>
                                    <input type="text" id="filename" class="filename form-control" value="<?= asset($video['video_path']) ?? '' ?>" disabled>

                                </div>
                                <div class="form-group">
                                    <small class="text-danger">*</small>
                                    <label>انتخاب پوستر ویدیو</label>
                                    <div class="file-upload-poster" style="width: 150px">
                                        <label>
                                            <input type="file" name="video_image" style="display: none">
                                            <img class="form-control" src="<?= asset('upload/static/upload-light.svg') ?>">
                                        </label>
                                    </div>
                                    <input style="width: 150px" type="text" id="filename2" value="<?= asset($video['video_image']) ?? '' ?>" class="filename form-control" disabled>

                                </div>


                            </div>
                        </div>
                        <div class="row bg-light text-center">
                            <div class="col-md-12 mt-4">
                                <button type="submit"  class="btn-lg btn-danger " style="cursor: pointer" > انتشار ویدیو</button>
                            </div>
                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div> <!-- /#page-content-wrapper -->
</div> <!-- /#wrapper -->

<?php loadPartial('footer'); ?>
<script>
    // Dropzone has been added as a global variable.

    $(document).ready(function () {

        $(".confirm-time").pDatepicker({
            // initialValueType: "gregorian",
            format: "YYYY-MM-DD",
            onSelect: "month"
        });
        $(".file-upload input[type=file]").change(function(){
            var filename = $(this).val().replace(/.*\\/, "");
            $("#filename").val(filename);
        });
        $(".file-upload-poster input[type=file]").change(function(){
            var filename2 = $(this).val().replace(/.*\\/, "");
            $("#filename2").val(filename2);
        });
        $('.js-example-basic-single').select2();
        $('.js-example-basic-multiple').select2();
        $('.js-example-basic-single-2').select2();
    })
</script>

