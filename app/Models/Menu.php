<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Menu extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "menus";
  /**
   * 允许插入的字段
   *
   * @var array
   */
   protected $fillable = [
       'title', 'url', 'description','lang', 'icon' ,'parent','group_id', 'importance','new_window', 'active','created_by'
   ];

   public function children(){
        return $this->hasMany(Menu::class, 'parent', 'id' );
   }

    public function parent(){
        return $this->hasOne(Menu::class, 'id', 'parent' );
    }
 }

