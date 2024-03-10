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
                    <div id="kt_content_container" class="container-xxl">


                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer">
                            <!--begin::Card title-->
                            <div class="row w-100 align-items-center">
                                <div class="col-md-6">
                                    <h6>فرم اطلاعات کاربر جدید </h6>
                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card header-->
                        <!--begin::Content-->

                        <!--begin::Form-->
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">

                            <form id="kt_account_profile_details_form" method="post" action="<?= asset('administrator/users/create') ?>"
                                  class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
                                <?php if(!empty($errors)): ?>
                                <div class="row mb-4">
                                    <?php foreach ($errors as $error): ?>
                                        <div class="col-md-12 alert alert-danger">
                                            <?= $error ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                                <!--begin::Input group-->
                                <div class="row mb-4">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">تصویر کاربر</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                             style="background-image: url('<?=  asset($old_variable['avatar_image']) ?? '' ?> ')">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-200px h-200px"
                                                 style="background-image: url('<?= asset('upload/media/avatars/150-26.jpg') ?> ')"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                   data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                                   data-bs-original-title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="avatar_image"  accept=".png, .jpg, .jpeg">
                                                <input type="hidden" name="avatar_remove">
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                  data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                                  data-bs-original-title="Cancel avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                  data-kt-image-input-action="remove" data-bs-toggle="tooltip" title=""
                                                  data-bs-original-title="Remove avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <div class="row mb-4">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">نام کاربری</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <input type="text" name="nick_name"
                                               class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                               placeholder="نام کاربری" value="<?= $old_variable['nick_name'] ?? ''  ?>">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--begin::Input group-->
                                <div class="row mb-4">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">نام و نام خانوادگی</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <input type="text" name="name"
                                                       class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                       placeholder="نام کوچک" value="<?=  $old_variable['name'] ?? ''  ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <input type="text" name="family"
                                                       class="form-control form-control-lg form-control-solid"
                                                       placeholder="فامیلی " value="<?=  ($old_variable['family']) ?? ''  ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-4">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">ایمیل</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="email" name="email"
                                               class="form-control form-control-lg form-control-solid"
                                               placeholder="" value="<?=  ($old_variable['email']) ?? ''  ?>">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-4">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                        <span class="required">شماره تلفن همراه</span>

                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="tel" name="phone_number"
                                               class="form-control form-control-lg form-control-solid"
                                               placeholder="09121234567" value="<?=  ($old_variable['phone_number']) ?? ''  ?>">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group -->
                                <div class="row mb-4">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">آدرس وبگاه</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="web_url"
                                               class="form-control form-control-lg form-control-solid"
                                               placeholder="example.com" value="<?=  ($old_variable['web_url']) ?? ''  ?>">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-4 h-25px" >
                                </div>
                                <div class="row mb-2">
                                    <!--begin::Label-->
                                    <h4 class="col-lg-4 col-form-label fw-bold fs-2">اطلاعات کانال </h4>
                                    <br>
                                    <small>اطلاعات کانال خود را تکمیل کنید
                                    </small>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-4">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">تصویر کاور کانال</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                             style="background-image: url('<?=  asset($old_variable['channel_cover_image']) ?? '' ?>')">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-200px h-200px"
                                                 style="background-image: url('<?= asset('upload/media/avatars/150-26.jpg') ?> ')"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                   data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                                   data-bs-original-title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="channel_cover_image" accept=".png, .jpg, .jpeg">
                                                <input type="hidden" name="avatar_remove">
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                  data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                                  data-bs-original-title="Cancel avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                  data-kt-image-input-action="remove" data-bs-toggle="tooltip" title=""
                                                  data-bs-original-title="Remove avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-4">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">نام کانال </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="chanel_name"
                                               class="form-control form-control-lg form-control-solid"
                                               placeholder="" value="<?= $old_variable['chanel_name'] ?? '' ?>">
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-4">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">درباره کانال</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <textarea class="form-control form-control-lg form-control-solid"
                                                  rows="3" name="channel_description"
                                                  placeholder="توضیحاتی در مورد کانال خود بنویسید"><?= $old_variable['channel_description'] ?? '' ?></textarea>
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-4">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">رمزعبور</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <input type="password" name="password"
                                               class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                               placeholder="رمز عبور خود را وارد نمایید" value="<?= $old_variable['channel_description'] ?? '' ?>">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-2">
                                    <!--begin::Label-->
                                    <h5 class="col-lg-4 col-form-label fw-bold fs-2">شبکه های اجتماعی</h5>
                                    <br>
                                    <small>میتوانید آی‌دی کانال خود را در شبکه های اجتماعی برای کاربران به نمایش بگذارید
                                    </small>

                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-2">
                                    <!--begin::Label-->

                                    <label class="col-lg-4 col-form-label fw-bold fs-6">آدرس تلگرام </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="telegram_address"
                                               class="form-control form-control-lg form-control-solid"
                                               placeholder="" value="<?= $old_variable['telegram_address'] ?? '' ?>">
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-2">
                                    <!--begin::Label-->

                                    <label class="col-lg-4 col-form-label fw-bold fs-6">آدرس فیسبوک </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="facebook_address"
                                               class="form-control form-control-lg form-control-solid"
                                               placeholder="" value="<?= $old_variable['facebook_address'] ?? '' ?>">
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-4">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">ادمین ؟</label>
                                    <!--begin::Label-->
                                    <!--begin::Label-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <div class="form-check form-check-solid form-switch fv-row">
                                            <input name="role" class="form-check-input w-60px h-30px" type="checkbox"
                                                   id="allowmarketing" <?=  (isset($old_variable)  ? ($old_variable['role'] == 'admin' ? 'checked="checked"':'' ): '')?>>
                                            <label class="form-check-label" for="allowmarketing"></label>
                                        </div>
                                    </div>
                                    <!--begin::Label-->
                                </div>
                                <div class="row mb-0 text-md-end">
                                   <div class="col-md-12">
                                       <button type="reset" class="btn btn-light btn-active-light-danger me-2">ریست فرم
                                       </button>
                                       <button type="submit" class="btn btn-danger"
                                               id="kt_account_profile_details_submit">افزودن
                                       </button>
                                   </div>
                                </div>
                            </form>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card body-->



                    </div>

                    </div>


                </div>
            </div>

        </div>
    </div>
</div>

<?php loadAdminPartial('footer'); ?>
