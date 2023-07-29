<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'student_id',
        'question_id',
        'right_option',
        'created_at',
        'updated_at'
        // Add other fillable attributes as needed
    ];

}