$(document).ready(function() {
    var e = function() { 40 < $(window).scrollTop() ? $("#site-header").addClass("fixheader") : $("#site-header").removeClass("fixheader") };
    e(), $(window).on("scroll", function() { e() }), $("#toTop").click(function(e) { return e.preventDefault(), jQuery("html, body").animate({ scrollTop: 0 }, 600), !1 }), $(".weixincode").click(function(e) { e.preventDefault(), jQuery(".over").fadeIn() }), $(".over").click(function(e) { e.preventDefault(), jQuery(this).fadeOut() })
    $(".menu-toggle").on('click', function() {
        $(this).toggleClass("on");
        $("#overmenu").slideToggle();
    });
});