<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Achievement
 * @package App\Models
 * @version November 3, 2023, 6:58 am +06
 *
 * @property string $title
 * @property string $details
 * @property string $image
 * @property boolean $status
 */
class Achievement extends Model
{

    use HasFactory;

    public $table = 'achievements';




    public $fillable = [
        'user_id',
        'title',
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
