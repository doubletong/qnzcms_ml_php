<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");
require_once("data/article.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("creative");

$articleClass = new Article();
$articles = $articleClass->get_all_articles(5);


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo $data["title"]."-临床解决方案-" . SITENAME; ?></title>
    <link href="js/vendor/toastr/toastr.min.css" rel="stylesheet" />
    <?php require_once('includes/meta.php') ?>
</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-creative"  style="background-image:url(<?php echo $data["background_image"];?>)">
        <div class="container page-title">
            <h1><?php echo $data["title"];?></h1>
            <p>发现需求 收集创意 解决问题</p>
        </div>
    </div>
    <div class="page page-support page-story page-creative">
        <div class="container">
            <?php echo $data["content"];?>

            <section class="s1 s2">
                <h2 class="title">医工合作案例</h2>
                <div class="list list-story list-case">
                    <div class="row">
                        <?php foreach ($articles as $data) { ?>
                            <div class="col-6 col-md-4">
                                <div class="item">
                                    <img src="<?php echo $data['image_url']; ?>" class="bg" alt="<?php echo $data['title']; ?>">
                                    <div class="txt">
                                        <div class="logo">
                                            <img src="<?php echo $data['thumbnail']; ?>" alt="<?php echo $data['title']; ?>">
                                        </div>
                                        <h3><?php echo $data['title']; ?></h3>
                                        <a href="/creative-detail-<?php echo $data['id']; ?>" class="view">查看案例</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </section>

            <section class="s1 s3">
                <h2>我们珍惜您的每一个创意</h2>
                <p>您有关于医疗产品或医疗过程痛点问题寻求解决方案吗？<br />
                    您有医疗相关创意或跨界技术方案希望转化为医疗产品吗？<br />
                    您希望凭您一技之长挑战医疗产品开发难题吗？<br />
                    与微创<sup>®</sup>一起，助力实现人类延年益寿之梦想！</p>

            </section>
            <section class="s4">
                <header class="tab-header">
                    <div class="row no-gutters">
                        <div class="col">
                            <a href="javascript:void(0);" class="active" data-id="tab001">我有痛点反馈</a>
                        </div>
                        <div class="col">
                            <a href="javascript:void(0);" data-id="tab002">我有技术创意</a>
                        </div>
                        <div class="col">
                            <a href="javascript:void(0);" data-id="tab003">我有技术专长</a>
                        </div>
                    </div>
                </header>
                <div class="tabcontent">
                    <div id="tab001" class="tab-container active">
                        <input type="file" id="attachment" hidden />
                        <form action="#" method="post" id="form001">
                        <input type="hidden" id="attainput" name="attainput"/>
                        
                            <input type="hidden" name="emailtype" value="1" />
                            <div class="row form-box">
                                <div class="col-md-6">
                                    <label for="">您的姓名</label>
                                    <div class="formgroup">
                                        <input type="text" name="name" placeholder="请输入您的姓名">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">您的联系方式</label>
                                    <div class="formgroup">
                                        <input type="text" name="phone" placeholder="请输入您的手机号码">
                                    </div>

                                </div>
                            </div>
                            <div class="form-box">
                                <label for="">您的痛点问题描述</label>
                                <div class="formgroup">
                                    <textarea name="description1" rows="6" placeholder="请输入您的痛点问题描述"></textarea>
                                </div>
                            </div>
                            <div class="form-box">
                                <a href="javascript:void(0);" class="selectedFiles">上传附件</a> <span id="lbShow" class="lbShow">附件（1）</span>
                            </div>
                            <div class="form-box">
                                <label for="">痛点后果严重程度/发生频次描述</label>
                                <div class="formgroup">
                                    <textarea name="description2" rows="6" placeholder="请输入该痛点后果严重程度/发生频次描述"></textarea>
                                </div>
                            </div>
                            <div class="form-box">
                                <label for="">期望解决方案</label>
                                <div class="formgroup">
                                    <textarea name="description3" rows="6" placeholder="请输入您的期望解决方案"></textarea>
                                </div>
                            </div>
                            <div class="action">
                                <button type="submit">提交</button>
                            </div>
                        </form>
                    </div>
                    <div id="tab002" class="tab-container">
                        <form action="#" method="post"  id="form002">
                        <input type="hidden" name="emailtype" value="2" />
                            <div class="row form-box">
                                <div class="col-md-6">
                                    <label for="">您的姓名</label>
                                    <div class="formgroup">
                                        <input type="text" name="name" placeholder="请输入您的姓名">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">您的联系方式</label>
                                    <div class="formgroup">
                                        <input type="text" name="phone" placeholder="请输入您的手机号码">
                                    </div>

                                </div>
                            </div>
                            <div class="form-box">
                                <label for="">您的创意简述（不涉及保密内容）</label>
                                <div class="formgroup">
                                    <textarea name="description1" rows="6" placeholder="请输入您的创意"></textarea>
                                </div>
                            </div>

                            <div class="form-box">
                                <label for="">您是否有申请专利，若有请输入您的专利状态</label>
                                <div class="formgroup">
                                    <textarea name="description2" rows="6" placeholder="请输入您的专利状态"></textarea>
                                </div>
                            </div>
                            <div class="form-box">
                                <label for="">期望合作模式</label>
                                <div class="formgroup">
                                    <textarea name="description3" rows="6" placeholder="请输入您的期望合作模式"></textarea>
                                </div>
                            </div>
                            <div class="action">
                                <button type="submit">提交</button>
                            </div>
                        </form>
                    </div>
                    <div id="tab003" class="tab-container">
                        <form action="#" method="post"  id="form003">
                        <input type="hidden" name="emailtype" value="3" />
                            <div class="row form-box">
                                <div class="col-md-6">
                                    <label for="">您的姓名</label>
                                    <div class="formgroup">
                                        <input type="text" name="name" placeholder="请输入您的姓名">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">您的联系方式</label>
                                    <div class="formgroup">
                                        <input type="text" name="phone" placeholder="请输入您的手机号码">
                                    </div>
                                </div>
                            </div>
                            <div class="form-box">
                                <label for="">您的技术专长描述</label>
                                <div class="formgroup">
                                    <textarea name="description1" rows="6" placeholder="请输入您的技术专长描述"></textarea>
                                </div>
                            </div>

                            <div class="form-box">
                                <label for="">您的相关经验简述</label>
                                <div class="formgroup">
                                    <textarea name="description2" rows="6" placeholder="请输入您的相关经验简述"></textarea>
                                </div>
                            </div>
                            <div class="form-box">
                                <label for="">期望合作模式</label>
                                <div class="formgroup">
                                    <textarea name="description3" rows="6" placeholder="请输入您的期望合作模式"></textarea>
                                </div>
                            </div>
                            <div class="action">
                                <button type="submit">提交</button>
                            </div>
                        </form>
                    </div>
                </div>


            </section>
            <section class="s5">
                <div class="qrcode">
                    <img src="/img/link_qrcode.jpg" alt="扫码提交您的医疗痛点">
                    <label>扫码提交您的医疗痛点</label>
                </div>
            </section>
        </div>
    </div>

    <?php require_once('includes/footer.php') ?>
    <?php require_once('includes/scripts.php') ?>
    <script src="js/vendor/toastr/toastr.min.js"></script>
    <script src="js/vendor/blockUI/jquery.blockUI.min.js"></script>
<script src="js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="js/vendor/jquery-validation/dist/additional-methods.min.js"></script>

    <script>
        $(document).ready(function() {
         
            $(".mainav li:nth-of-type(2) a").addClass("active");


            $(".tab-header a").click(function() {
                $(".tab-header a.active").removeClass("active");
                $(this).addClass("active");

                var cid = $(this).attr("data-id");
                $("#" + cid).addClass("active").siblings(".active").removeClass("active");

            });



            $(".selectedFiles").click(function(e){
                $("#attachment").click();
            })


            var files = document.getElementById('attachment');

            files.addEventListener("change", function () {
                if (files.files.length != 0) {

                    $.blockUI({ css: { 
                        border: 'none', 
                        padding: '15px', 
                        backgroundColor: '#000', 
                        '-webkit-border-radius': '10px', 
                        '-moz-border-radius': '10px', 
                        opacity: .5, 
                        color: '#fff'                       
                    }, message: '文件上传中...' }); 

                    var file_data = $('#attachment').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);


                    $.ajax({
                        url: 'upload.php', // point to server-side PHP script 
                       // dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            var obj =  JSON.parse(response);    

                            $.unblockUI()                           
                            if (obj.status===2) {
                                toastr.error(obj.message, '附件')
                            } else {
                                $("#attainput").val(obj.message);
                                $("#lbShow").fadeIn();
                            }
                           
                        },
                        error: function (response) {
                            toastr.error(response);     
                            $.unblockUI();                      
                        }
                    });
                    return;
                }
       
            });


            $("#form001").validate({
                rules: {
                    name: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    description1: {
                        required: true
                    },                
                    description2: {
                        required: true
                    },
                    description3: {
                        required: true
                    }
                },
                messages:{
                
                    name: {
                        required: "请输入姓名"
                    },
                    phone: {
                        required: "请输入您的手机号码"
                    },
                    
                    description1: {
                        required: "请输入您的痛点问题描述",                        
                    },
                    description2: {
                        required: "请输入该痛点后果严重程度/发生频次描述",                        
                    },

                    description3: {
                        required: "请输入您的期望解决方案",                        
                    }


                },

                errorClass: "invalid-feedback",
                    errorElement: "div",
                    highlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-valid');
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                        $(element).addClass('is-valid');
                    },
            

                submitHandler: function(form) {
                    //form.submit();
                    $.ajax({
                        url : 'sendemail.php',
                        type : 'POST',
                        data : $(form).serialize(),
                        success : function(res) {
                            var obj =  JSON.parse(res);                         
                          //  console.log(obj.message)
                   
                            if (obj.status===1) {
                                toastr.success(obj.message, '发送邮件')
                            } else {
                                toastr.error(obj.message, '发送邮件')
                            }
                        }
                    });


                }
                });


                $("#form002").validate({
                rules: {
                    name: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    description1: {
                        required: true
                    },                
                    description2: {
                        required: true
                    },
                    description3: {
                        required: true
                    }
                },
                messages:{
                
                    name: {
                        required: "请输入姓名"
                    },
                    phone: {
                        required: "请输入您的手机号码"
                    },
                    
                    description1: {
                        required: "请输入您的创意",                        
                    },
                    description2: {
                        required: "请输入您的专利状态",                        
                    },

                    description3: {
                        required: "请输入您的期望合作模式",                        
                    }


                },

                errorClass: "invalid-feedback",
                    errorElement: "div",
                    highlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-valid');
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                        $(element).addClass('is-valid');
                    },
            

                submitHandler: function(form) {
                    //form.submit();
                    $.ajax({
                        url : 'sendemail.php',
                        type : 'POST',
                        data : $(form).serialize(),
                        success : function(res) {

                        //   alert(res);
                            if (res) {
                                toastr.success('子公司信息已添加成功！', '添加子公司信息')
                            } else {
                                toastr.error('子公司信息添加失败！', '添加子公司信息')
                            }
                        }
                    });


                }
                });

                $("#form003").validate({
                rules: {
                    name: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    description1: {
                        required: true
                    },                
                    description2: {
                        required: true
                    },
                    description3: {
                        required: true
                    }
                },
                messages:{
                
                    name: {
                        required: "请输入姓名"
                    },
                    phone: {
                        required: "请输入您的手机号码"
                    },
                    
                    description1: {
                        required: "请输入您的技术专长描述",                        
                    },
                    description2: {
                        required: "请输入您的相关经验简述",                        
                    },

                    description3: {
                        required: "请输入您的期望合作模式",                        
                    }


                },

                errorClass: "invalid-feedback",
                    errorElement: "div",
                    highlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-valid');
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                        $(element).addClass('is-valid');
                    },
            

                submitHandler: function(form) {
                    //form.submit();
                    $.ajax({
                        url : 'sendemail.php',
                        type : 'POST',
                        data : $(form).serialize(),
                        success : function(res) {
                            console.log(res);
                        //   alert(res);
                            if (res) {
                                toastr.success('子公司信息已添加成功！', '添加子公司信息')
                            } else {
                                toastr.error('子公司信息添加失败！', '添加子公司信息')
                            }
                        }
                    });


                }
                });
        });
    </script>
</body>

</html>