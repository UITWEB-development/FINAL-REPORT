<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $user_type): Response
    {
        if (!Auth::check()) {
            return redirect('/'.$user_type.'/sign-in');
        }

        $userTypeRole = Role::where('name', $user_type)->first();
        
        if (Auth::user()->role_id !== (int)$userTypeRole->id) {
            abort(403);
        }

        return $next($request);
    }
}
