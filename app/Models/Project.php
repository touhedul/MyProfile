<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Project
 * @package App\Models
 * @version October 20, 2023, 6:52 am +06
 *
 * @property string $title
 * @property string $details
 * @property string $image
 * @property boolean $status
 */
class Project extends Model
{

    use HasFactory;

    public $table = 'projects';




    public $fillable = [
        'title',
        'user_id',
        'details',
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
        'title' => 'string',
        'details' => 'string',
        'image' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:191',
        'details' => 'nullable|string|max:65530',
        'image' => 'nullable|image|max:5000'
    ];


}
