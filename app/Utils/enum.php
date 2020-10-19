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
    private const TEAM = 8; //成员
    private const EVENT = 9; //会议活动
    private const LAB = 10; 
    private const RESEARCH = 11; //研究中心
  }

  // permission type 
  class PerType extends Enum {
    private const LINK = 1;
    private const NODE = 2;
    private const ACTION = 3;   
  }

  // permission group
  class PerGroup extends Enum {
    private const CONTENT = 1;
    private const SYSTEM = 2;
    private const TEMPLATE = 3;   
  }

  class Action extends Enum
  {
      private const VIEW = '查看';
      private const EDIT = '编辑';
      private const DELETE = '删除';
      private const COPY = '复制';
      private const ACTIVE = '激活/锁定';
  }

?>