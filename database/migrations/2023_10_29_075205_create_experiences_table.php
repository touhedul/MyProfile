<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateExperiencesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('company');
            $table->string('role')->nullable();
            $table->text('details')->nullable();
            $table->string('duration')->nullable();
            $table->integer('year')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $customerPermissions = [

            [
                'group_name' => 'Experience',
                'permissions' => [
                    // Experience Permissions
                    ['name'=>'Experience-view','route'=>route('admin.experiences.index'),'search_status'=>1],
                    ['name'=>'Experience-create','route'=>route('admin.experiences.create'),'search_status'=>1],
                    ['name'=>'Experience-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Experience-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('experiences');
    }
}
