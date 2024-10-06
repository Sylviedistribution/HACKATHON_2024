<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'score',
        'lives_left',  // Vies restantes pour une session de quiz
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
