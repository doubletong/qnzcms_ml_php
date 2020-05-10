<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class DownloadCategory extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "download_categories";
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
    public function downloads()
    {
        return $this->hasMany(Download::class, 'category_id');
    }
}

?>