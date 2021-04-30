<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
    ];

    public function answeredQuestions() {
        return $this->hasMany(AnsweredQuestion::class, 'question_id', 'id');
    }
}
