<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class Position extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "positions";
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
    public function carousels()
    {
        return $this->hasMany(Carousel::class, 'position_id');
    }
}

?>