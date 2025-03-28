<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'qr_code', 
        'quantity', 
        'price'
    ];
}
