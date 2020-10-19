<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Event extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "events";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'title','summary','content','thumbnail', 'importance','datestart','compere','organizer','organizer_en',
       'issue','meet_id','link','address','view_count', 'pro_name','pro_company', 'pro_intro',  'footer_note',
       'recommend','active','added_by','category_id'
   ];

    public function category()
    {
        return $this->belongsTo(EventCategory::class,'category_id');
    }
 
 }


 ?>