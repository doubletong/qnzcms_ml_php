<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class TeamCategory extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "team_categories";
   /**
    * fields allowed to be inserted
    *
    * @var array
    */
    protected $fillable = [
        'title', 'description','importance'
    ];

   /*
    * Adding methods to User classes
    */
    public function teams()
    {
        return $this->hasMany(Team::class, 'category_id');
    }
}

?>