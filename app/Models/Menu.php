<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Menu
 * @package App\Models
 * @version August 29, 2023, 9:34 pm +06
 *
 * @property string $name
 */
class Menu extends Model
{

    use HasFactory;

    public $table = 'menus';





    public $fillable = [
        'name', 'status', 'background_color'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:190'
    ];
}
