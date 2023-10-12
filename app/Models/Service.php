<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Service
 * @package App\Models
 * @version September 26, 2023, 9:36 pm +06
 *
 * @property string $title
 * @property string $description
 * @property string $icon
 * @property boolean $status
 */
class Service extends Model
{

    use HasFactory;

    public $table = 'services';




    public $fillable = [
        'user_id',
        'title',
        'description',
        'icon',
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
        'description' => 'string',
        'icon' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:191',
        'description' => 'nullable|string|max:65530',
        'icon' => 'nullable|string|max:191'
    ];


}
