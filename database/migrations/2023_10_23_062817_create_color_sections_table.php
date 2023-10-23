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
        Schema::create('color_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('text_1')->nullable();
            $table->string('text_2')->nullable();
            $table->string('color')->nullable();
            $table->string('button_text')->nullable();
            $table->boolean('show_status')->default(1);
            $table->boolean('show_button_status')->default(1);
            $table->timestamps();
        });

        $customerPermissions = [

            [
                'group_name' => 'Color Section',
                'permissions' => [
                    // Menu Permissions
                    ['name'=>'Color-section-management','route'=>route('admin.colorSectionManagement.index'),'search_status'=>1],
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
        Schema::dropIfExists('color_sections');
    }
};
