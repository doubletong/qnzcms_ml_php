<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Research extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "researches";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'title','title_short','lab', 'icon','thumbnail', 'image_url','lang',  'content','summary', 'research_group', 'teachers', 'importance', 'active','created_by','view_count'
   ];
 }

