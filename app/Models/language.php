<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Language extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "languages";
    protected $primaryKey = 'code'; // or null
    public $incrementing = false;
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'code', 'name','show_label','issys','default','importance','active'
   ];
 }

