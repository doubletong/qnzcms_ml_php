<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class AdvertisingSpace extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "advertising_spaces";
   /**
    * fields allowed to be inserted
    *
    * @var array
    */
    protected $fillable = [
        'title','code', 'description','importance','active','added_by'
    ];

   /*
    * Adding methods to User classes
    *
    */
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'space_id');
    }
}

?>