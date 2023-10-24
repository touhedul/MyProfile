<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateCoursesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('title');
            $table->text('details')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $coursePermissions = [

            [
                'group_name' => 'Course',
                'permissions' => [
                    // Course Permissions
                    ['name'=>'Course-view','route'=>route('admin.courses.index'),'search_status'=>1],
                    ['name'=>'Course-create','route'=>route('admin.courses.create'),'search_status'=>1],
                    ['name'=>'Course-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Course-delete','route'=>NULL,'search_status'=>0],
                ]
            ],
        ];

        (new AdminHelper())->addPermission("customer",$coursePermissions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
