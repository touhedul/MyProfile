<?php

use App\Helpers\AdminHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('image')->nullable();
            $table->string('text_1')->nullable();
            $table->string('text_2')->nullable();
            $table->longText('text_3')->nullable();
            $table->string('count_1')->nullable();
            $table->string('count_text_1')->nullable();
            $table->string('count_2')->nullable();
            $table->string('count_text_2')->nullable();
            $table->string('count_3')->nullable();
            $table->string('count_text_3')->nullable();
            $table->string('button_text')->nullable();
            $table->boolean('button_status')->default(1);
            $table->string('extra_text')->nullable();
            $table->timestamps();
        });

        $customerPermissions = [

            [
                'group_name' => 'About',
                'permissions' => [
                    // Menu Permissions
                    ['name'=>'About-management','route'=>route('admin.aboutManagement.index'),'search_status'=>1],
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
        Schema::dropIfExists('abouts');
    }
};
