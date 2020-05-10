<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Metadata extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "metadatas";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'title', 'keywords', 'design','module_type','key_value'

   ];
 }

