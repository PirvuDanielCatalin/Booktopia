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
        $this->middleware('CountPeople')->only('index');
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
        foreach($users_roles as $userId => $roleName) {
            User::find($userId)->assignRole($roleName);
        }
        return response('The users roles were successfully updated!', 200)
            ->header('Content-Type', 'text/plain');
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'Users.xlsx');
    }
    public function exportPDF()
    {
        return Excel::download(new UsersExport, 'Users.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
}
