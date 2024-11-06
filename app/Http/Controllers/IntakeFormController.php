<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntakeFormStartStoreRequest;
use Inertia\Inertia;

class IntakeFormController extends Controller
{
    public function start()
    {
        return Inertia::render('Intake/StartPage', [
            'sessionId' => 'asdfasdfb',
        ]);
    }

    public function startStore(IntakeFormStartStoreRequest $request)
    {
        dd($request);

    }
}
