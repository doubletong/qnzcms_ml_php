<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Resource extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "resources";
    //protected $primaryKey = ['key','lang_code']; // or null
    //public $incrementing = false;
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
      'lang_code', 'key', 'value', 'created_by'
   ];
 }

