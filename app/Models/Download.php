<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Download extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "downloads";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'title','description','content', 'importance', 'lang','file_url', 'file_size','thumbnail','category_id','down_count','active','added_by'
   ];

    public function category()
    {
        return $this->belongsTo(DownloadCategory::class,'category_id');
    }
 
 }


 ?>