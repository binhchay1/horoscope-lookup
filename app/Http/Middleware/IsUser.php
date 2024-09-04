<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsUser
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {

            $user = Auth::user();
            if (
                $user->role == Role::USER && $user->lock_user == null
                or $user->role == Role::STAFF && $user->lock_user == null
                or $user->role == Role::ADMIN && $user->lock_user == null
            )
            {
                return $next($request);
            }
        }

        return redirect('/403');
    }
}
