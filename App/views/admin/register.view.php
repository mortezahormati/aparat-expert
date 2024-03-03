<?php loadAdminPartial('head'); ?>


<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"  style='background-image: url("upload/bg.webp")'>
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="../../demo1/dist/index.html" class="mb-12">
                        <img alt="Logo" src="<?= asset('upload/logo.png') ?>" class="h-60px" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_sign_up_form">
							<!--begin::Heading-->
							<div class="mb-10 text-center">
								<!--begin::Title-->
								<h2 class="text-dark mb-3">ثبت نام</h2>
								<!--end::Title-->
								<!--begin::Link-->

							</div>
							<!--end::Heading-->

							<div class="d-flex align-items-center mb-10">
								<div class="border-bottom border-gray-300 mw-50 w-100"></div>
								<span class="fw-bold text-gray-400 fs-7 mx-2"></span>
								<div class="border-bottom border-gray-300 mw-50 w-100"></div>
							</div>
							<!--end::Separator-->
							<!--begin::Input group-->
							<div class="row fv-row mb-7 fv-plugins-icon-container">
								<!--begin::Col-->
								<div class="col-xl-12 mt-1">
									<label class="form-label fw-bolder text-dark fs-6">نام</label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="first-name" autocomplete="off">
								<div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-xl-12 mt-1">
									<label class="form-label fw-bolder text-dark fs-6">نام خانوادگی</label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last-name" autocomplete="off">
								<div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div class="col-xl-12 mt-1">
                                    <label class="form-label fw-bolder text-dark fs-6">نام کاربری</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last-name" autocomplete="off">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-7 fv-plugins-icon-container">
								<label class="form-label fw-bolder text-dark fs-6">ایمیل</label>
								<input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off">
							<div class="fv-plugins-message-container invalid-feedback"></div></div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
								<!--begin::Wrapper-->
								<div class="mb-1">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6">رمز عبور</label>
									<!--end::Label-->
									<!--begin::Input wrapper-->
									<div class="position-relative mb-3">
										<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off">
										<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
									</div>
									<!--end::Input wrapper-->

								</div>
								<!--end::Wrapper-->
								<!--begin::Hint-->
								<!--end::Hint-->
							<div class="fv-plugins-message-container invalid-feedback"></div></div>
							<!--end::Input group=-->
							<!--begin::Input group-->
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label class="form-label fw-bolder text-dark fs-6">تکرار رمزعبور</label>
								<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" autocomplete="off">
							<div class="fv-plugins-message-container invalid-feedback"></div></div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="text-center">
								<button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-danger w-100 mb-5">
									<span class="indicator-label">ثبت نام</span>
								</button>
                                <a href="" class="btn btn-lg btn-info w-100 mb-5 mt-5">ورود به حساب کاربری</a>
                            </div>
							<!--end::Actions-->
						<div></div></form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->

			</div>
			<!--end::Authentication - Sign-up-->
		</div>
		<!--end::Main-->

