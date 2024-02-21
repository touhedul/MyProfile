<?php

namespace Tests\Feature\Admin;

use App\Models\Education;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class EducationTest extends TestCase
{

    use FastRefreshDatabase;

    private function educationCreate()
    {
        return Education::factory()->create(['user_id'=>$this->customer->id]);
    }

    private function educationData()
    {
        return Education::factory()->make()->toArray();
    }



    public function test_customer_can_update_education_texts()
    {
        $data = ['education_text' => 'Dummy Text', 'education_description' => 'Dummy description'];
        $this->actingAs($this->customer)->post(route('admin.education.saveText'), $data);
        $this->assertDatabaseHas('additional_infos', ['value' => 'Dummy Text']);
    }


    public function test_customer_can_visit_education_list_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.education.index'));

        $response->assertOk();
    }


     public function test_customer_can_visit_education_create_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.education.create'));

        $response->assertOk();
    }


    public function test_customer_can_store_education()
    {
        $educationData = $this->educationData();

        $response = $this->actingAs($this->customer)->post(route('admin.education.store'),$educationData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.education.index'));
        $this->assertDatabaseHas('education', [array_keys($educationData)[0] => $educationData[array_keys($educationData)[0]]]);
    }


    public function test_customer_can_visit_education_show_page()
    {
        $education = $this->educationCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.education.show',$education->id));

        $response->assertOk();
        $response->assertViewHas('education', $education);
    }


    public function test_customer_can_visit_education_edit_page()
    {
        $education = $this->educationCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.education.edit',$education->id));

        $response->assertOk();
        $response->assertViewHas('education', $education);
    }


    public function test_customer_can_update_education()
    {
        $educationData = $this->educationData();
        $education = $this->educationCreate();

        $response = $this->actingAs($this->customer)->put(route('admin.education.update',$education->id),$educationData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.education.index'));
        $this->assertDatabaseHas('education', [array_keys($educationData)[0] => $educationData[array_keys($educationData)[0]]]);
    }


    public function test_customer_can_delete_education()
    {
        $education = $this->educationCreate();

        $response = $this->actingAs($this->customer)->delete(route('admin.education.destroy',$education->id));

        $response->assertOk();
        $this->assertDatabaseMissing('education',['id'=>$education->id]);
    }


 // No permission admin

    public function test_no_permission_customer_cannot_access_education_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.education.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_education_create_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.education.create'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_education_edit_page()
    {
        $education = $this->educationCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.education.edit',$education->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_education_show_page()
    {
        $education = $this->educationCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.education.show',$education->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_store_education()
    {
        $educationData = $this->educationData();

        $response = $this->actingAs($this->noPermissionAdmin)->post(route('admin.education.store'),$educationData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_update_education()
    {
        $educationData = $this->educationData();
        $education = $this->educationCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->put(route('admin.education.update',$education->id),$educationData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_delete_education()
    {
        $education = $this->educationCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->delete(route('admin.education.destroy',$education->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


}
