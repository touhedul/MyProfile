<?php

namespace Tests\Feature\Admin;

use App\Models\Course;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class CourseTest extends TestCase
{

    use FastRefreshDatabase;

    private function courseCreate()
    {
        return Course::factory()->create(['user_id'=>$this->customer->id]);
    }

    private function courseData()
    {
        return Course::factory()->make()->toArray();
    }



    public function test_customer_can_update_course_texts()
    {
        $data = ['course_text' => 'Dummy Text', 'course_description' => 'Dummy description'];
        $this->actingAs($this->customer)->post(route('admin.courses.saveText'), $data);
        $this->assertDatabaseHas('additional_infos', ['value' => 'Dummy Text']);
    }



    public function test_customer_can_visit_course_list_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.courses.index'));

        $response->assertOk();
    }


     public function test_customer_can_visit_course_create_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.courses.create'));

        $response->assertOk();
    }


    public function test_customer_can_store_course()
    {
        $courseData = $this->courseData();

        $response = $this->actingAs($this->customer)->post(route('admin.courses.store'),$courseData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.courses.index'));
        $this->assertDatabaseHas('courses', [array_keys($courseData)[0] => $courseData[array_keys($courseData)[0]]]);
    }


    public function test_customer_can_visit_course_show_page()
    {
        $course = $this->courseCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.courses.show',$course->id));

        $response->assertOk();
        $response->assertViewHas('course', $course);
    }


    public function test_customer_can_visit_course_edit_page()
    {
        $course = $this->courseCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.courses.edit',$course->id));

        $response->assertOk();
        $response->assertViewHas('course', $course);
    }


    public function test_customer_can_update_course()
    {
        $courseData = $this->courseData();
        $course = $this->courseCreate();

        $response = $this->actingAs($this->customer)->put(route('admin.courses.update',$course->id),$courseData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.courses.index'));
        $this->assertDatabaseHas('courses', [array_keys($courseData)[0] => $courseData[array_keys($courseData)[0]]]);
    }


    public function test_customer_can_delete_course()
    {
        $course = $this->courseCreate();

        $response = $this->actingAs($this->customer)->delete(route('admin.courses.destroy',$course->id));

        $response->assertOk();
        $this->assertDatabaseMissing('courses',['id'=>$course->id]);
    }


 // No permission admin

    public function test_no_permission_customer_cannot_access_course_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.courses.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_course_create_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.courses.create'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_course_edit_page()
    {
        $course = $this->courseCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.courses.edit',$course->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_course_show_page()
    {
        $course = $this->courseCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.courses.show',$course->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_store_course()
    {
        $courseData = $this->courseData();

        $response = $this->actingAs($this->noPermissionAdmin)->post(route('admin.courses.store'),$courseData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_update_course()
    {
        $courseData = $this->courseData();
        $course = $this->courseCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->put(route('admin.courses.update',$course->id),$courseData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_delete_course()
    {
        $course = $this->courseCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->delete(route('admin.courses.destroy',$course->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


}
