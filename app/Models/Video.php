<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Video extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "videos";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'title','description', 'importance', 'file_url', 'file_size','poster','category_id','active','added_by'
   ];

    public function category()
    {
        return $this->belongsTo(VideoCategory::class,'category_id');
    }
 
 }


 ?>