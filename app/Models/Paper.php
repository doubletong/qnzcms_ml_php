<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Paper extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "Papers";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'content','thumbnail', 'lang','importance','pubdate', 'active','added_by'
   ];
 
 }


 ?>