<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Uuidpost extends Model
{
    use HasUuids;

    protected $keyType = 'string';  
    public $incrementing = false;   

    protected $fillable = ['title', 'content'];
}
