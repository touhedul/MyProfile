<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateContactinfosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactinfos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('title');
            $table->text('details')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $customerPermissions = [

            [
                'group_name' => 'Contactinfo',
                'permissions' => [
                    // Contactinfo Permissions
                    ['name'=>'Contactinfo-view','route'=>route('admin.contactinfos.index'),'search_status'=>1],
                    ['name'=>'Contactinfo-create','route'=>route('admin.contactinfos.create'),'search_status'=>1],
                    ['name'=>'Contactinfo-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Contactinfo-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('contactinfos');
    }
}
