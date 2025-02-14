<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realpost extends Model
{
    use HasFactory;

    protected $fillable = ['realuser_id', 'title', 'body'];

    public function realuser()
    {
        return $this->belongsTo(Realuser::class);
    }
}
