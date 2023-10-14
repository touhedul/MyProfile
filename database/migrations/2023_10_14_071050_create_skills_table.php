<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateSkillsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('title');
            $table->integer('percentage');
            $table->timestamps();
        });

        $customerPermissions = [

            [
                'group_name' => 'Skill',
                'permissions' => [
                    // Skill Permissions
                    ['name'=>'Skill-view','route'=>route('admin.skills.index'),'search_status'=>1],
                    ['name'=>'Skill-create','route'=>route('admin.skills.create'),'search_status'=>1],
                    ['name'=>'Skill-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Skill-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('skills');
    }
}
