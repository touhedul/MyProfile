<?php

namespace Tests\Feature\Admin;

use App\Models\Experience;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class ExperienceTest extends TestCase
{

    use FastRefreshDatabase;

    private function experienceCreate()
    {
        return Experience::factory()->create(['user_id'=>$this->customer->id]);
    }

    private function experienceData()
    {
        return Experience::factory()->make()->toArray();
    }



    public function test_customer_can_update_experience_texts()
    {
        $data = ['experience_text' => 'Dummy Text', 'experience_description' => 'Dummy description'];
        $this->actingAs($this->customer)->post(route('admin.experiences.saveText'), $data);
        $this->assertDatabaseHas('additional_infos', ['value' => 'Dummy Text']);
    }



    public function test_customer_can_visit_experience_list_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.experiences.index'));

        $response->assertOk();
    }


     public function test_customer_can_visit_experience_create_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.experiences.create'));

        $response->assertOk();
    }


    public function test_customer_can_store_experience()
    {
        $experienceData = $this->experienceData();

        $response = $this->actingAs($this->customer)->post(route('admin.experiences.store'),$experienceData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.experiences.index'));
        $this->assertDatabaseHas('experiences', [array_keys($experienceData)[0] => $experienceData[array_keys($experienceData)[0]]]);
    }


    public function test_customer_can_visit_experience_show_page()
    {
        $experience = $this->experienceCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.experiences.show',$experience->id));

        $response->assertOk();
        $response->assertViewHas('experience', $experience);
    }


    public function test_customer_can_visit_experience_edit_page()
    {
        $experience = $this->experienceCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.experiences.edit',$experience->id));

        $response->assertOk();
        $response->assertViewHas('experience', $experience);
    }


    public function test_customer_can_update_experience()
    {
        $experienceData = $this->experienceData();
        $experience = $this->experienceCreate();

        $response = $this->actingAs($this->customer)->put(route('admin.experiences.update',$experience->id),$experienceData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.experiences.index'));
        $this->assertDatabaseHas('experiences', [array_keys($experienceData)[0] => $experienceData[array_keys($experienceData)[0]]]);
    }


    public function test_customer_can_delete_experience()
    {
        $experience = $this->experienceCreate();

        $response = $this->actingAs($this->customer)->delete(route('admin.experiences.destroy',$experience->id));

        $response->assertOk();
        $this->assertDatabaseMissing('experiences',['id'=>$experience->id]);
    }


 // No permission admin

    public function test_no_permission_customer_cannot_access_experience_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.experiences.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_experience_create_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.experiences.create'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_experience_edit_page()
    {
        $experience = $this->experienceCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.experiences.edit',$experience->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_experience_show_page()
    {
        $experience = $this->experienceCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.experiences.show',$experience->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_store_experience()
    {
        $experienceData = $this->experienceData();

        $response = $this->actingAs($this->noPermissionAdmin)->post(route('admin.experiences.store'),$experienceData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_update_experience()
    {
        $experienceData = $this->experienceData();
        $experience = $this->experienceCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->put(route('admin.experiences.update',$experience->id),$experienceData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_delete_experience()
    {
        $experience = $this->experienceCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->delete(route('admin.experiences.destroy',$experience->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


}
