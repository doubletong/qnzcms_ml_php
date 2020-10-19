<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model;
class News extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "news";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'title','summary','content','thumbnail','image_url','lang', 'importance','pubdate','author','author_ext','view_count', 'recommend','active','added_by','category_id'
   ];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class,'category_id');
    }
 
 }


 ?>