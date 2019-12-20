<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
class Reseller extends Model
{
   /**
    * Corresponding data tables
    *
    * @var string
    */
    protected $table = "resellers";
  /**
   * fields allowed to be inserted
   *
   * @var array
   */
   protected $fillable = [
       'name','address', 'email', 'homepage', 'phone','fax','opentime','facebook','instagram', 'youtube','twitter','link','zipcode','importance','region_id', 'country_id'
   ];

    public function region()
    {
        return $this->belongsTo('Models\Region');
    }
    public function country()
    {
        return $this->belongsTo('Models\Country');
    }
 }