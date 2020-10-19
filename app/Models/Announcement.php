<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Announcements extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "announcements";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'title','summary','content','thumbnail','lang', 'importance','pubdate','author','view_count', 'recommend','active','added_by','category_id'
   ];

    public function category()
    {
        return $this->belongsTo(AnnCategory::class,'category_id');
    }
 
 }


 ?>