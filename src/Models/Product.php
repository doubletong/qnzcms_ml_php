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
    protected $table = "products_v1";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'title','content','pdf', 'importance', 'active','added_by','category_id'
   ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'category_id');
    }
 
 }


 ?>