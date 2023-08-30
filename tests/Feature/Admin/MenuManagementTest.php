<?php

namespace Tests\Feature\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MenuManagementTest extends TestCase
{
    use RefreshDatabase;


    public function test_customer_can_visit_menu_management_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.menuManagement.index'));
        $response->assertStatus(200);
        $response->assertSee('Menu Management');
    }
    
    public function test_customer_can_update_menu()
    {
        $data = ['user_menu_ids'=>[1,2],'menu_titles'=>['a','b']];
        $response = $this->actingAs($this->customer)->post(route('admin.menuManagement.save',$data));
        $this->assertDatabaseHas('user_menus', ['menu_title' => 'a']);
    }
}
