<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class Region extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "regions";
   /**
    * fields allowed to be inserted
    *
    * @var array
    */
    protected $fillable = [
        'title', 'description','importance'
    ];

   /*
    * Adding methods to User classes
    *
    */
    public function resellers()
    {
        return $this->hasMany(Reseller::class, 'region_id');
    }
}

?>