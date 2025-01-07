<?php

namespace App\Http\Controllers\Intake;

use App\Http\Requests\Intake\SignupStoreRequest;
use App\Http\Requests\Intake\SignupUpdateRequest;
use App\Http\Resources\Intake\SignupFormResource;
use App\Models\ParticipantSignupForm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class SignupController extends IntakeFormController
{
    public function index(Request $request): Response
    {
        return $this->create($request);
    }

    public function create(Request $request): Response
    {
        return Inertia::render('Intake/Signup/Index', [
            ...$this->currentParticipantWithCode(),
            'form' => SignupFormResource::make(new ParticipantSignupForm()),
        ]);
    }

    public function store(SignupStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $signupForm = ParticipantSignupForm::create($validated);

        return Redirect::route('intake.signup.show', $signupForm);
    }

    public function show(Request $request, ParticipantSignupForm $signup): Response
    {
        return Inertia::render('Intake/Signup/Show', [
            ...$this->currentParticipantWithCode(),
            'form' => SignupFormResource::make($signup),
        ]);
    }

    public function edit(Request $request, ParticipantSignupForm $signup): Response
    {
        return Inertia::render('Intake/Signup/Edit', [
            ...$this->currentParticipantWithCode(),
            'form' => SignupFormResource::make($signup),
        ]);
    }

    public function update(SignupUpdateRequest $request, ParticipantSignupForm $signup): RedirectResponse
    {
        $validated = $request->validated();
        unset($validated['participant_id']);

        $signup->update($validated);

        return Redirect::route('intake.signup.show', $signup);
    }

    public function destroy(Request $request): RedirectResponse
    {
        abort(404);
    }
}
