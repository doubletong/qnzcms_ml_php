<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class LinkCategory extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "link_categories";
   /**
    * fields allowed to be inserted
    *
    * @var array
    */
    protected $fillable = [
        'title', 'importance'
    ];

   /*
    * Adding methods to User classes
    */
    public function links()
    {
        return $this->hasMany(Link::class, 'category_id');
    }
}

?>