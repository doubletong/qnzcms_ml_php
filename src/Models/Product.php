<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "products";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'title','content','thumbnail', 'importance', 'active','added_by','category_id'
   ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'category_id');
    }
 
 }


 ?>