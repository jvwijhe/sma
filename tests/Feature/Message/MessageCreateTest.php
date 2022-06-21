<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_new_message_can_be_created()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        

        $response = $this->post('/messages', [
            'name' => 'testmessage',
            'slug' =>  'dfasdjfgajfgasdjkdsadfjaksdfgjaksldf',
            'contacts' => [],
            'message' => 'this should be encrypted',
            'password' => 'apassworddd',
        ]);

        $response->assertRedirect(route('messages.index'));
    }

    public function test_new_message_cannot_be_created_with_invalid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        

        $response = $this->post('/messages', [
            'name' => 'testmessage',
            // 'slug' =>  'dfasdjfgajfgasdjkdsadfjaksdfgjaksldf',
            // 'contacts' => [],
            'message' => 'this should be encrypted',
            // 'password' => 'apassworddd',
        ]);

        $response->assertStatus(302);
    }

}
