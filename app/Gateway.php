<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_gateways';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
}
