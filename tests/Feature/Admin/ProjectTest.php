<?php

namespace Tests\Feature\Admin;

use App\Models\Project;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{

    use FastRefreshDatabase;

    private function projectCreate()
    {
        return Project::factory()->create(['user_id' => $this->customer->id]);
    }

    private function projectData()
    {
        return Project::factory()->make()->toArray();
    }




    public function test_customer_can_update_project_texts()
    {
        $data = ['project_text' => 'Dummy Text', 'project_description' => 'Dummy description'];
        $this->actingAs($this->customer)->post(route('admin.projects.saveText'), $data);
        $this->assertDatabaseHas('additional_infos', ['value' => 'Dummy Text']);
    }



    public function test_customer_can_visit_project_list_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.projects.index'));

        $response->assertOk();
    }


    public function test_customer_can_visit_project_create_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.projects.create'));

        $response->assertOk();
    }


    public function test_customer_can_store_project()
    {
        $projectData = $this->projectData();

        $response = $this->actingAs($this->customer)->post(route('admin.projects.store'), $projectData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.projects.index'));
        $this->assertDatabaseHas('projects', [array_keys($projectData)[0] => $projectData[array_keys($projectData)[0]]]);
    }


    public function test_customer_can_visit_project_show_page()
    {
        $project = $this->projectCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.projects.show', $project->id));

        $response->assertOk();
        $response->assertViewHas('project', $project);
    }


    public function test_customer_can_visit_project_edit_page()
    {
        $project = $this->projectCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.projects.edit', $project->id));

        $response->assertOk();
        $response->assertViewHas('project', $project);
    }


    public function test_customer_can_update_project()
    {
        $projectData = $this->projectData();
        $project = $this->projectCreate();

        $response = $this->actingAs($this->customer)->put(route('admin.projects.update', $project->id), $projectData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.projects.index'));
        $this->assertDatabaseHas('projects', [array_keys($projectData)[0] => $projectData[array_keys($projectData)[0]]]);
    }


    public function test_customer_can_delete_project()
    {
        $project = $this->projectCreate();

        $response = $this->actingAs($this->customer)->delete(route('admin.projects.destroy', $project->id));

        $response->assertOk();
        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }


    // No permission admin

    public function test_no_permission_customer_cannot_access_project_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.projects.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_project_create_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.projects.create'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_project_edit_page()
    {
        $project = $this->projectCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.projects.edit', $project->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_project_show_page()
    {
        $project = $this->projectCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.projects.show', $project->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_store_project()
    {
        $projectData = $this->projectData();

        $response = $this->actingAs($this->noPermissionAdmin)->post(route('admin.projects.store'), $projectData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_update_project()
    {
        $projectData = $this->projectData();
        $project = $this->projectCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->put(route('admin.projects.update', $project->id), $projectData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_delete_project()
    {
        $project = $this->projectCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->delete(route('admin.projects.destroy', $project->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
