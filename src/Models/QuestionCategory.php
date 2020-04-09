<?php 
namespace Models;
use Illuminate\Database\Eloquent\Model;
class QuestionCategory extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "question_categories";
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
    public function questions()
    {
        return $this->hasMany(Question::class, 'category_id');
    }
}

?>