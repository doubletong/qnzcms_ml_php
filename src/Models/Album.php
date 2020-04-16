<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class Album extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "albums";
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
    */
    public function photos()
    {
        return $this->hasMany(Photo::class, 'album_id');
    }
}

?>