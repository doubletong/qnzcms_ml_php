<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Exhibition extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "exhibitions";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'title', 'start_date', 'end_date','thumbnail', 'content','summary', 'active','recommend','created_by','view_count'
   ];
 }

