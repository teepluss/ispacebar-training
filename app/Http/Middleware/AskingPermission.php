<?php

namespace App\Http\Middleware;

use Closure;

class AskingPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $ask = '')
    {
        $user = [
            'id' => 1,
            'name' => 'Tee',
            'permissions' => [
                'create_post' => 1
            ]
        ];

        $permissions = $user['permissions'];
        if (isset($permissions[$ask]) && $permissions[$ask] == 1) {
            return $next($request);
        }

        abort(401);
    }
}
