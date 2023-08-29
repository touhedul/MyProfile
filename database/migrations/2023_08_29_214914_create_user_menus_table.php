<?php

use App\Helpers\AdminHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('menu_id');
            $table->string('menu_title');
            $table->boolean('show_status')->default(1);
            $table->timestamps();
        });

        $customerPermissions = [

            [
                'group_name' => 'Menu',
                'permissions' => [
                    // Menu Permissions
                    ['name'=>'Menu-management','route'=>route('admin.menuManagement.index'),'search_status'=>1],
                ]
            ],
        ];
        (new AdminHelper())->addPermission("customer",$customerPermissions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_menuses');
    }
};
