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
                                           <h6>دسته بندی ها </h6>
                                       </div>
                                       <div class="col-md-4">
<!--                                           <div class="d-flex align-items-center position-relative my-1">-->
<!--                                               <span class="svg-icon svg-icon-1 position-absolute ms-6">-->
<!--													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">-->
<!--														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>-->
<!--														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>-->
<!--													</svg>-->
<!--												</span>-->
<!--                                               <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user">-->
<!--                                           </div>-->
                                       </div>
                                       <div class="col-md-2 mr-4 text-left">
                                           <a  data-bs-toggle="modal" data-bs-target="#kt_modal_add_user" class=" btn-sm btn-success text-white px-3">
                                               <span>افزودن دسته بندی</span>
                                           </a>


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
                                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
                                            <!--begin::Table head-->
                                            <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-center text-muted fw-bolder fs-7 text-uppercase gs-0">

                                                <th class="min-w-125px sorting">
                                                    نام دسته بندی
                                                </th>
                                                <th class="min-w-125px sorting" >
                                                    نام لاتین
                                                </th>
                                                <th class="min-w-125px sorting">
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

                                            <?php foreach ($categories as $ca): ?>
                                            <tr class="<?=  $ca['id']%2 === 0 ? 'even' : 'odd'  ?>">

                                                <td class=" align-items-center">
                                                        <span class="text-center"> <?= $ca['persian_name'] ?></span>
                                                </td>
                                                <!--end::User=-->
                                                <!--begin::Role=-->
                                                <td> <?= $ca['name'] ?></td>

                                                <td data-order="2021-06-24T10:30:00+04:30"> <?= date('Y-m-d' , strtotime($ca['created_at']))  ?></td>
                                                <!--begin::Joined-->
                                                <!--begin::Action=-->
                                                <td class="">

                                                    <!--begin::Menu-->
                                                        <!--begin::Menu item-->
                                                            <a id="cat-<?= $ca['id'] ?>" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_category" class=" btn-sm btn-info px-3">ویرایش</a>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->

                                                            <a href="#" class="btn-sm btn-danger px-3" data-kt-users-table-filter="delete_row">حذف</a>

                                                        <!--end::Menu item-->
                                                    <!--end::Menu-->
                                                </td>
                                                <!--end::Action=-->
                                            </tr>

                                            <?php endforeach; ?>


                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                    </div>

                                </div>
                                <!--end::Table-->
                                <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-850px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header" id="kt_modal_add_user_header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bolder">دسته بندی جدید</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                    <span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
																		<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
																	</svg>
																</span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Form-->
                                                <form id="kt_modal_add_user_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="#">
                                                    <!--begin::Scroll-->
                                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px" style="max-height: 3px;">
                                                        <!--begin::Input group-->

                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">نام لاتین</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="Emma Smith">
                                                            <!--end::Input-->
                                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">نام فارسی</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="persian_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="e.smith@kpmg.com.au">
                                                            <!--end::Input-->
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>
                                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">دسته بندی والد</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <select name="parent_id" class="form-control form-control-solid mb-3"  id="select_cat">

                                                            </select>
                                                            <!--end::Input-->
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->

                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Scroll-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center pt-15">
                                                        <button type="reset" class="btn-sm  btn-outline-danger me-3" data-kt-users-modal-action="cancel">لغو</button>
                                                        <button type="submit" class="btn-sm btn-danger" data-kt-users-modal-action="submit">
                                                            <span class="indicator-label">ارسال</span>
                                                            <span class="indicator-progress">لطفا منتظر بمانید
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                    <div></div></form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <div class="modal fade" id="kt_modal_edit_category" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-850px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header" id="kt_modal_edit_category_header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bolder">دسته بندی جدید</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-edit-modal-action="close">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                    <span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
																		<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
																	</svg>
																</span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Form-->
                                                <form id="kt_modal_edit_category_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="#">
                                                    <!--begin::Scroll-->
                                                    <div class="d-flex flex-column scroll-y me-n7 pe-7  " id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px" style="max-height: 3px;">
                                                        <!--begin::Input group-->
                                                        <input type="hidden" name="cat_id" class="edit-cat-id" value="" >

                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">نام لاتین</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="name" class="form-control edit-name form-control-solid mb-3 mb-lg-0" placeholder="" value="">
                                                            <!--end::Input-->
                                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">نام فارسی</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="persian_name" class="form-control edit-persian-name form-control-solid mb-3 mb-lg-0" placeholder="" value="">
                                                            <!--end::Input-->
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>
                                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">دسته بندی والد</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <select name="parent_id" class="form-control form-control-solid mb-3"  id="edit_select_cat">

                                                            </select>
                                                            <!--end::Input-->
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->

                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Scroll-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center pt-15">
                                                        <button type="reset" class="btn-sm  btn-outline-danger me-3" data-kt-edit-modal-action="cancel">لغو</button>
                                                        <button type="submit" class="btn-sm btn-danger" data-kt-edit-modal-action="submit">
                                                            <span class="indicator-label">ارسال</span>
                                                            <span class="indicator-progress">لطفا منتظر بمانید
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                    <div></div></form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
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
<script>
        $(document).on('show.bs.modal','#kt_modal_add_user' ,  function (e) {
            $("#select_cat").html('');
            $.ajax({
                type: "GET",
                url: 'http://aparat-expert.local/administrator/category/ajax',
                datatype: 'json',
                success: function(datas){

                     var data2 = JSON.parse(datas);
                    console.log(data2)
                     $("#select_cat").append(`<option value="0" >بدون دسته بندی  </option>`)
                        for (let data of data2) {
                           $("#select_cat").append(`<option value="${data.id}" >${data.persian_name}  </option>`)
                        }
                }
            })
        });
        $(document).on('show.bs.modal','#kt_modal_edit_category' ,  function (e) {
            $("#edit_select_cat").html('');
            $(".edit-cat-id").val('')
            var passedId = e.relatedTarget.id.substring(4);

            $.ajax({
                type: "GET",
                url: 'http://aparat-expert.local/administrator/category/edit/ajax',
                datatype: 'json',
                data: {'id':passedId},
                success: function(datas){
                    var data2 = JSON.parse(datas);
                    var allCat = data2.all;
                    var cat = data2.self;

                    //

                    $(".edit-cat-id").val(cat.id)

                    //

                    $(".edit-persian-name").attr('value',cat.persian_name);
                    $(".edit-name").attr('value',cat.name);

                    if(data2.self.parent_id !== null){
                        var p_cat = data2.parent;
                        $("#edit_select_cat").append(`<option value="0">بدون دسته بندی  </option>`)
                        $("#edit_select_cat").append(`<option value="${p_cat.id}" selected>${p_cat.persian_name}</option>`)
                    }else{
                        $("#edit_select_cat").append(`<option value="0" selected >بدون دسته بندی  </option>`)
                    }
                    for (let data of allCat) {
                        $("#edit_select_cat").append(`<option value="${data.id}" >${data.persian_name}  </option>`)
                    }
                }
            });
        });
</script>
<!--begin::Wrapper-->
