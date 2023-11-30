<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;
use App\Models\ProfessionCategory;
use Database\Seeders\ProfessionCategorySeeder;
use Illuminate\Support\Facades\Artisan;

class CreateProfessionCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profession_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $adminPermissions = [

            [
                'group_name' => 'ProfessionCategory',
                'permissions' => [
                    // ProfessionCategory Permissions
                    ['name'=>'ProfessionCategory-view','route'=>route('admin.professionCategories.index'),'search_status'=>1],
                    ['name'=>'ProfessionCategory-create','route'=>route('admin.professionCategories.create'),'search_status'=>1],
                    ['name'=>'ProfessionCategory-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'ProfessionCategory-delete','route'=>NULL,'search_status'=>0],
                ]
            ],
        ];

        (new AdminHelper())->addPermission("admin",$adminPermissions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profession_categories');
    }
}
