<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;
use App\Models\Menu;

class CreateMenusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $adminPermissions = [

            [
                'group_name' => 'Menu',
                'permissions' => [
                    // Menu Permissions
                    ['name'=>'Menu-view','route'=>route('admin.menus.index'),'search_status'=>1],
                    ['name'=>'Menu-create','route'=>route('admin.menus.create'),'search_status'=>1],
                    ['name'=>'Menu-update','route'=>NULL,'search_status'=>0],
                    // ['name'=>'Menu-delete','route'=>NULL,'search_status'=>0],
                ]
            ],
        ];

        Menu::menuListCreate();
        (new AdminHelper())->addPermission("admin",$adminPermissions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menus');
    }
}
