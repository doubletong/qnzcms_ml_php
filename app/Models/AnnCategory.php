<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class AnnCategory extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "ann_categories";
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
    public function announcements()
    {
        return $this->hasMany(Announcement::class, 'category_id');
    }

    public function children(){
        return $this->hasMany(AnnCategory::class, 'parent', 'id' );
    }
    
    public function parent(){
        return $this->hasOne(AnnCategory::class, 'id', 'parent' );
    }
}

?>