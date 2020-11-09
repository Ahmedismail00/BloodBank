<?php
/*
 * todo install spatie package
 * todo create roles module
 * todo create users module
 * todo create permissions module
 * todo apply permissions to project actions by create new middleware and handle it using route name
 * todo add routes coulmn to permission table
 *
 * */
namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Models\Permission;

class AutoCheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $routeName = $request->route()->getName();  //users.create
        $permission = Permission::whereRaw("FIND_IN_SET('$routeName',routes)")->first();
        if($permission)
        {
            if(!$request->user()->can($permission->name))
            {
                abort(403);
            }
        }
        return $next($request);
    }
}
