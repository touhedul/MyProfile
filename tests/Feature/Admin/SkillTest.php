<?php

namespace Tests\Feature\Admin;

use App\Models\Skill;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class SkillTest extends TestCase
{

    use FastRefreshDatabase;

    private function skillCreate()
    {
        return Skill::factory()->create(['user_id'=>$this->customer->id]);
    }

    private function skillData()
    {
        return Skill::factory()->make()->toArray();
    }


    public function test_customer_can_update_skill_texts()
    {
        $data = ['skill_text' => 'Dummy Text', 'skill_description' => 'Dummy description'];
        $this->actingAs($this->customer)->post(route('admin.skills.saveText'), $data);
        $this->assertDatabaseHas('additional_infos', ['value' => 'Dummy Text']);
    }


    public function test_customer_can_visit_skill_list_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.skills.index'));

        $response->assertOk();
    }


    public function test_customer_can_visit_skill_create_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.skills.create'));

        $response->assertOk();
    }


    public function test_customer_can_store_skill()
    {
        $skillData = $this->skillData();

        $response = $this->actingAs($this->customer)->post(route('admin.skills.store'), $skillData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.skills.index'));
        $this->assertDatabaseHas('skills', [array_keys($skillData)[0] => $skillData[array_keys($skillData)[0]]]);
    }


    public function test_customer_can_visit_skill_show_page()
    {
        $skill = $this->skillCreate();
        $response = $this->actingAs($this->customer)->get(route('admin.skills.show', $skill->id));

        $response->assertOk();
        $response->assertViewHas('skill', $skill);
    }


    public function test_customer_can_visit_skill_edit_page()
    {
        $skill = $this->skillCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.skills.edit', $skill->id));

        $response->assertOk();
        $response->assertViewHas('skill', $skill);
    }


    public function test_customer_can_update_skill()
    {
        $skillData = $this->skillData();
        $skill = $this->skillCreate();

        $response = $this->actingAs($this->customer)->put(route('admin.skills.update', $skill->id), $skillData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.skills.index'));
        $this->assertDatabaseHas('skills', [array_keys($skillData)[0] => $skillData[array_keys($skillData)[0]]]);
    }


    public function test_customer_can_delete_skill()
    {
        $skill = $this->skillCreate();

        $response = $this->actingAs($this->customer)->delete(route('admin.skills.destroy', $skill->id));

        $response->assertOk();
        $this->assertDatabaseMissing('skills', ['id' => $skill->id]);
    }


    // No permission admin

    public function test_no_permission_admin_cannot_access_skill_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.skills.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_access_skill_create_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.skills.create'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_access_skill_edit_page()
    {
        $skill = $this->skillCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.skills.edit', $skill->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_access_skill_show_page()
    {
        $skill = $this->skillCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.skills.show', $skill->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_store_skill()
    {
        $skillData = $this->skillData();

        $response = $this->actingAs($this->noPermissionAdmin)->post(route('admin.skills.store'), $skillData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_update_skill()
    {
        $skillData = $this->skillData();
        $skill = $this->skillCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->put(route('admin.skills.update', $skill->id), $skillData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_delete_skill()
    {
        $skill = $this->skillCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->delete(route('admin.skills.destroy', $skill->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
