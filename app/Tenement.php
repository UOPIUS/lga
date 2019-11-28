<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenement extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tenements';
    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
   protected $fillable = ['tax_payer','cofo','lga_id','ppty_code','created_by','status'];

    public function lga()
    {
        //return $this->hasOne('App\LocalGovernment','foriegn_key','local_key');
        return $this->belongsTo('App\LocalGovernment', 'lga_id','local_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
