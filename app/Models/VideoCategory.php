<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class VideoCategory extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "video_categories";
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
    public function videos()
    {
        return $this->hasMany(Video::class, 'category_id');
    }
}

?>