<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Lab extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "labs";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'title', 'thumbnail', 'lang',  'content','summary', 'structure', 'committee', 'importance','template', 'active','created_by','view_count'
   ];
 }

