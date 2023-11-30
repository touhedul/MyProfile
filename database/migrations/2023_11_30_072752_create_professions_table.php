<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateProfessionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('profession_category_id');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $adminPermissions = [

            [
                'group_name' => 'Profession',
                'permissions' => [
                    // Profession Permissions
                    ['name'=>'Profession-view','route'=>route('admin.professions.index'),'search_status'=>1],
                    ['name'=>'Profession-create','route'=>route('admin.professions.create'),'search_status'=>1],
                    ['name'=>'Profession-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Profession-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('professions');
    }
}
