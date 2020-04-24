<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class SocialSoftware extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "social_softwares";
   /**
    * fields allowed to be inserted
    *
    * @var array
    */
    protected $fillable = [
        'name', 'icon','iconfont','importance','active','added_by'
    ];

   /*
    * Adding methods to User classes
    */
    public function SocialAccounts()
    {
        return $this->hasMany(SocialAccount::class, 'social_id');
    }
}

?>