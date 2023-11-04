<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Education
 * @package App\Models
 * @version November 4, 2023, 7:40 am +06
 *
 * @property string $name
 * @property string $details
 * @property boolean $status
 */
class Education extends Model
{

    use HasFactory;

    public $table = 'education';




    public $fillable = [
        'name',
        'user_id',
        'details',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'details' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
        'details' => 'nullable|string|max:65530'
    ];


}
