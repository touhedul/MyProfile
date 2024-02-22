<?php

namespace Tests\Feature\Admin;

use App\Models\Social;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class SocialTest extends TestCase
{

    use FastRefreshDatabase;

    private function socialCreate()
    {
        return Social::factory()->create(['user_id'=>$this->customer->id]);
    }

    private function socialData()
    {
        return Social::factory()->make()->toArray();
    }


    public function test_customer_can_update_footer_texts()
    {
        $data = ['footer_text' => 'Dummy Text'];
        $this->actingAs($this->customer)->post(route('admin.socials.saveText'), $data);
        $this->assertDatabaseHas('additional_infos', ['value' => 'Dummy Text']);
    }



    public function test_customer_can_visit_social_list_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.socials.index'));

        $response->assertOk();
    }


     public function test_customer_can_visit_social_create_page()
    {
        $response = $this->actingAs($this->customer)->get(route('admin.socials.create'));

        $response->assertOk();
    }


    public function test_customer_can_store_social()
    {
        $socialData = $this->socialData();

        $response = $this->actingAs($this->customer)->post(route('admin.socials.store'),$socialData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.socials.index'));
        $this->assertDatabaseHas('socials', [array_keys($socialData)[0] => $socialData[array_keys($socialData)[0]]]);
    }


    public function test_customer_can_visit_social_show_page()
    {
        $social = $this->socialCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.socials.show',$social->id));

        $response->assertOk();
        $response->assertViewHas('social', $social);
    }


    public function test_customer_can_visit_social_edit_page()
    {
        $social = $this->socialCreate();

        $response = $this->actingAs($this->customer)->get(route('admin.socials.edit',$social->id));

        $response->assertOk();
        $response->assertViewHas('social', $social);
    }


    public function test_customer_can_update_social()
    {
        $socialData = $this->socialData();
        $social = $this->socialCreate();

        $response = $this->actingAs($this->customer)->put(route('admin.socials.update',$social->id),$socialData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.socials.index'));
        $this->assertDatabaseHas('socials', [array_keys($socialData)[0] => $socialData[array_keys($socialData)[0]]]);
    }


    public function test_customer_can_delete_social()
    {
        $social = $this->socialCreate();

        $response = $this->actingAs($this->customer)->delete(route('admin.socials.destroy',$social->id));

        $response->assertOk();
        $this->assertDatabaseMissing('socials',['id'=>$social->id]);
    }


 // No permission admin

    public function test_no_permission_customer_cannot_access_social_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.socials.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_social_create_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.socials.create'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_social_edit_page()
    {
        $social = $this->socialCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.socials.edit',$social->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_access_social_show_page()
    {
        $social = $this->socialCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.socials.show',$social->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_store_social()
    {
        $socialData = $this->socialData();

        $response = $this->actingAs($this->noPermissionAdmin)->post(route('admin.socials.store'),$socialData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_update_social()
    {
        $socialData = $this->socialData();
        $social = $this->socialCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->put(route('admin.socials.update',$social->id),$socialData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_customer_cannot_delete_social()
    {
        $social = $this->socialCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->delete(route('admin.socials.destroy',$social->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


}
