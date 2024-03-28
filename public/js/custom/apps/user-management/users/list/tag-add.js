"use strict";

// Class definition
var KTAdminAddTag = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_add_tag');
    const form = element.querySelector('#kt_modal_add_tag_form');
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initAddUser = () => {

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'نام لاتین را وارد کنید'
                            }
                        }
                    },
                    'persian_name': {
                        validators: {
                            notEmpty: {
                                message: 'نام فارسی را وارد کنید'
                            }
                        }
                    },

                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );


        // Submit button handler
        const submitButton = element.querySelector('[data-kt-users-modal-action="submit"]');
        submitButton.addEventListener('click', e => {
            e.preventDefault();


            // Validate form before submit
            if (validator) {

                validator.validate().then(function (status) {

                    if (status == 'Valid') {


                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable button to avoid multiple click
                        submitButton.disabled = true;

                        var data = $("#kt_modal_add_tag_form").serialize();

                        // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        setTimeout(function () {
                            // Remove loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;

                            // Show popup confirmation
                            Swal.fire({
                                text: "برچسب مورد نظر با موفقیت بارگذاری شد .",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "خیلی خب بزن بریم ...!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function (result) {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        type: "POST",
                                        url: 'http://aparat-expert.local/administrator/tag/ajax',
                                        datatype: 'json',
                                        data:data,
                                        success: function(data){
                                            modal.hide();
                                            // console.log(data)
                                            location.reload()
                                        }
                                    })
                                }
                            });

                            //form.submit(); // Submit form
                        }, 2000);
                    } else {
                        // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "مشکلی پیش آمده دقایقی دیگر امتحان کنید.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "خیلی خب بزن بریم ...!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });

        // Cancel button handler
        const cancelButton = element.querySelector('[data-kt-users-modal-action="cancel"]');
        cancelButton.addEventListener('click', e => {
            e.preventDefault();
            modal.hide();

            // Swal.fire({
            //     text: "Are you sure you would like to cancel?",
            //     icon: "warning",
            //     showCancelButton: true,
            //     buttonsStyling: false,
            //     confirmButtonText: "Yes, cancel it!",
            //     cancelButtonText: "No, return",
            //     customClass: {
            //         confirmButton: "btn btn-primary",
            //         cancelButton: "btn btn-active-light"
            //     }
            // }).then(function (result) {
            //     if (result.value) {
            //         form.reset(); // Reset form
            //
            //     } else if (result.dismiss === 'cancel') {
            //         Swal.fire({
            //             text: "Your form has not been cancelled!.",
            //             icon: "error",
            //             buttonsStyling: false,
            //             confirmButtonText: "Ok, got it!",
            //             customClass: {
            //                 confirmButton: "btn btn-primary",
            //             }
            //         });
            //     }
            // });
        });

        // Close button handler
        const closeButton = element.querySelector('[data-kt-users-modal-action="close"]');
        closeButton.addEventListener('click', e => {
            e.preventDefault();
            modal.hide();

        });
    }

    return {
        // Public functions
        init: function () {
            initAddUser();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAdminAddTag.init();
});