<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Client
 * @package App\Models
 * @version November 5, 2023, 7:41 am +06
 *
 * @property string $image
 * @property boolean $status
 */
class Client extends Model
{

    use HasFactory;

    public $table = 'clients';




    public $fillable = [
        'user_id',
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
        'image' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' => 'required|image|max:5000'
    ];


}
