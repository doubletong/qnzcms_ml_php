<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
class Role extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "roles";
   /**
    * 允许插入的字段
    *
    * @var array
    */
    protected $fillable = [
        'name', 'description','importance'
    ];
  
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
