<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateTestimonialsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('designation')->nullable();
            $table->text('message');
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $customerPermissions = [

            [
                'group_name' => 'Testimonial',
                'permissions' => [
                    // Testimonial Permissions
                    ['name'=>'Testimonial-view','route'=>route('admin.testimonials.index'),'search_status'=>1],
                    ['name'=>'Testimonial-create','route'=>route('admin.testimonials.create'),'search_status'=>1],
                    ['name'=>'Testimonial-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Testimonial-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('testimonials');
    }
}
