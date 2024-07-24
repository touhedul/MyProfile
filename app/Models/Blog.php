<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Blog
 * @package App\Models
 * @version July 24, 2024, 12:03 pm +06
 *
 * @property string $title
 * @property string $details
 * @property string $image
 */
class Blog extends Model
{

    use HasFactory;

    public $table = 'blogs';
    



    public $fillable = [
        'title',
        'details',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'details' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:190',
        'details' => 'required|string|max:65530',
        'image' => 'nullable|image|max:5000'
    ];

    
}
