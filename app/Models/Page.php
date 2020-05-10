<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Page extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "pages";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'title', 'alias', 'content','background_image','view_count',
       'importance', 'active','created_by'
   ];
 }

