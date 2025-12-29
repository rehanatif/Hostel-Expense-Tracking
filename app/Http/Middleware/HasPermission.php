<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasPermissions;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$permissions)
    {

        foreach ($permissions as $permission) {

            $permission = explode('|', $permission);

            if (!$request->user()->hasRole('Admin') && !$request->user()->hasAnyPermission($permission))
            {
                if ($request->ajax())
                {
                    return response()->json(['status'=>false,'message'=>__('permissions.You are not authorized to access this page.')]);
                }
                else{
                    return redirect('/un_authrized');
                }    
            }
            break;
        }
        return $next($request);
    }
}
