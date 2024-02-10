<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Social
 * @package App\Models
 * @version November 11, 2023, 6:53 am +06
 *
 * @property string $link
 * @property string $icon
 * @property boolean $status
 */
class Social extends Model
{

    use HasFactory;

    public $table = 'socials';




    public $fillable = [
        'user_id',
        'link',
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
        'link' => 'string',
        'icon' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'link' => 'required|string|max:190',
        'icon' => 'required|string|max:190'
    ];
}
