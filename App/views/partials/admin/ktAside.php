<div id="kt_aside" class="aside aside-light aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="../../demo1/dist/index.html">
            <img alt="Logo" src="<?= asset('upload/logo.png') ?>" class="h-50px logo"/>
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-danger aside-toggle"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
									<path opacity="0.5"
                                          d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                          fill="black"/>
									<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                          fill="black"/>
								</svg>
							</span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
             data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class=" menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                 id="#kt_aside_menu" data-kt-menu="true">

                <div class="menu-item" style="text-align: center">
                    <div class="menu-content p-8 justify-content-center">
                        <div class="cursor-pointer symbol symbol-150px symbol-md-150px" data-kt-menu-trigger="click"
                             data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                            <img src="<?= asset('upload/avatars/150-26.jpg') ?>" alt="user"/>
                        </div>
                    </div>

                </div>


                <div class="menu-item mt-8">
                    <a class="menu-link active" href="<?= asset('administrator') ?>">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
                                                <img src="<?= asset('upload/aparat/svgexport-8.svg') ?>" alt="">
											
											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">داشبورد</span>
                    </a>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen009.svg-->
											<span class="svg-icon svg-icon-2">
												 <img src="<?= asset('upload/aparat/svgexport-users.svg') ?>"
                                                      width="25px" alt="">
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title text-danger">کاربران</span>
										<span class="menu-arrow"></span>
									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;"
                         kt-hidden-height="117">
                        <div class="menu-item">
                            <a class="menu-link" href="<?= asset('administrator/users') ?>">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">کاربران</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="<?= asset('administrator/users/create') ?>">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">کاربر جدید</span>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="menu-item ">
                    <a class="menu-link active" href="<?= asset('administrator/videos') ?>">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
                                                <img src="<?= asset('upload/aparat/svgexport-10.svg') ?>" alt="">

											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">ویدیوها</span>
                    </a>
                </div>
                <div class="menu-item ">
                    <a class="menu-link active" href="#">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
                                                <img src="<?= asset('upload/aparat/svgexport-10.svg') ?>" alt="">

											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">ویدیوهای من</span>
                    </a>
                </div>
                <div class="menu-item ">
                    <a class="menu-link active" href="#">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
                                                <img src="<?= asset('upload/aparat/svgexport-12.svg') ?>" alt="">

											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">کانال های دنبال شده</span>
                    </a>
                </div>
                <div class="menu-item ">
                    <a class="menu-link active" href="#">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
                                                <img src="<?= asset('upload/aparat/svgexport-11.svg') ?>" alt="">

											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">دیدگاه ها</span>
                    </a>
                </div>
                <div class="menu-item ">
                    <a class="menu-link active" href="#">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
                                                <img src="<?= asset('upload/aparat/svgexport-13.svg') ?>" alt="">

											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">آمار بازدید</span>
                    </a>
                </div>
                <!--                ADMIN MENU ITEM -->

                <div class="menu-item">
                    <a class="menu-link active" href="<?= asset('administrator/category') ?>">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
                                                <img src="<?= asset('upload/aparat/svgexport-9.svg') ?>" alt="">

											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">دسته بندی ها </span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link active" href="<?= asset('administrator/tag') ?>">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
                                                <img src="<?= asset('upload/aparat/svgexport-12.svg') ?>" alt="">

											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">برچسب ها </span>
                    </a>
                </div>
                <!--                END ADMIN MENU-->
                <div class="menu-item mt-16 ">
                    <form class="menu-link " method="post" action="<?= asset('logout') ?>">
                        <input type="hidden" name="_method" value="logout">
                        <button type="submit" class="btn-sm btn-danger text-white">
                          <span class="menu-icon text-white">
											<span class="svg-icon svg-icon-2 ">
                                                <img src="<?= asset('upload/aparat/svgexport-16.svg') ?>" alt="">
											</span>
										</span>
                            <span class="menu-title text-white">خروج از حساب کاربری</span>
                        </button>
                    </form>

                </div>


            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
</div>
