<?php
require_once('../../includes/common.php');

$file_default_path = $_SERVER['DOCUMENT_ROOT'].'/assets/templates/index.html';

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "基本信息_系统_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
    <style>
        .file_list{
            list-style:none;
            margin:0;padding:0 1rem;
        }
        .file_list ul.file_list{
            padding:0 0 0 1.2rem;
            display:none;
        }

        .file_list a{
         
            display:block;
            padding:.3rem 0;
            
        }
        .file_list li.dir a{
            color:#25a6c5;
        }
       
        ul.file_list li.file{
            font-size:14px;
        }
        ul.file_list li.file a{
            font-size:14px;  color:#97dbec;
        }
        ul.file_list li.file a.active{
            color:#fff;
            
        }
    </style>
</head>

<body>
    <div class="wrapper" id="wrapper">
        <!-- nav start -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav_tpl.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php'); ?>
            <div class="main-content"> 
                <div class="breadcrumb-container">
                    <div class="row">
                        <div class="col-md">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/bbi-admin">控制面板</a></li>
                                <li class="breadcrumb-item"><a href="#">系统</a></li>
                                <li class="breadcrumb-item active" aria-current="page">编辑模板</li>
                            </ol>
                        </nav>
                        </div>
                        <div class="col-md-auto">
                            <time id="sitetime"></time>
                        </div>
                    </div>
                </div> 
              
                <form method="post" id="export_form">
              <div class="card">
              <header class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="card-title-v1"> <i class="iconfont icon-layout"></i><span id="editpath"><?php echo $file_default_path;?></span></div>
                            </div>
                            <div class="col-auto">
                                <div class="control"><a class="expand" href="#"><i class="iconfont icon-fullscreen"></i></a><a class="compress" href="#"><i class="iconfont icon-shrink"></i></a></div>
                            </div>
                        </div>
                    </header>
                <div class="card-body">
                        <input type="hidden" name='edit_file' value="edit_file" />
                        <input type="hidden" name='file_path' id="file_path" value="<?php echo $file_default_path;?>" />
                        <input type="hidden" name='file_content' id="file_content"  />
                        <div id="tpl_content" style="height:600px;"></div>
                     
                      
                        </div>
                        <div class="card-footer text-center">
                        <button type="submit" id="btnSave" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
                          
                        </div>
                    </div>
                </form>
          
            </div>
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>

    <script src="/assets/js/vendor/ace/src-min/ace.js"></script>
    <script src="/assets/js/vendor/ace/src-min/ext-language_tools.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
         ace.require("ace/ext/language_tools");
                        var editor = ace.edit("tpl_content");
                        editor.session.setMode("ace/mode/html");
                        editor.setTheme("ace/theme/tomorrow");
                        // enable autocompletion and snippets
                        editor.setOptions({
                            enableBasicAutocompletion: true,
                            enableSnippets: true,
                            enableLiveAutocompletion: false
                        });

        $(document).ready(function() {
          
            $.post("tpl_post.php", {'file_path':'<?php echo $file_default_path;?>','read_file':""},
                function (data, textStatus, jqXHR) {                 
                    editor.setValue(data);                   
                }
                
            );
           
                          //当前菜单        
            $(".mainmenu>li.sitemap").addClass("nav-open").find("ul>li.general a").addClass("active");

            $('.file_list li.dir>a').click(function(e){
                $(this).find("i").toggleClass('icon-folder-open');
                $(this).next().slideToggle();
            });

            $('.file_list li.file>a').click(function(e){
                e.preventDefault();
                $('.file_list a').removeClass('active');
                $(this).addClass('active');
                var file_path = $(this).attr('href');
                $.post("tpl_post.php", {'file_path':file_path,'read_file':""},
                    function (data, textStatus, jqXHR) {
                        //$("#tpl_content").text(data);
                        editor.setValue(data);
                        $("#editpath").text(file_path);
                        $("#file_path").val(file_path);
                        
                    }
                    
                );
            });

            $('#btnSave').click(function(e){         
              e.preventDefault();
              var code = editor.getValue();
              $("#file_content").val(code);
                $.ajax({
                    url: 'tpl_post.php',
                    type: 'POST',
                    data: $('#export_form').serialize(),
                    success: function (res) {
                        //  $('#resultreturn').prepend(res);
                        var myobj = JSON.parse(res);                    
                        //console.log(myobj.status);
                        if (myobj.status === 1) {
                            toastr.success(myobj.message);                                        
                        } 
                        if (myobj.status === 2) {
                            toastr.error(myobj.message)
                        }
                        if (myobj.status === 3) {
                            toastr.info(myobj.message)
                        }
                    }
                });        
            });
          
        });
    </script>

</body>

</html>