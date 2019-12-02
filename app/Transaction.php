<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';
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
    protected $fillable = ['tax_service','tax_payer','amount','gateway_used',
							'collected_status','lga_id','created_by','txref'];
	
 
    public function taxService()
    {
        //return $this->hasOne('App\LocalGovernment','foriegn_key','local_key');
        return $this->belongsTo('App\TaxService', 'tax_service','local_id');
    }
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
