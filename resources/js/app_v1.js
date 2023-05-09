// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

// Write your JavaScript code.

(function ($) {
    "use strict";
    $(window).on("load", function () {
        $("#preloader").fadeOut("slow");
    });
    $(document).ready(function () {
        // var bannerCarousel = document.querySelector("#bannerCarousel");
        var bannerCarousel = $("#bannerCarousel");
        if (bannerCarousel.length) {
            var carousel = new bootstrap.Carousel(bannerCarousel, {
                interval: 4000,
                pause: "hover",
                wrap: false,
            });
        }
        // Form
        function ShowHide(id_form1, id_form2) {
            let form1 = $(id_form1);
            let form2 = $(id_form2);
            form1.toggle();
            form2.toggle();
            form1.toggleClass("open-form");
            form2.toggleClass("open-form");
            if (form1.hasClass("open-form")) {
                form1.find("input:first").focus();
            } else {
                form2.find("input:first").focus();
            }
        };
        $('.js-showhide').click(function (e) {
            ShowHide('#signin-form', '#forgot-password-form');
        });
        $(".btn-showpass").click(function (e) {
            e.preventDefault();
            if ($(this).siblings("input").attr("type") == "password") {
                $(this).siblings('input[type="password"]').attr("type", "text");
            } else {
                $(this).siblings('input[type="text"]').attr("type", "password");
            }
            $(this).find("i").toggleClass("bi-eye");
            $(this).find("i").toggleClass("bi-eye-slash");
        });
    });
    $(document).mouseup(function (e) { });
    window.addEventListener("mouseover", function (e) {
        var container = $("name");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            //code here
        }
    });
    window.addEventListener("load", function () { });
})(window.jQuery);
