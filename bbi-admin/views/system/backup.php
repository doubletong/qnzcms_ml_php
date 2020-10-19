<?php
use Illuminate\Database\Capsule\Manager as Capsule;
require_once('../../includes/common.php');

if(isset($_POST['backup']))
{
    backupsData();
}


/** 数据备份 导出 */
function backupsData()
{
    $sql_filename='backup_'.date('YmdHis').'.'.'sql';
    $to_file_name = $sql_filename;
    $tables = Capsule::select('SHOW TABLES');
    $object =  json_decode( json_encode( $tables),true);

    //    print_r($object);die;

    $names = array();
    //    print_r($names);exit;
    foreach($object as $k => $v){
        $names[] = $v['Tables_in_qnzcms_shibs'];
    }

    echo "运行中，请耐心等待...<br/>";

    $info = "-- ----------------------------\r\n";
    $info .= "-- 日期：".date("Y-m-d H:i:s",time())."\r\n";
    $info .= "-- qnzcms doubletong\r\n";
    $info .= "-- 备份\r\n";
    $info .= "-- ----------------------------\r\n\r\n";
    var_dump(file_put_contents($to_file_name,$info,FILE_APPEND));

    //将每个表的表结构导出到文件
    foreach($names as $val) {
        //print_r($names);exit;
        $sql = "show create table " . $val;
        //$res = mysql_query($sql,$link);
        $ress = Capsule::select($sql);
        $res = json_decode(json_encode($ress), true);
        //print_r($res);die;
        // $row = mysql_fetch_array($res);
        $info = "-- ----------------------------\r\n";
        $info .= "-- Table structure for `" . $val . "`\r\n";
        $info .= "-- ----------------------------\r\n";
        $info .= "DROP TABLE IF EXISTS `" . $val . "`;\r\n";
        $sqlStr = $info . $res[0]['Create Table'] . ";\r\n\r\n";
        //追加到文件
        file_put_contents($to_file_name, $sqlStr, FILE_APPEND);

    }

    //将每个表的数据导出到文件
    foreach($names as $val){
        $sql = "select * from ".$val;
        $ress = Capsule::select($sql);
        $res = json_decode( json_encode( $ress),true);
        //如果表中没有数据，则继续下一张表
        if(count($res)<1) continue;
        //
        $info = "-- ----------------------------\r\n";
        $info .= "-- Records for `".$val."`\r\n";
        $info .= "-- ----------------------------\r\n";
        file_put_contents($to_file_name,$info,FILE_APPEND);
        //读取数据
        foreach($res as $z){
            $sqlStr = "INSERT INTO `".$val."` VALUES (";
            foreach($z as $zd){
                $sqlStr .= "'".$zd."', ";
            }
            //去掉最后一个逗号和空格
            $sqlStr = substr($sqlStr,0,strlen($sqlStr)-2);
            $sqlStr .= ");\r\n";
            file_put_contents($to_file_name,$sqlStr,FILE_APPEND);
        }
        file_put_contents($to_file_name,"\r\n",FILE_APPEND);
    }

    //将备份信息入库
    // $file_size = filesize($sql_filename);
    // $times=date('Y-m-d H:i:s');
    // $re = Capsule::table('database_backups')->insert(
    //     [
    //         'file_name' => $sql_filename,
    //         'file_size' => $file_size,
    //         'backups_time' => $times,
    //     ]);

   // if($re){
   //     echo "<script>alert('备份成功');</script>";
   //}


    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($sql_filename));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($sql_filename));
    ob_clean();
    flush();
    readfile($sql_filename);
    unlink($sql_filename);
}


?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "基本信息_系统_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
</head>

<body>
    <div class="wrapper" id="wrapper">
        <!-- nav start -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav_system.php'); ?>
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
                                <li class="breadcrumb-item active" aria-current="page">备份数据库</li>
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
                                <div class="card-title-v1"> <i class="iconfont icon-database"></i>备份数据库</div>
                            </div>
                            <div class="col-auto">
                                <div class="control"><a class="expand" href="#"><i class="iconfont icon-fullscreen"></i></a><a class="compress" href="#"><i class="iconfont icon-shrink"></i></a></div>
                            </div>
                        </div>
                    </header>
                <div class="card-body">
                        <input type="hidden" name='backup' value="backup" />
                        <div class="form-group">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary"><i class="iconfont icon-export"></i> 导出数据库</button>
                        </div>
                        </div>
                    </div>
                </form>
          
            </div>
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>

    <script src="/assets/js/vendor/holderjs/holder.min.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            //当前菜单        
            $("#module_nav>li:nth-of-type(2)").addClass("active").siblings().removeClass('active');  
            $(".mainmenu>li.backup a").addClass("active");


            $('#submit').click(function(){         
                $('#export_form').submit();          
            });
          
        });
    </script>

</body>

</html>