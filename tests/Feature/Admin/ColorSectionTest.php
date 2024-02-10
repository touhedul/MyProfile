<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ColorSectionTest extends TestCase
{
    use RefreshDatabase;


    public function test_customer_can_color_section_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.colorSectionManagement.index'));

        $response->assertOk();
    }


    public function test_customer_can_save_color_section_management()
    {
        $colorSectionData = [
            'show_status' => 1,
            'show_button_status' => 1,
            'text_1' => 'test',
            'text_2' => 'test',
            'button_text' => 'test',
            'color' => 'test',
        ];
        $response = $this->actingAs($this->customer)->post(route('admin.colorSectionManagement.save'),$colorSectionData);
        $this->assertDatabaseHas('color_sections', [array_keys($colorSectionData)[0] => $colorSectionData[array_keys($colorSectionData)[0]]]);
    }

}
