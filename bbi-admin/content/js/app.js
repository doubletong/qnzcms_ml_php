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
    baseUrl: "/js/vendor/elfinder/elfinder-single.php",
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

$(function() {
    var isCloseSider = localStorage.getItem("closeSider");
    if (isCloseSider === "1") {
        $(".wrapper").addClass("closeSider");
    }

    $("#openav").click(function(e) {
        e.preventDefault();

        closenav();
    });

    var pid = $('.mainmenu a.active').closest('li').attr("data-parent");
    $('.mainmenu li[data-parent=' + pid + ']').fadeIn();



    $(".down-nav>a").click(function(e) {
        e.preventDefault();

        $(this).next("ul.subnav").slideToggle();
        var li = $(this).closest('li');
        li.toggleClass('nav-open');

    });

    $(".closeSider .nav-open>a").hover(function(e) {
        e.preventDefault();

        $(this).next("ul.subnav").fadeIn();
        //var li = $(this).closest('li');
        //li.toggleClass('nav-open');

    });
    $(".closeSider .nav-open>ul.subnav").hover(function(e) {
        e.preventDefault();

        $(this).stop();
        //var li = $(this).closest('li');
        //li.toggleClass('nav-open');

    }, function() {
        $(this).fadeOut();
    });

    $('.closemenu a').on('click', function(e) {

        //  $('#rightcol').css({ 'margin-left': '0' });
        closenav();
        e.preventDefault();
    });

    $('.showmenu').on('click', function(e) {

        closenav();
        e.preventDefault();
    });

    var closenav = function() {
        $(".wrapper").toggleClass("closeSider");
        if ($(".wrapper").hasClass("closeSider")) {
            localStorage.setItem("closeSider", "1");
        } else {
            localStorage.setItem("closeSider", "0");
        }
    };



    $('a.expand').click(function(e) {
        $(this).closest('.box').addClass('box-fixed');
        $(this).hide();
        $(this).next('a').show();
        e.preventDefault();
    });
    $('a.compress').click(function(e) {
        $(this).closest('.box').removeClass('box-fixed');
        $(this).hide();
        $(this).prev('a').show();
        e.preventDefault();
    });
});