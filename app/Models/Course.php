<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Course
 * @package App\Models
 * @version October 24, 2023, 8:39 am +06
 *
 * @property string $title
 * @property string $details
 */
class Course extends Model
{

    use HasFactory;

    public $table = 'courses';




    public $fillable = [
        'user_id',
        'title',
        'details',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'details' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:191',
        'details' => 'nullable|string|max:65530'
    ];


}
