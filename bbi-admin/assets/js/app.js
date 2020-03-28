
var Common = {
    //消息提示
    ShowBox: function(status, message, title) {
        switch (status) {
            case 1:
                toastr.success(message, title)
                break;
            case 2:
                toastr.error(message, title)
                break;
            case 3:
                toastr.info(message, title)
                break;
            case 4:
                toastr.warning(message, title)
        }
    },
    ShowBoxWithFunc: function(data, title, func) {

        switch (data.Status) {
            case 1:
                toastr.success(data.Message, title)
                func();
                break;
            case 2:
                toastr.error(data.Message, title)
                break;
            case 3:
                toastr.info(data.Message, title)
                break;
            case 4:
                toastr.warning(data.Message, title)
        }
    },
    ShowBoxWithFuncBack: function(data, title, func) {

        switch (data.Status) {
            case 1:
                toastr.success(data.Message, title)
                func(data.Id, data.Data);
                break;
            case 2:
                toastr.error(data.Message, title)
                break;
            case 3:
                toastr.info(data.Message, title)
                break;
            case 4:
                toastr.warning(data.Message, title)
        }
    },
    SubmitBack: function(data, title, container) {

        switch (data.Status) {
            case 1:
                toastr.success(data.Message, title)
                if (container !== undefined)
                    container.html(data.Data)
                break;
            case 2:
                toastr.error(data.Message, title)
                break;
            case 3:
                toastr.info(data.Message, title)
                break;
            case 4:
                toastr.warning(data.Message, title)
        }
    },
    PageSizeSet: function(url, title, pageSize, func) { //分页设置

        $.post(url, { pageSize: pageSize }, function(data) {

            switch (data.Status) {
                case 1:
                    //toastr.success(data.Message, title);
                    func();
                    break;
                case 2:
                    toastr.error(data.Message, title);
                    break;
                case 3:
                    toastr.info(data.Message, title);
                    break;
                case 4:
                    toastr.warning(data.Message, title);
                    break;
            }
        });
    },

    SingleActionWithFunc: function(url, title, that, func) { //真假值修改操作

        $.post(url, $("#anti-form").serialize(), function(data) {

            switch (data.Status) {
                case 1:
                    toastr.success(data.Message, title);
                    func(that);
                    break;
                case 2:
                    toastr.error(data.Message, title);
                    break;
                case 3:
                    toastr.info(data.Message, title);
                    break;
                case 4:
                    toastr.warning(data.Message, title);
                    break;
            }
        });
    },
    SingleActionWithFuncBack: function(url, title, that, func) { //真假值修改操作

        $.post(url, $("#anti-form").serialize(), function(data) {

            switch (data.Status) {
                case 1:
                    toastr.success(data.Message, title);
                    func(that, data.Data);
                    break;
                case 2:
                    toastr.error(data.Message, title);
                    break;
                case 3:
                    toastr.info(data.Message, title);
                    break;
                case 4:
                    toastr.warning(data.Message, title);
                    break;
            }
        });
    },

    SingleAction: function(url, title, isTips) { //真假值修改操作
        $.post(url, $("#anti-form").serialize(), function(data) {
            if (!isTips)
                return;

            switch (data.Status) {
                case 1:
                    toastr.success(data.Message, title);
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                    break;
                case 2:
                    toastr.error(data.Message, title);
                    break;
                case 3:
                    toastr.info(data.Message, title);
                    break;
                case 4:
                    toastr.warning(data.Message, title);
                    break;
            }
        });
    },



    DeleteItem: function(url, title, that) { //删除

        $.post(url, $("#anti-form").serialize(), function(data) {
            switch (data.Status) {
                case 1:
                    toastr.success(data.Message, title);
                    that.closest('.item-container').remove();
                    break;
                case 2:
                    toastr.error(data.Message, title);
                    break;
                case 3:
                    toastr.info(data.Message, title);
                    break;
                case 4:
                    toastr.warning(data.Message, title);
                    break;
            }
        });
    }

};
var singleEelFinder = {
    percent: 70,
    baseUrl: "/assets/js/vendor/elfinder/elfinder-single.php",
    selectActionFunction: null,
    elFinderCallback: function(fileUrl) {
        this.selectActionFunction(fileUrl);
    },
    open: function() {
        var w = 800,
            h = 600; // default sizes
        if (window.screen) {
            w = window.screen.width * this.percent / 100;
            h = window.screen.height * this.percent / 100;
        }
        var x = screen.width / 2 - w / 2;
        var y = screen.height / 2 - h / 2;

        window.open(this.baseUrl, "_blank", 'height=' + h + ',width=' + w + ',left=' + x + ',top=' + y);
    }
};




var app = function() {
    var st =  void 0;
    var wrapper = void 0;
    var menu = void 0;
//     var menuItems = void 0;

    var init = function init() {
      wrapper = document.getElementById('wrapper');
      menu = document.getElementById('openav');
      st = document.getElementById("sitetime");
//         menuItems = document.querySelectorAll('.nav__list-item');

      applyListeners();
   };

    var applyListeners = function applyListeners() {
        console.log(wrapper);
        menu.addEventListener('click', function() { 
            return toggleClass(wrapper, 'wrap-nonav'); 
         });

        if(st){           
         st.innerHTML = new Date();
        }
         
    };

 var toggleClass = function toggleClass(element, stringClass) {
     
     if (element.classList.contains(stringClass))
         element.classList.remove(stringClass);
     else
         element.classList.add(stringClass);
     };

  init();
}();


$(document).ready(function() {


    $("#mainmenu .down-nav>a").click(function(e){
        e.preventDefault();
        var $that = $(this);
        $that.next('.submenu').slideToggle(function(){
            $that.closest('li.down-nav').toggleClass('open')
        });
    })



    $('a.expand').click(function (e) {
        $(this).closest('.card').addClass('card-fixed');     
        e.preventDefault();
    });
    $('a.compress').click(function (e) {
        $(this).closest('.card').removeClass('card-fixed');    
        e.preventDefault();
    });




    $(window).scroll(function() {
        if ($(this).scrollTop() > 350) {
            $('#totop').fadeIn();
        } else {
            $('#totop').fadeOut();
        };
    });


    $('#totop').click(function() {
        $('#totop').addClass("fly");
        $('#totop').find("img").attr("src", "img/fly.png");
        var myMusic = document.getElementById("myMusic");
        myMusic.play();
        $("html, body").animate({ scrollTop: 0 }, 1000, function() {
            $('#totop').removeClass("fly");
            $('#totop').find("img").attr("src", "img/totop.png");
        });

        return false;
    });

 

 
 
})