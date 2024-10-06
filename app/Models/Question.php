<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'correct_answer'];

    // Relation avec les choix (answers)
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
