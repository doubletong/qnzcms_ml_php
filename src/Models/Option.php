<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Option extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "options";
    protected $primaryKey = 'config_name'; // or null
    public $incrementing = false;
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'config_name', 'config_values', 'created_by'
   ];
 }

