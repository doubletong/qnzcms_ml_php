<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Photo extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "photos";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'title','lang','description', 'importance', 'image_url', 'album_id','active','added_by'
   ];

    public function album()
    {
        return $this->belongsTo(Album::class,'album_id');
    }
 
 }


 ?>