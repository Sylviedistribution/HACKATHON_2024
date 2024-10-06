<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'answer_text',
        'is_correct', // Indique si c'est la bonne réponse
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
