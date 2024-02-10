<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Theme
 * @package App\Models
 * @version August 22, 2023, 10:06 pm +06
 *
 * @property string $name
 */
class Theme extends Model
{

    use HasFactory;

    public $table = 'themes';




    public $fillable = [
        'name', 'default_status'
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
