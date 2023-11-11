<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateSocialsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('link');
            $table->string('icon');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $customerPermissions = [

            [
                'group_name' => 'Social',
                'permissions' => [
                    // Social Permissions
                    ['name'=>'Social-view','route'=>route('admin.socials.index'),'search_status'=>1],
                    ['name'=>'Social-create','route'=>route('admin.socials.create'),'search_status'=>1],
                    ['name'=>'Social-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Social-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('socials');
    }
}
