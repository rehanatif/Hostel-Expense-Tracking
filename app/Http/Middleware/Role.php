<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use App\Helpers\GourmetGlobalHelper as GGH;

class Role
{
    use HasRoles;

    public function handle($request, Closure $next, ...$roles)
    {
        // Explicitly check authentication using the "admin" guard
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'You must log in to access this page.');
        }

        // Get the authenticated admin user
        $admin = Auth::user();
        

        // Allow access for admins with the default role
        if ($admin->hasRole(GGH::getDefaultRoles()[0])) {
            return $next($request);
        }

        // Check if the admin has any of the required roles
        foreach ($roles as $role) {
            if ($admin->hasRole($role)) {
                return $next($request);
            }
        }

        // Redirect if no roles match
        // return redirect()->route('no_permissions')->with('error', 'You do not have permissions to access this page.');
        return redirect('/un_authrized');
    }
}
