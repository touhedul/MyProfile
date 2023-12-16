<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateSkillListsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $adminPermissions = [

            [
                'group_name' => 'SkillList',
                'permissions' => [
                    // SkillList Permissions
                    ['name'=>'SkillList-view','route'=>route('admin.skillLists.index'),'search_status'=>1],
                    ['name'=>'SkillList-create','route'=>route('admin.skillLists.create'),'search_status'=>1],
                    ['name'=>'SkillList-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'SkillList-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('skill_lists');
    }
}
