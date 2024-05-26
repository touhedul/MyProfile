<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateCustomDomainsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_domains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('domain');
            $table->boolean('status')->default(1);
            $table->boolean('is_sub_domain')->default(1);
            $table->timestamps();
        });

        $adminPermissions = [

            [
                'group_name' => 'CustomDomain',
                'permissions' => [
                    // CustomDomain Permissions
                    ['name' => 'CustomDomain-view', 'route' => route('admin.customDomains.index'), 'search_status' => 1],
                    ['name' => 'CustomDomain-create', 'route' => route('admin.customDomains.create'), 'search_status' => 1],
                    ['name' => 'CustomDomain-update', 'route' => NULL, 'search_status' => 0],
                    ['name' => 'CustomDomain-delete', 'route' => NULL, 'search_status' => 0],
                ]
            ],
        ];

        (new AdminHelper())->addPermission("admin", $adminPermissions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('custom_domains');
    }
}
