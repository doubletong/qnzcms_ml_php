<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Job extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "jobs";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'title', 'city', 'department','responsibilities','requirement', 'population','importance', 'active','created_by'
   ];
 }

