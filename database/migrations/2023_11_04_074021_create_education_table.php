<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateEducationTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name');
            $table->text('details')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $customerPermissions = [

            [
                'group_name' => 'Education',
                'permissions' => [
                    // Education Permissions
                    ['name'=>'Education-view','route'=>route('admin.education.index'),'search_status'=>1],
                    ['name'=>'Education-create','route'=>route('admin.education.create'),'search_status'=>1],
                    ['name'=>'Education-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Education-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('education');
    }
}
