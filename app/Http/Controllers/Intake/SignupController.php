<?php

namespace App\Http\Controllers\Intake;

use App\Http\Controllers\Controller;
use App\Http\Requests\Intake\SignupStoreRequest;
use App\Http\Requests\Intake\SignupUpdateRequest;
use App\Http\Resources\Intake\SignupFormResource;
use App\Models\ParticipantSignupForm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
            ...$this->currentParticipant(),
            'form' => SignupFormResource::make(new ParticipantSignupForm()),
        ]);
    }


    public function store(SignupStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $signupForm = ParticipantSignupForm::create($validated);

        // todo, are we automatically redirecting to the next form?
        return redirect()->route('intake.signup.');
    }

    public function edit(Request $request, ParticipantSignupForm $signupForm): Response
    {
        return Inertia::render('Intake/Signup/Edit', [
            ...$this->currentParticipant(),
            'form' => SignupFormResource::make($signupForm),
        ]);
    }

    public function update(SignupUpdateRequest $request): Response
    {
        return Inertia::render('Intake/Signup', [
            ...$this->currentParticipant(),
        ]);
    }

    public function destroy(Request $request): RedirectResponse
    {
        abort(404);
    }
}
