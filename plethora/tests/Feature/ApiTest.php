<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->post('/api/v1/admin/approveOrDecline', ["ref_id" => 1, "user_id" => 3, "status" => 1]);

        $response->assertStatus(200);
    }
}
