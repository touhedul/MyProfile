<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateClientsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $customerPermissions = [

            [
                'group_name' => 'Client',
                'permissions' => [
                    // Client Permissions
                    ['name'=>'Client-view','route'=>route('admin.clients.index'),'search_status'=>1],
                    ['name'=>'Client-create','route'=>route('admin.clients.create'),'search_status'=>1],
                    ['name'=>'Client-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Client-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('clients');
    }
}
