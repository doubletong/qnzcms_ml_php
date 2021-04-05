<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Advertisement extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "advertisements";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'title','description', 'importance', 'link', 'lang','image_url','image_url_mobile','active','added_by','space_id'
   ];

    public function advertising_space()
    {
        return $this->belongsTo(AdvertisingSpace::class,'space_id');
    } 
 }


 ?>