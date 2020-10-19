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
       'title', 'address', 'homepage','post','research','education','requirement', 'population','other','application','intro','lang','team_id','importance', 'active','created_by'
   ];

   public function team()
   {
       return $this->belongsTo(Team::class,'team_id');
   }

 }

