<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = [
        'english',
        'phonetic_symbol',
        'japanese',
        'japanese2',
        'english_sentence',
        'japanese_sentence',
        'voice_script',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_word')
            ->withPivot('memorised')
            ->withTimestamps();
    }
}
