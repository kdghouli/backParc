<?php
// app/Http/Middleware/GetUserFromHeaders.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class GetUserFromHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        // Si l'utilisateur n'est pas déjà authentifié
        if (!$request->user() && $request->header('X-User-ID')) {
            $user = User::find($request->header('X-User-ID'));

            if ($user) {
                // Vous pouvez authentifier l'utilisateur si nécessaire
                auth()->setUser($user);
            }
        }

        return $next($request);
    }
}
