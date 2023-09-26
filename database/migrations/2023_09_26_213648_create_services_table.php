<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateServicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $customerPermissions = [

            [
                'group_name' => 'Service',
                'permissions' => [
                    // Service Permissions
                    ['name'=>'Service-view','route'=>route('admin.services.index'),'search_status'=>1],
                    ['name'=>'Service-create','route'=>route('admin.services.create'),'search_status'=>1],
                    ['name'=>'Service-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Service-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('services');
    }
}
