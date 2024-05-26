<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CustomDomain
 * @package App\Models
 * @version May 26, 2024, 10:24 am +06
 *
 * @property integer $user_id
 * @property string $domain
 * @property boolean $status
 * @property boolean $is_sub_domain
 */
class CustomDomain extends Model
{

    use HasFactory;

    public $table = 'custom_domains';




    public $fillable = [
        'user_id',
        'domain',
        'status',
        'is_sub_domain'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'domain' => 'string',
        'status' => 'boolean',
        'is_sub_domain' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|integer',
        'domain' => 'required|string|max:100'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
