<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Carousel extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "carousels";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'title','description', 'importance', 'link', 'image_url','image_url_mobile','active','added_by','position_id'
   ];

    public function position()
    {
        return $this->belongsTo('Models\Position');
    }
 
 }


 ?>