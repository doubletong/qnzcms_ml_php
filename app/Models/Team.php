<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Team extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "teams";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'name','first_letter','post','interests','email','education','school','homepage','office_phone','introduction','content', 'photo', 'fullphoto','category_id','importance','lang','active','added_by'
   ];

    public function category()
    {
        return $this->belongsTo(TeamCategory::class,'category_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'team_id');
    }

    public function organizations()
    {
        return $this->belongsToMany(Organization::class, 'teams_organizations',  'teams_id','organizations_id');;
    }
 
 }


 ?>