<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model
{
   /**
    * 对应的数据表
    *
    * @var string
    */
    protected $table = "users";
   /**
    * 允许插入的字段
    *
    * @var array
    */
    protected $fillable = [
        'username', 'email', 'passwordhash'
    ];
   /**
    * 需要被隐藏的字段
    *
    * @var array
    */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
   /*
    * 给 User 类添加方法
    *
    */
    // public function posts()
    // {
    //     return $this->hasMany(Post::class, 'created_by');
    // }
}
