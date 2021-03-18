<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Subsidiary extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "subsidiaries";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'name','logo_url','stock_code', 'category_id','importance','lang','active','added_by'
   ];

    public function category()
    {
        return $this->belongsTo(SubsidiaryCategory::class,'category_id');
    }
 }

 ?>