<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Skill
 * @package App\Models
 * @version October 14, 2023, 7:10 am +06
 *
 * @property string $title
 * @property number $percentage
 */
class Skill extends Model
{

    use HasFactory;

    public $table = 'skills';




    public $fillable = [
        'user_id',
        'title',
        'percentage'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:191',
        'percentage' => 'required|numeric|min:0|max:100'
    ];


}
