<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Storeproduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'details'
    ]; 

    protected $casts = [
        'details' => 'json'    
    ];
}
