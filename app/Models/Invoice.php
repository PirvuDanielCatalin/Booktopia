<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $primaryKey = 'invoice_id';
    public $timestamps = false;

    protected $fillable = [
        'date', 'billing_address', 'delivery_address', 'withPoints', 'step'
    ];

    // Invoice 1 - M Buy(FK)
    public function buys()
    {
        return $this->hasMany('App\Models\Buy','invoice_id');
    }
}
