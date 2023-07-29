<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'title',
        'expiry_date',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'right_option',
        'created_at',
        'updated_at'
        // Add other fillable attributes as needed
    ];

}