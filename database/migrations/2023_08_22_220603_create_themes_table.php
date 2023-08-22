<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;
use App\Models\Theme;

class CreateThemesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $adminPermissions = [

            [
                'group_name' => 'Theme',
                'permissions' => [
                    // Theme Permissions
                    ['name'=>'Theme-view','route'=>route('admin.themes.index'),'search_status'=>1],
                    ['name'=>'Theme-create','route'=>route('admin.themes.create'),'search_status'=>1],
                    ['name'=>'Theme-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Theme-delete','route'=>NULL,'search_status'=>0],
                ]
            ],
        ];

        (new AdminHelper())->addPermission("admin",$adminPermissions);

        Theme::create(['name' => 'Default']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('themes');
    }
}
