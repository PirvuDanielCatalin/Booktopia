<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Session;
use DB;
use App\Exports\UsersExport;
use Excel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
        // $this->middleware('CountPeople')->only('index');
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

    public function get_user_role(Request $request)
    {
        return User::find($request->user_id)->with('roles')->where('users.id', '=', $request->user_id)->first();
    }

    public function update_role(Request $request)
    {
        $user = User::find($request->user_id);
        $user->assignRole($request->new_role);

        return response("The role for user " . $user->name . " was successfully updated!", 200)
            ->header('Content-Type', 'text/plain');
    }
}
