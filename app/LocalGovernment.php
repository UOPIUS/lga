<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalGovernment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locals';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'local_id';
    
}
