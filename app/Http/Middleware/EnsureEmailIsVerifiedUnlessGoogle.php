<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureEmailIsVerifiedUnlessGoogle
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (
            $user &&
            $user->provider !== 'google' &&
            $user->role !== 'admin' &&
            !$user->hasVerifiedEmail()
        ) {
            return redirect()->route('verification.notice');
        }

        return $next($request);
    }
}
