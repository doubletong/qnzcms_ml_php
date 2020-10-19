<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Link extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "links";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'title', 'url', 'image_url', 'lang', 'description', 'importance', 'category_id','active',	'created_by'
   ];

   public function category()
   {
       return $this->belongsTo(LinkCategory::class,'category_id');
   }

 }

