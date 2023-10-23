<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'text_1',
        'text_2',
        'color',
        'button_text',
        'show_status',
        'show_button_status',
    ];
}
