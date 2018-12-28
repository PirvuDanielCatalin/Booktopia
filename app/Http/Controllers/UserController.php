<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Session;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $users = User::all();
        $users_roles = [];
        foreach ($users as $user)
            $users_roles[$user->id] = $user->roles->first();
        $roles = Role::all();
        return view('users.index', ['users' => $users, 'roles' => $roles, 'users_roles' => $users_roles]);
    }

    public function update_roles(Request $request)
    {
        $users_roles = $request->all();
        foreach($users_roles as $userId => $roleId) {
            DB::table('users_roles')
                ->where('user_id', $userId)
                ->update(['role_id' => $roleId]);
        }
        return response('The users roles were successfully updated!', 200)
            ->header('Content-Type', 'text/plain');
    }

}
