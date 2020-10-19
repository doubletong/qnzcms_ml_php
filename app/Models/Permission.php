<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Permission extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "permissions";
  /**
   * 允许插入的字段
   * per_type: 1 link，2 node, 3 action
   * @var array
   */
   protected $fillable = [
       'title', 'url', 'description', 'icon' ,'parent','group_id', 'importance','per_type', 'active','created_by'
   ];

   public function children(){
        return $this->hasMany(Permission::class, 'parent', 'id' );
   }

    public function parent(){
        return $this->hasOne(Permission::class, 'id', 'parent' );
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }
 }

