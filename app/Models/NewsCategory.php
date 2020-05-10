<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class NewsCategory extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "news_categories";
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
    public function articles()
    {
        return $this->hasMany(News::class, 'category_id');
    }

    public function children(){
        return $this->hasMany(NewsCategory::class, 'parent', 'id' );
    }
    
    public function parent(){
        return $this->hasOne(NewsCategory::class, 'id', 'parent' );
    }
}

?>