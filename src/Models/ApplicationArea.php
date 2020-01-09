<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class ApplicationArea extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "application_areas";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'title', 'sub_title', 'intro','cases','image_url',
       'importance','active', 'created_by'
   ];
 }

