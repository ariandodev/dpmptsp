<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Http\Request;

class UserCon extends Controller
{
    public function index() {
        $users = User::with('role')->get();
    }

    public function kelolaHakAkses() {
        $roles = Role::all();
        $permissions = Permission::all();
    }
}
