<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class EmailTemplate extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "email_templates";
   /**
    * fields allowed to be inserted
    *
    * @var array
    */
    protected $fillable = [
        'title','code', 'htmlbody','importance','added_by'
    ];


}

?>