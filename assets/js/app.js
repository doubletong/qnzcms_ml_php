new WOW().init();
function header(){

    if(40 < $(window).scrollTop()){
        $("#site-header").addClass("fixheader");
        $("#logo").attr("src","/assets/img/logo_color.png");
    } else{
        $("#site-header").removeClass("fixheader");
        $("#logo").attr("src","/assets/img/logo.png");
    }
}

header();
$(document).ready(function() {
   
    $(window).on("scroll",function(){       
        header();
    });

    $("#toTop").click(function(e) { 
        e.preventDefault(), 
        $("html, body").animate({ scrollTop: 0 }, 600);
    });

    $(".weixincode").click(function(e) { 
        e.preventDefault(), 
        jQuery(".over").fadeIn(); 
    });
    $(".over").click(function(e) {
        e.preventDefault(); 
        $(this).fadeOut();
     });

    
    $(".menu-toggle").on('click', function() {
        $(this).toggleClass("on");
        $("#overmenu").slideToggle();
    });
    $(".subnav a").on("touchstart", function(e) {
        "use strict";
        var link = $(this).attr("href");
        location.href = link;
    });



    $("#btnsetemail").on("click", function(e) {
        e.preventDefault();
        var email = $("#inputEmail").val();
        if (email.length === 0) {
            alert("请输入邮箱！");
        } else {
            $.ajax({
                type: "post",
                url: "subscribe.php?email=" + email,
                success: function(response) {
                    alert(response);
                }
            });
        }

    });

    $("#btnSearch").click(function(e){
        $(".site-header").toggleClass("forSearch");
    });


    $(".mainav li.down").hover(function(e){      
        $(this).find("dl").stop().fadeIn();       
    },function(e){
        $(this).find("dl").stop().fadeOut();
    });

    $(".overmenu li.down>a").click(function(e){
        e.preventDefault();
        $(this).next(".subnav").slideToggle();
        $(this).closest("li").toggleClass("open");
    })
});