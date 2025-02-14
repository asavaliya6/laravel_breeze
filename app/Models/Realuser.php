<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realuser extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function realphone()
    {
        return $this->hasOne(Realphone::class);
    }
    public function realposts()
    {
        return $this->hasMany(Realpost::class);
    }
}

