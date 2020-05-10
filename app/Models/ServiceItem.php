<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class ServiceItem extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "service_items";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'title', 'summary', 'thumbnail','image_url','banner', 'importance', 'content', 'active','recommend','created_by','view_count'
   ];
 }

