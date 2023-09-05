<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'slider_1',
        'slider_2',
        'slider_3',
        'slider_1_status',
        'slider_2_status',
        'slider_3_status',
        'text_1',
        'text_2',
        'text_3',
        'button_text',
        'cv',
        'button_status',
    ];
}
