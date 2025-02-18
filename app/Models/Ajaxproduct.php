<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ajaxproduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'detail'
    ];
}
