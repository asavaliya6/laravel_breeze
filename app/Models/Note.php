<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'body'];

    protected static function booted(): void
    {
        static::creating(function (Note $note) {
            info('Creating event called: ' . json_encode($note));
            $note->slug = Str::slug($note->title);
        });

        static::created(function (Note $note) {
            info('Created event called: ' . json_encode($note));
        });

        static::updating(function (Note $note) {
            info('Updating event called: ' . json_encode($note));
            $note->slug = Str::slug($note->title);
        });

        static::updated(function (Note $note) {
            info('Updated event called: ' . json_encode($note));
        });

        static::deleting(function (Note $note) {
            info('Deleting event called: ' . json_encode($note));
        });

        static::deleted(function (Note $note) {
            info('Deleted event called: ' . json_encode($note));
        });
    }
}
