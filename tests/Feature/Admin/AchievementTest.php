<?php

namespace Tests\Feature\Admin;

use App\Models\Achievement;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class AchievementTest extends TestCase
{

    use FastRefreshDatabase;

    private function achievementCreate()
    {
        return Achievement::factory()->create(['user_id' => $this->customer->id]);
    }

    private function achievementData()
    {
        return Achievement::factory()->make()->toArray();
    }



    public function test_customer_can_update_achievement_texts()
    {
        $data = ['achievement_text' => 'Dummy Text', 'achievement_description' => 'Dummy description'];
        $this->actingAs($this->customer)->post(route('admin.achievements.saveText'), $data);
        $this->assertDatabaseHas('additional_infos', ['value' => 'Dummy Text']);
    }


    public function test_customer_can_visit_achievement_list_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.achievements.index'));

        $response->assertOk();
    }


    public function test_customer_can_visit_achievement_create_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.achievements.create'));

        $response->assertOk();
    }


    public function test_customer_can_store_achievement()
    {
        $achievementData = $this->achievementData();

        $response = $this->actingAs($this->customer)->post(route('admin.achievements.store'), $achievementData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.achievements.index'));
        $this->assertDatabaseHas('achievements', [array_keys($achievementData)[0] => $achievementData[array_keys($achievementData)[0]]]);
    }


    public function test_customer_can_visit_achievement_show_page()
    {
        $achievement = $this->achievementCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.achievements.show', $achievement->id));

        $response->assertOk();
        $response->assertViewHas('achievement', $achievement);
    }


    public function test_customer_can_visit_achievement_edit_page()
    {
        $achievement = $this->achievementCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.achievements.edit', $achievement->id));

        $response->assertOk();
        $response->assertViewHas('achievement', $achievement);
    }


    public function test_customer_can_update_achievement()
    {
        $achievementData = $this->achievementData();
        $achievement = $this->achievementCreate();

        $response = $this->actingAs($this->customer)->put(route('admin.achievements.update', $achievement->id), $achievementData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.achievements.index'));
        $this->assertDatabaseHas('achievements', [array_keys($achievementData)[0] => $achievementData[array_keys($achievementData)[0]]]);
    }


    public function test_customer_can_delete_achievement()
    {
        $achievement = $this->achievementCreate();

        $response = $this->actingAs($this->customer)->delete(route('admin.achievements.destroy', $achievement->id));

        $response->assertOk();
        $this->assertDatabaseMissing('achievements', ['id' => $achievement->id]);
    }


    // No permission admin

    public function test_no_permission_customer_cannot_access_achievement_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.achievements.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_achievement_create_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.achievements.create'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_achievement_edit_page()
    {
        $achievement = $this->achievementCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.achievements.edit', $achievement->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_achievement_show_page()
    {
        $achievement = $this->achievementCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.achievements.show', $achievement->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_store_achievement()
    {
        $achievementData = $this->achievementData();

        $response = $this->actingAs($this->noPermissionAdmin)->post(route('admin.achievements.store'), $achievementData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_update_achievement()
    {
        $achievementData = $this->achievementData();
        $achievement = $this->achievementCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->put(route('admin.achievements.update', $achievement->id), $achievementData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_delete_achievement()
    {
        $achievement = $this->achievementCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->delete(route('admin.achievements.destroy', $achievement->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
