<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TaxService;
class TaxRates extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tax_rates';
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
    public function service()
    {
        return $this->belongsTo('App\TaxService','tax_service','service_code');
    }
}
