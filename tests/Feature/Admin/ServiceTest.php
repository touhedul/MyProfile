<?php

namespace Tests\Feature\Admin;

use App\Models\Service;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class ServiceTest extends TestCase
{

    use FastRefreshDatabase;

    private function serviceCreate()
    {
        return Service::factory()->create(['user_id'=>$this->customer->id]);
    }

    private function serviceData()
    {
        return Service::factory()->make()->toArray();
    }


    public function test_customer_can_update_service_texts()
    {
        $data = ['service_text' => 'Dummy Text', 'service_description' => 'Dummy description'];
        $this->actingAs($this->customer)->post(route('admin.services.saveText'), $data);
        $this->assertDatabaseHas('additional_infos', ['value' => 'Dummy Text']);
    }



    public function test_customer_can_visit_service_list_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.services.index'));

        $response->assertOk();
    }


     public function test_customer_can_visit_service_create_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.services.create'));

        $response->assertOk();
    }


    public function test_customer_can_store_service()
    {
        $serviceData = $this->serviceData();

        $response = $this->actingAs($this->customer)->post(route('admin.services.store'),$serviceData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.services.index'));
        $this->assertDatabaseHas('services', [array_keys($serviceData)[0] => $serviceData[array_keys($serviceData)[0]]]);
    }


    public function test_customer_can_visit_service_show_page()
    {
        $service = $this->serviceCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.services.show',$service->id));

        $response->assertOk();
        $response->assertViewHas('service', $service);
    }


    public function test_customer_can_visit_service_edit_page()
    {
        $service = $this->serviceCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.services.edit',$service->id));

        $response->assertOk();
        $response->assertViewHas('service', $service);
    }


    public function test_customer_can_update_service()
    {
        $serviceData = $this->serviceData();
        $service = $this->serviceCreate();

        $response = $this->actingAs($this->customer)->put(route('admin.services.update',$service->id),$serviceData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.services.index'));
        $this->assertDatabaseHas('services', [array_keys($serviceData)[0] => $serviceData[array_keys($serviceData)[0]]]);
    }


    public function test_customer_can_delete_service()
    {
        $service = $this->serviceCreate();

        $response = $this->actingAs($this->customer)->delete(route('admin.services.destroy',$service->id));

        $response->assertOk();
        $this->assertDatabaseMissing('services',['id'=>$service->id]);
    }


 // No permission admin

    public function test_no_permission_customer_cannot_access_service_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.services.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_service_create_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.services.create'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_service_edit_page()
    {
        $service = $this->serviceCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.services.edit',$service->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_service_show_page()
    {
        $service = $this->serviceCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.services.show',$service->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_store_service()
    {
        $serviceData = $this->serviceData();

        $response = $this->actingAs($this->noPermissionAdmin)->post(route('admin.services.store'),$serviceData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_update_service()
    {
        $serviceData = $this->serviceData();
        $service = $this->serviceCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->put(route('admin.services.update',$service->id),$serviceData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_delete_service()
    {
        $service = $this->serviceCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->delete(route('admin.services.destroy',$service->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


}
