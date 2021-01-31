<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function listusers() {
        $users = User::all();
        return view('admin.users')->with('users', $users);
    }

    public function useredit(Request $request, $id) {
        $users = User::findOrFail($id);
        return view('admin.user-edit')->with('users', $users);
    }

    public function userupdate(Request $request, $id) {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->user_type = $request->input('user_type');
        $users->update();

        return redirect('/admin/users')->with('status', 'Data updated successfully.');
    }

    public function userdelete($id){

        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/admin/users')->with('status', 'User profile deleted successfully.');
    }
}
