<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class Organization extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "organizations";
   /**
    * fields allowed to be inserted
    *
    * @var array
    */
    protected $fillable = [
        'title', 'title_en','importance'
    ];

   /*
    * Adding methods to User classes
    */
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'teams_organizations', 'organizations_id', 'teams_id');;
    }
}

?>