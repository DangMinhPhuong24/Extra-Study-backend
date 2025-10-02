<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Exceptions\UnauthorizedException;

class CheckPermission
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param $permissions
     * @param $guard
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next, $permissions = null, $guard = null)
    {
        $authGuard = Auth::guard($guard);

        $user = $authGuard->user();

        if (!$user) {
            throw UnauthorizedException::notLoggedIn();
        }

        if($user->isAdmin())
        {
            return $next($request);
        }

        $permissionsArray = explode('|', $permissions);

        foreach ($permissionsArray as $permissionName) {
            if($this->hasPermissionOrAnyChild($user, $permissionName))
            {
                return $next($request);
            }
        }

        return response()->json(
            [
                'message' => __('messages.error.forbidden'),
                'status' => 403
            ],
            403
        );
    }

    /**
     * @param $user
     * @param $permissionName
     * @return bool
     */
    private function hasPermissionOrAnyChild($user, $permissionName): bool
    {
        if ($user->hasPermissionTo($permissionName)) {
            return true;
        }

        return $this->checkParentPermissions($user, $permissionName);
    }

    /**
     *
     * @param $user
     * @param $permissionName
     * @return bool
     */
    private function checkParentPermissions($user, $permissionName): bool
    {
        $parentPermission = $this->getParentPermission($permissionName);

        if (empty($parentPermission)) {
            return false;
        }

        if ($user->hasPermissionTo($parentPermission->name)) {
            return true;
        }

        return $this->checkParentPermissions($user, $parentPermission->name);
    }

    /**
     * @param $permissionName
     * @return mixed|null
     */
    private function getParentPermission($permissionName): mixed
    {
        $permission = Permission::where('name', $permissionName)->first();

        if(!empty($permission))
        {
            return Permission::where('id', $permission->parent_id)->first();
        }

        return null;
    }
}
