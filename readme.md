# 青鸟内容管理系统多语言版本【QNZCMS_ML】

### 文件目录：

青鸟内容管理系统(QNZCMS)是适用企业网站建设的系统。

```
project
│   README.md
│   index.php    //homepage
|   .htaccess     //apache 重写路径│
└───app_data    //数据文件
│       qnzcms_php.sql   //数据备份   
│
└───assets    //资源文件
│   │   file011.txt
│   │   file012.txt
│   │
│   └───css   //样式表
│   │      styles.scss
│   │      ...
│   │   
│   └───img   //图片
|   └───fonts
│   └───js
|   └───caches   //缓存路径
|   └───templates    //模版路径
|
└───bbi-admin    //控制台目录
│   
└───config
|      db.php   //pdo 联接-过度阶段，目前正一步步转向 Eloquent ORM 方式
|      database.php   //Eloquent ORM 联接方式
|   
└───data    //仓储类
|      ...
|      
└───help   //帮助手册
|      ...
|      
└───includes   //局布组件
|      ...
|      
└───src
|   └───Migration
|   └───Models   //Eloquent ORM 模型定义
|   
└───uploads    //上传目录
|       ...
|  
└───Utils    //常用类
|      ...
|      
└───vendor   //composer 引用
|      ...
|   
└───views   //视图控制
       ...


```


### 引用第三方类库：

  - phpmailer/phpmailer 6.0    【邮箱服务】
  - jasongrimes/paginator 1.0    【分页组件】
  - illuminate/database": "*"   【ORM】
  - gregwar/captcha 1.17   【验证码】
  - twig/twig 3.0   【模板引擎】
  - phpfastcache/phpfastcache 7.1   【缓存】
  - myclabs/php-enum  ^0.1.7  【枚举处理】
  - mos/cimage ^0.7.21   【图片处理】
  - samdark/sitemap ^2.2   【站点地图】
  - katzgrau/klogger : dev-master  【日志模块】
  - mobiledetect/mobiledetectlib 【移动适配】