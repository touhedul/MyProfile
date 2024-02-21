<?php

namespace Tests\Feature\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class TestimonialTest extends TestCase
{

    use FastRefreshDatabase;

    private function testimonialCreate()
    {
        return Testimonial::factory()->create(['user_id'=>$this->customer->id]);
    }

    private function testimonialData()
    {
        return Testimonial::factory()->make()->toArray();
    }



    public function test_customer_can_update_testimonial_texts()
    {
        $data = ['testimonial_text' => 'Dummy Text', 'testimonial_description' => 'Dummy description'];
        $this->actingAs($this->customer)->post(route('admin.testimonials.saveText'), $data);
        $this->assertDatabaseHas('additional_infos', ['value' => 'Dummy Text']);
    }


    public function test_customer_can_visit_testimonial_list_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.testimonials.index'));

        $response->assertOk();
    }


     public function test_customer_can_visit_testimonial_create_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.testimonials.create'));

        $response->assertOk();
    }


    public function test_customer_can_store_testimonial()
    {
        $testimonialData = $this->testimonialData();

        $response = $this->actingAs($this->customer)->post(route('admin.testimonials.store'),$testimonialData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.testimonials.index'));
        $this->assertDatabaseHas('testimonials', [array_keys($testimonialData)[0] => $testimonialData[array_keys($testimonialData)[0]]]);
    }


    public function test_customer_can_visit_testimonial_show_page()
    {
        $testimonial = $this->testimonialCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.testimonials.show',$testimonial->id));

        $response->assertOk();
        $response->assertViewHas('testimonial', $testimonial);
    }


    public function test_customer_can_visit_testimonial_edit_page()
    {
        $testimonial = $this->testimonialCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.testimonials.edit',$testimonial->id));

        $response->assertOk();
        $response->assertViewHas('testimonial', $testimonial);
    }


    public function test_customer_can_update_testimonial()
    {
        $testimonialData = $this->testimonialData();
        $testimonial = $this->testimonialCreate();

        $response = $this->actingAs($this->customer)->put(route('admin.testimonials.update',$testimonial->id),$testimonialData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.testimonials.index'));
        $this->assertDatabaseHas('testimonials', [array_keys($testimonialData)[0] => $testimonialData[array_keys($testimonialData)[0]]]);
    }


    public function test_customer_can_delete_testimonial()
    {
        $testimonial = $this->testimonialCreate();

        $response = $this->actingAs($this->customer)->delete(route('admin.testimonials.destroy',$testimonial->id));

        $response->assertOk();
        $this->assertDatabaseMissing('testimonials',['id'=>$testimonial->id]);
    }


 // No permission admin

    public function test_no_permission_customer_cannot_access_testimonial_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.testimonials.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_testimonial_create_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.testimonials.create'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_testimonial_edit_page()
    {
        $testimonial = $this->testimonialCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.testimonials.edit',$testimonial->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_testimonial_show_page()
    {
        $testimonial = $this->testimonialCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.testimonials.show',$testimonial->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_store_testimonial()
    {
        $testimonialData = $this->testimonialData();

        $response = $this->actingAs($this->noPermissionAdmin)->post(route('admin.testimonials.store'),$testimonialData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_update_testimonial()
    {
        $testimonialData = $this->testimonialData();
        $testimonial = $this->testimonialCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->put(route('admin.testimonials.update',$testimonial->id),$testimonialData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_delete_testimonial()
    {
        $testimonial = $this->testimonialCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->delete(route('admin.testimonials.destroy',$testimonial->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


}
