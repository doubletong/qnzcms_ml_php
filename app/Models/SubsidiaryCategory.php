<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class SubsidiaryCategory extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "subsidiary_categories";
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
    public function subsidiaries()
    {
        return $this->hasMany(Subsidiary::class, 'category_id');
    }
}

?>