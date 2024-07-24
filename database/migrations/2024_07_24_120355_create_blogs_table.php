<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateBlogsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('details');
            $table->string('image');
            $table->timestamps();
        });

        $adminPermissions = [

            [
                'group_name' => 'Blog',
                'permissions' => [
                    // Blog Permissions
                    ['name'=>'Blog-view','route'=>route('admin.blogs.index'),'search_status'=>1],
                    ['name'=>'Blog-create','route'=>route('admin.blogs.create'),'search_status'=>1],
                    ['name'=>'Blog-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Blog-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('blogs');
    }
}
