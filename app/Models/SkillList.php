<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SkillList
 * @package App\Models
 * @version December 16, 2023, 9:45 am +06
 *
 * @property string $name
 */
class SkillList extends Model
{

    use HasFactory;

    public $table = 'skill_lists';




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
