<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class ProductCategory extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "product_categories_v1";
   /**
    * fields allowed to be inserted
    *
    * @var array
    */
    protected $fillable = [
        'title','parent', 'importance','active','added_by'
    ];

   /*
    * Adding methods to User classes
    *
    */
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function children(){
        return $this->hasMany(ProductCategory::class, 'parent', 'id' );
    }
    
    public function parent(){
        return $this->hasOne(ProductCategory::class, 'id', 'parent' );
    }
}

?>