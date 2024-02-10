<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProfessionCategory
 * @package App\Models
 * @version November 30, 2023, 6:46 am +06
 *
 * @property string $name
 */
class ProfessionCategory extends Model
{

    use HasFactory;

    public $table = 'profession_categories';




    public $fillable = [
        'name'
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
