<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Role;


class RolePermissionController extends Controller
{
    public function assignPermissions(Request $request, Role $role)
    {
        $role->abilities()->sync([]);
        if ($request['permissions']) {
            foreach ($request['permissions'] as $item) {
                $t = explode('-', $item, '2');
                $perm[$t[1]][] = $t[0];
            }
            foreach ($perm as $model => $permissions) {
                $role->allow($permissions, $model);
            }
        }
        $this->actionsuccess();
        return redirect()->back();
    }
}
