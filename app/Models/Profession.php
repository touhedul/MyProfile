<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Profession
 * @package App\Models
 * @version November 30, 2023, 7:27 am +06
 *
 * @property string $name
 * @property integer $profession_category_id
 * @property boolean $status
 */
class Profession extends Model
{

    use HasFactory;

    public $table = 'professions';




    public $fillable = [
        'name',
        'profession_category_id',
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
        'profession_category_id' => 'integer',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
        'profession_category_id' => 'required|integer'
    ];

    public function category()
    {
        return $this->belongsTo(ProfessionCategory::class,'profession_category_id');
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }


}
