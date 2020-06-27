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
       'name','first_letter','post','content', 'photo', 'fullphoto','category_id','importance','active','added_by'
   ];

    public function category()
    {
        return $this->belongsTo(TeamCategory::class,'category_id');
    }
 
 }


 ?>