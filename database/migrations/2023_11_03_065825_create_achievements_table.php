<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateAchievementsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id');
            $table->string('title');
            $table->text('details')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $customerPermissions = [

            [
                'group_name' => 'Achievement',
                'permissions' => [
                    // Achievement Permissions
                    ['name'=>'Achievement-view','route'=>route('admin.achievements.index'),'search_status'=>1],
                    ['name'=>'Achievement-create','route'=>route('admin.achievements.create'),'search_status'=>1],
                    ['name'=>'Achievement-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Achievement-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('achievements');
    }
}
