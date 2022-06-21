<?php

namespace Tests\Feature\Message;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageShowTest extends TestCase
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


    public function test_message_cannot_be_visited_unsigned()
    {

       $user = User::factory()->create();
        $this->actingAs($user);

        $message = Message::factory()->create();

        $response = $this->get(route('messages.show', $message));

        $response->assertStatus(403);

    }

    public function test_message_can_be_visited_signed()
    {

       $user = User::factory()->create();
        $this->actingAs($user);

        $message = Message::factory()->create();

        $response = $this->get($message->signed_url);

        $response->assertStatus(200);

    }
}
