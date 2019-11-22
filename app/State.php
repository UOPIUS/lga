<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'states';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'state_id';

    public function lga()
    {
        return $this->hasMany('App\LocalGovernment','state_id','local_id');
        //return $this->hasMany('App\LocalGovernment', column_name);
    }
    
}
