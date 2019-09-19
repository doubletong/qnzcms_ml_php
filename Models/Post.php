<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "test002";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'title', 'body', 'created_by'
   ];
 }

