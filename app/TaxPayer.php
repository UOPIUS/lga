<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxPayer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tax_payers';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * Fields permitted for filling
     * @var array
     */
    protected $fillable = ['fname','lname','oname','phone','address',
    'state_id','lga_id', 'occupation','photo','tin','work_type','finger_print','created_by','status'];


    public function lga()
    {
        //return $this->hasOne('App\LocalGovernment','foriegn_key','local_key');
        return $this->belongsTo('App\LocalGovernment', 'lga_id','local_id');
    }
    public function state()
    {
        
        return $this->belongsTo('App\State', 'state_id','state_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
