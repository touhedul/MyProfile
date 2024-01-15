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
        Schema::create('homes',function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('slider_1')->nullable();
            $table->string('slider_2')->nullable();
            $table->string('slider_3')->nullable();
            $table->string('default_slider_1')->nullable();
            $table->string('default_slider_2')->nullable();
            $table->string('default_slider_3')->nullable();
            $table->boolean('slider_1_status')->default(1);
            $table->boolean('slider_2_status')->default(1);
            $table->boolean('slider_3_status')->default(1);
            $table->string('text_1')->nullable();
            $table->json('text_2')->nullable();
            $table->string('text_3')->nullable();
            $table->string('button_text')->nullable();
            $table->string('file')->nullable();
            $table->boolean('button_status')->default(1);
            $table->timestamps();
        });

        $customerPermissions = [

            [
                'group_name' => 'Home',
                'permissions' => [
                    // Menu Permissions
                    ['name'=>'Home-management','route'=>route('admin.homeManagement.index'),'search_status'=>1],
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
        Schema::dropIfExists('homes');
    }
};
