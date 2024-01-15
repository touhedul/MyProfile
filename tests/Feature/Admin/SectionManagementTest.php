<?php

namespace Tests\Feature\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SectionManagementTest extends TestCase
{
    use RefreshDatabase;


    public function test_customer_can_visit_home_management_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.homeManagement.index'));
        $response->assertStatus(200);
        $response->assertSee('Home Management');
    }

}
