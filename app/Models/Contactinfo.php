<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contactinfo
 * @package App\Models
 * @version November 7, 2023, 9:32 pm +06
 *
 * @property string $title
 * @property string $details
 * @property string $icon
 * @property boolean $status
 */
class Contactinfo extends Model
{

    use HasFactory;

    public $table = 'contactinfos';




    public $fillable = [
        'title',
        'user_id',
        'details',
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
        'details' => 'string',
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
        'details' => 'nullable|string|max:65530',
        'icon' => 'nullable|string|max:191'
    ];


}
