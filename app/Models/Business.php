<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Business extends Model
{
    /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "businesses";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'title','image_url','content', 'category_id','importance','lang','active','added_by'
   ];

    public function category()
    {
        return $this->belongsTo(SubsidiaryCategory::class,'category_id');
    }
 }

 ?>