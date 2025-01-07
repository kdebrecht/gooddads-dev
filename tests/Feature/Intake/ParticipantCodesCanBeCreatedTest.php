<?php

namespace Tests\Feature\Intake;

use App\Models\Participant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ParticipantCodesCanBeCreatedTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected Participant $participant;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->participant = Participant::factory()->create(['user_id' => $this->user->id]);
    }

    public function test_participant_codes_can_be_created(): void
    {
        $response = $this->actingAs($this->user)->post(route('intake.code.generate', $this->participant));
        $response->assertRedirect(route('intake.code.show', $this->participant));

        $code = $this->participant->intakeCode?->code;
        $this->assertNotNull($code);
    }
}
