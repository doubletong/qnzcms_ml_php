<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model;
class SocialAccount extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "social_accounts";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'username','url','qrcode', 'importance', 'social_id','active','added_by'
   ];

    public function socialSoftware()
    {
        return $this->belongsTo(SocialSoftware::class,'social_id');
    } 
 }


 ?>