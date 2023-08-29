<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'menu_id',
        'menu_title',
        'show_status',
    ];
}
