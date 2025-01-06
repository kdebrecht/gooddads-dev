<?php

namespace Tests\Feature\Intake;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SignupControllerTest extends TestCase
{



    /**
     * A basic feature test example.
     */
    public function test_it_stores_signup_form(): void
    {


        $response = $this->post('/');

        $response->assertStatus(200);
    }
}
