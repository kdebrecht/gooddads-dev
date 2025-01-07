<?php

namespace Tests\Feature\Intake;

use App\Enums\SessionKeys;
use App\Models\Participant;
use App\Models\ParticipantSignupForm;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SignupControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected Participant $participant;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->participant = Participant::factory()->create(['user_id' => $this->user->id]);
        $this->participant->intakeCode()->create();
    }

    public function formData(): array
    {
        return [
            'participant_id' => $this->participant->id,
            'client_name' => 'John Doe',
            'date' => now()->format('m/d/Y'),
            'address' => '123 Main St',
            'home_cell_phone' => '123-456-7890',
            'work_phone' => '987-654-3210',
            'other_number' => '555-555-5555',
            'email_address' => '0XoUe@example.com',
            'probation_parole_case_worker_name' => 'Jane Doe',
            'probation_parole_case_worker_phone' => '987-654-3210',
            'children_info' => [
                [
                    'name' => 'Child 1',
                    'dob' => '2022-01-01',
                    'age' => 5,
                    'contact' => true,
                    'visitation' => true,
                    'phone_contact' => true,
                    'custody' => true,
                ],
            ],
            'contact_with_children' => true,
            'custody' => true,
            'visitation' => true,
            'phone_contact' => true,
            'monthly_child_support_payment' => 1000,
            'marital_status' => 'Single',
            'ethnicity' => 'Hispanic or Latino',

        ];
    }

    /**
     * A basic feature test example.
     */
    public function test_it_stores_signup_form(): void
    {
        $signupData = $this->formData();

        $session = [SessionKeys::IntakeCode->value => $this->participant->intakeCode?->code];
        $response = $this->actingAs($this->user)->withSession($session)->post(route('intake.signup.store'), $signupData);

        $signupForm = ParticipantSignupForm::firstWhere('participant_id', $this->participant->id);
        $this->assertNotNull($signupForm);

        $response->assertRedirect(route('intake.signup.show', [$signupForm->id]));

        // Test the update method
        $updateData = $this->formData();
        $updateData['marital_status'] = 'Married';
        $updateResponse = $this->actingAs($this->user)->withSession($session)->patch(route('intake.signup.update', [$signupForm->id]), $updateData);
        $updateResponse->assertRedirect(route('intake.signup.show', [$signupForm->id]));

        // ensure the marital status was updated
        $signupForm->refresh();
        $this->assertEquals('Married', $signupForm->marital_status);
    }

}
