<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'text_1',
        'text_2',
        'text_3',
        'count_1',
        'count_text_1',
        'count_2',
        'count_text_2',
        'count_3',
        'count_text_3',
        'button_text',
        'button_status',
        'extra_text',
    ];
}
