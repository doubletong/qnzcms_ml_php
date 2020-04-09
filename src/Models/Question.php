<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Question extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "questions";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'title', 'answer', 'importance','category_id', 'active','created_by'
   ];

   public function category()
   {
       return $this->belongsTo(QuestionCategory::class,'category_id');
   }
 }

