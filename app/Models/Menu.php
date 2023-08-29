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
        'name','status'
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
        'name' => 'required|string|max:191'
    ];


    public static function menuListCreate()
    {
        $menus = [
            [
                'name' => 'Home',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'About',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Skill',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Service',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Project',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Course',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Achievement',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Experience',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Education',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Contact',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Menu::insert($menus);

        // Menu::create(['name' => 'Home']);
        // Menu::create(['name' => 'About']);
        // Menu::create(['name' => 'Skill']);
        // Menu::create(['name' => 'Service']);
        // Menu::create(['name' => 'Project']);
        // Menu::create(['name' => 'Course']);
        // Menu::create(['name' => 'Achievement']);
        // Menu::create(['name' => 'Experience']);
        // Menu::create(['name' => 'Education']);
        // Menu::create(['name' => 'Contact']);
    }

}
