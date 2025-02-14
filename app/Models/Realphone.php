<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realphone extends Model
{
    use HasFactory;

    protected $fillable = ['realuser_id', 'phone'];

    public function realuser()
    {
        return $this->belongsTo(Realuser::class);
    }
}

