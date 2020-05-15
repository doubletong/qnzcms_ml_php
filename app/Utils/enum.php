<?php 

// https://github.com/myclabs/php-enum
use MyCLabs\Enum\Enum;

class ModuleType extends Enum {
    private const URL = 1;
    private const ARTICLE = 2;
    private const PRODUCT = 3;
    private const EXHIBITION = 4;   //展会
    private const NEWS = 5; //新闻资讯
    private const SERVICE = 6; //新闻资讯
    private const JOB = 7; //招聘
  }

?>