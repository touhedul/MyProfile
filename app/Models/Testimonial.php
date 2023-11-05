<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Testimonial
 * @package App\Models
 * @version November 5, 2023, 7:02 am +06
 *
 * @property string $name
 * @property string $designation
 * @property string $message
 * @property string $image
 * @property boolean $status
 */
class Testimonial extends Model
{

    use HasFactory;

    public $table = 'testimonials';




    public $fillable = [
        'user_id',
        'name',
        'designation',
        'message',
        'image',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'designation' => 'string',
        'message' => 'string',
        'image' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
        'designation' => 'nullable|string|max:191',
        'message' => 'required|string|max:65530',
        'image' => 'nullable|image|max:191'
    ];


}
