<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuProfession extends Model
{
    use HasFactory;

    protected $fillable=['menu_id','profession_id'];
}
