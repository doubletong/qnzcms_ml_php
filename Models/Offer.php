<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Offer extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "offers";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'name', 'schools', 'scholarship','image_url',
       'importance','dictionary_id', 'active','recommend','created_by'
   ];
 }

