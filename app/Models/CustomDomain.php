<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomDomain extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'domain',
        'status',
        'is_sub_domain',
    ];
}
