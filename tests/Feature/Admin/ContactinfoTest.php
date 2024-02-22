<?php

namespace Tests\Feature\Admin;

use App\Models\Contactinfo;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class ContactinfoTest extends TestCase
{

    use FastRefreshDatabase;

    private function contactinfoCreate()
    {
        return Contactinfo::factory()->create(['user_id' => $this->customer->id]);
    }

    private function contactinfoData()
    {
        return Contactinfo::factory()->make()->toArray();
    }




    public function test_customer_can_update_contactinfo_texts()
    {
        $data = ['contactinfo_text' => 'Dummy Text', 'contactinfo_description' => 'Dummy description'];
        $this->actingAs($this->customer)->post(route('admin.contactinfos.saveText'), $data);
        $this->assertDatabaseHas('additional_infos', ['value' => 'Dummy Text']);
    }


    public function test_customer_can_visit_contactinfo_list_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.contactinfos.index'));

        $response->assertOk();
    }


    public function test_customer_can_visit_contactinfo_create_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.contactinfos.create'));

        $response->assertOk();
    }


    public function test_customer_can_store_contactinfo()
    {
        $contactinfoData = $this->contactinfoData();

        $response = $this->actingAs($this->customer)->post(route('admin.contactinfos.store'), $contactinfoData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.contactinfos.index'));
        $this->assertDatabaseHas('contactinfos', [array_keys($contactinfoData)[0] => $contactinfoData[array_keys($contactinfoData)[0]]]);
    }


    public function test_customer_can_visit_contactinfo_show_page()
    {
        $contactinfo = $this->contactinfoCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.contactinfos.show', $contactinfo->id));

        $response->assertOk();
        $response->assertViewHas('contactinfo', $contactinfo);
    }


    public function test_customer_can_visit_contactinfo_edit_page()
    {
        $contactinfo = $this->contactinfoCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.contactinfos.edit', $contactinfo->id));

        $response->assertOk();
        $response->assertViewHas('contactinfo', $contactinfo);
    }


    public function test_customer_can_update_contactinfo()
    {
        $contactinfoData = $this->contactinfoData();
        $contactinfo = $this->contactinfoCreate();

        $response = $this->actingAs($this->customer)->put(route('admin.contactinfos.update', $contactinfo->id), $contactinfoData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.contactinfos.index'));
        $this->assertDatabaseHas('contactinfos', [array_keys($contactinfoData)[0] => $contactinfoData[array_keys($contactinfoData)[0]]]);
    }


    public function test_customer_can_delete_contactinfo()
    {
        $contactinfo = $this->contactinfoCreate();

        $response = $this->actingAs($this->customer)->delete(route('admin.contactinfos.destroy', $contactinfo->id));

        $response->assertOk();
        $this->assertDatabaseMissing('contactinfos', ['id' => $contactinfo->id]);
    }


    // No permission admin

    public function test_no_permission_customer_cannot_access_contactinfo_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.contactinfos.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_contactinfo_create_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.contactinfos.create'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_contactinfo_edit_page()
    {
        $contactinfo = $this->contactinfoCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.contactinfos.edit', $contactinfo->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_contactinfo_show_page()
    {
        $contactinfo = $this->contactinfoCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.contactinfos.show', $contactinfo->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_store_contactinfo()
    {
        $contactinfoData = $this->contactinfoData();

        $response = $this->actingAs($this->noPermissionAdmin)->post(route('admin.contactinfos.store'), $contactinfoData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_update_contactinfo()
    {
        $contactinfoData = $this->contactinfoData();
        $contactinfo = $this->contactinfoCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->put(route('admin.contactinfos.update', $contactinfo->id), $contactinfoData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_delete_contactinfo()
    {
        $contactinfo = $this->contactinfoCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->delete(route('admin.contactinfos.destroy', $contactinfo->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
