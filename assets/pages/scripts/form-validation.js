var FormValidation = function() {
    var e = function() {
            var e = $("#form_sample_1"),
                r = $(".alert-danger", e),
                i = $(".alert-success", e);
            e.validate({
                errorElement: "span",
                errorClass: "help-block help-block-error",
                focusInvalid: !1,
                ignore: "",
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                    name: {
                        minlength: 2,
                        required: !0
                    },
                    email: {
                        required: !0,
                        email: !0
                    },
                    url: {
                        required: !0,
                        url: !0
                    },
                    number: {
                        required: !0,
                        number: !0
                    },
                    digits: {
                        required: !0,
                        digits: !0
                    },
                    creditcard: {
                        required: !0,
                        creditcard: !0
                    },
                    occupation: {
                        minlength: 5
                    },
                    select: {
                        required: !0
                    },
                    select_multi: {
                        required: !0,
                        minlength: 1,
                        maxlength: 3
                    }
                },
                invalidHandler: function(e, t) {
                    i.hide(), r.show(), App.scrollTo(r, -200)
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
                success: function(e) {
                    e.closest(".form-group").removeClass("has-error")
                },
                submitHandler: function(e) {
                    i.show(), r.hide()
                }
            })
        },
        r = function() {
            var e = $("#form_sample_2"),
                r = $(".alert-danger", e),
                i = $(".alert-success", e);
            e.validate({
                errorElement: "span",
                errorClass: "help-block help-block-error",
                focusInvalid: !1,
                ignore: "",
                rules: {
                    name: {
                        minlength: 2,
                        required: !0
                    },
                    email: {
                        required: !0,
                        email: !0
                    },
                    email: {
                        required: !0,
                        email: !0
                    },
                    url: {
                        required: !0,
                        url: !0
                    },
                    number: {
                        required: !0,
                        number: !0
                    },
                    telepon: {
                        required: !0,
                        number: !0
                    },
                    digits: {
                        required: !0,
                        digits: !0
                    },
                    creditcard: {
                        required: !0,
                        creditcard: !0
                    }
                },
                invalidHandler: function(e, t) {
                    i.hide(), r.show(), App.scrollTo(r, -200)
                },
                errorPlacement: function(e, r) {
                    var i = $(r).parent(".input-icon").children("i");
                    i.removeClass("fa-check").addClass("fa-warning"), i.attr("data-original-title", e.text()).tooltip({
                        container: "body"
                    })
                },
                highlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-success").addClass("has-error")
                },
                unhighlight: function(e) {},
                success: function(e, r) {
                    var i = $(r).parent(".input-icon").children("i");
                    $(r).closest(".form-group").removeClass("has-error").addClass("has-success"), i.removeClass("fa-warning").addClass("fa-check")
                },
                submitHandler: function(e) {
                    i.show(), r.hide(), e[0].submit()
                }
            })
        },
        i = function() {
            var e = $("#form_sample_3"),
                r = $(".alert-danger", e),
                i = $(".alert-success", e);
            e.on("submit", function() {
                for (var e in CKEDITOR.instances) CKEDITOR.instances[e].updateElement()
            }), e.validate({
                errorElement: "span",
                errorClass: "help-block help-block-error",
                focusInvalid: !1,
                ignore: "",
                rules: {
                    name: {
                        minlength: 2,
                        required: !0
                    },
                    email: {
                        required: !0,
                        email: !0
                    },
                    options1: {
                        required: !0
                    },
                    options2: {
                        required: !0
                    },
                    select2tags: {
                        required: !0
                    },
                    datepicker: {
                        required: !0
                    },
                    occupation: {
                        minlength: 5
                    },
                    membership: {
                        required: !0
                    },
                    service: {
                        required: !0,
                        minlength: 2
                    },
                    markdown: {
                        required: !0
                    },
                    editor1: {
                        required: !0
                    },
                    editor2: {
                        required: !0
                    }
                },
                messages: {
                    membership: {
                        required: "Please select a Membership type"
                    },
                    service: {
                        required: "Please select  at least 2 types of Service",
                        minlength: jQuery.validator.format("Please select  at least {0} types of Service")
                    }
                },
                errorPlacement: function(e, r) {
                    r.parent(".input-group").size() > 0 ? e.insertAfter(r.parent(".input-group")) : r.attr("data-error-container") ? e.appendTo(r.attr("data-error-container")) : r.parents(".radio-list").size() > 0 ? e.appendTo(r.parents(".radio-list").attr("data-error-container")) : r.parents(".radio-inline").size() > 0 ? e.appendTo(r.parents(".radio-inline").attr("data-error-container")) : r.parents(".checkbox-list").size() > 0 ? e.appendTo(r.parents(".checkbox-list").attr("data-error-container")) : r.parents(".checkbox-inline").size() > 0 ? e.appendTo(r.parents(".checkbox-inline").attr("data-error-container")) : e.insertAfter(r)
                },
                invalidHandler: function(e, t) {
                    i.hide(), r.show(), App.scrollTo(r, -200)
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
                success: function(e) {
                    e.closest(".form-group").removeClass("has-error")
                },
                submitHandler: function(e) {
                    i.show(), r.hide(), e[0].submit()
                }
            }), $(".select2me", e).change(function() {
                e.validate().element($(this))
            }), $(".date-picker").datepicker({
                rtl: App.isRTL(),
                autoclose: !0
            }), $(".date-picker .form-control").change(function() {
                e.validate().element($(this))
            })
        },
        t = function() {
            jQuery().wysihtml5 && $(".wysihtml5").size() > 0 && $(".wysihtml5").wysihtml5({
                stylesheets: ["../assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
            })
        };
    return {
        init: function() {
            t(), e(), r(), i()
        }
    }
}();
jQuery(document).ready(function() {
    FormValidation.init()
});