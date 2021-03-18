<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Chronicle extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "chronicles";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'year', 'content', 'importance','lang', 'active','created_by'
   ];
 }

