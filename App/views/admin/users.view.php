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
                                        <h6>کاربران </h6>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-2 mr-4 text-left">
                                        <a href="http://aparat-expert.local/administrator/users/create"
                                           class=" btn-sm btn-success text-white px-3">
                                            <span>افزودن کاربر جدید</span>
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
                                <div class="row">
                                    <?php loadAdminPartial('message'); ?>

                                </div>
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
                                                    نام کاربری
                                                </th>
                                                <th class="min-w-125px sorting">
                                                    نام و نام خانوادگی
                                                </th>

                                                <th class="min-w-125px sorting">
                                                    ایمیل
                                                </th>
                                                <th class="min-w-125px sorting">
                                                    نقش کاربری
                                                </th>
                                                <th class="min-w-125px sorting">
                                                    تاریخ ایجاد کاربر
                                                </th>
                                                <th class=" min-w-150px sorting_disabled">
                                                    عملیات
                                                </th>
                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="text-gray-600 fw-bold text-center">

                                            <?php foreach ($users as $us): ?>
                                                <tr class="<?= $us['id'] % 2 === 0 ? 'even' : 'bg-secondary' ?>">
                                                    <td class=" align-items-center">
                                                        <span class="text-center"> <?= $us['nick_name'] ?></span>
                                                    </td>
                                                    <td> <?= $us['name'] .'   '.$us['family']  ?></td>
                                                    <td> <?= $us['email']  ?></td>
                                                    <td> <?= $us['role']=='admin' ? 'ادمین' :' کاربر '  ?></td>
                                                    <td data-order=""> <?= date('Y-m-d', strtotime($us['created_at'])) ?></td>
                                                    <td class="">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a href="<?= asset('administrator/users/'.$us['id']) ?>" class=" btn btn-info ">ویرایش</a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <form action="<?= asset('administrator/users/delete/'.$us['id']) ?>" method="post">
                                                                    <input type="hidden" name="_method" value="delete">
                                                                    <button type="submit"  class=' btn btn-danger mr-1'>حذف
                                                                    </button>
                                                                </form>
                                                            </div>


                                                        </div>




                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>


                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                    </div>

                                </div>
                                <!--end::Table-->

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
