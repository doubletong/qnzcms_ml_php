<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class EventCategory extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "event_categories";
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
    public function events()
    {
        return $this->hasMany(Event::class, 'category_id');
    }

    public function children(){
        return $this->hasMany(EventCategory::class, 'parent', 'id' );
    }
    
    public function parent(){
        return $this->hasOne(EventCategory::class, 'id', 'parent' );
    }
}

?>