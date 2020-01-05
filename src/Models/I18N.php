<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class I18N extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "i18n";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'keyword', '	translation',	'created_by'
   ];
 }

