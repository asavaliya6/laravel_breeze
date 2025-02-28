<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'quantity',
        'amount',
        'currency',
        'payment_status',
        'payment_method'
    ];
}
