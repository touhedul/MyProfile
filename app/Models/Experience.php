<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Experience
 * @package App\Models
 * @version October 29, 2023, 7:52 am +06
 *
 * @property string $company
 * @property string $role
 * @property string $details
 * @property string $duration
 * @property integer $year
 */
class Experience extends Model
{

    use HasFactory;

    public $table = 'experiences';




    public $fillable = [
        'user_id',
        'company',
        'role',
        'details',
        'duration',
        'year',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company' => 'string',
        'role' => 'string',
        'details' => 'string',
        'duration' => 'string',
        'year' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company' => 'required|string|max:191',
        'role' => 'nullable|string|max:191',
        'details' => 'nullable|string|max:65530',
        'duration' => 'nullable|string|max:191',
        'year' => 'nullable|numeric'
    ];


}
