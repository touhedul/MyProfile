<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SkillTest extends TestCase
{
    use RefreshDatabase;


    public function test_customer_can_visit_skill_list_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.skills.index'));
        $response->assertStatus(200);
        $response->assertSee('Skills');
    }


    public function test_customer_can_update_skill_texts()
    {
        $data = ['skill_text' => 'Dummy Text','skill_description' => 'Dummy description'];
        $this->actingAs($this->customer)->post(route('admin.skills.saveText'),$data);
        $this->assertDatabaseHas('additional_infos', ['value' => 'Dummy Text']);
    }
}
