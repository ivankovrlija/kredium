<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeLoanProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'user_id', 'property_value', 'down_payment_amount'
    ];
}
