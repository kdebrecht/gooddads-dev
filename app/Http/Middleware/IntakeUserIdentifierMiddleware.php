<?php

namespace App\Http\Middleware;

use App\Enums\SessionKeys;
use App\Models\Participant;
use App\Models\ParticipantIntakeCode;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Context;
use Symfony\Component\HttpFoundation\Response;

class IntakeUserIdentifierMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $participantCode = $request->session()->get(SessionKeys::IntakeCode->value);

        if ($participantCode) {
            $participant = ParticipantIntakeCode::firstWhere('code', $participantCode)?->participant;
            Context::add('participantCode', $participantCode);
            Context::add('participant', $participant);
        }

        return $next($request);
    }
}
