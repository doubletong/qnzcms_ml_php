/**
 * Created by striving on 2019/5/8.
 */
var mobileFlag=true;
if ((navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i))) {
    mobileFlag=false
}
var wow = new WOW({
    boxClass: 'wow',
    animateClass: 'animated',
    offset: 0,
    mobile: mobileFlag,
    live: true
});
wow.init();

$(function(){
    //years
    $('.current_year').click(function(){
        $('.years_list').slideToggle(200)
    });
    //product_detail_video
    $('.product_detail_video_wrap .play_btn').click(function(){
        $(this).fadeOut(100);
        $('.product_detail_video_wrap video')[0].play();
        $('.product_detail_video_wrap video')[0].controls = true;
    })
});
//tab_nav
function domTab(id){
    $('.tab_nav li').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
        $(id).eq($(this).index()).addClass('active').siblings().removeClass('active')
    })
}