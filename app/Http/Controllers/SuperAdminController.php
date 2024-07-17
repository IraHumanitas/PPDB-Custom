<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class SuperAdminController extends Controller
{
    //
    public function dashboardSpan()
    {
        $username = Auth::user()->name;
    
        return view('operator.dashboard', compact('username'));
    }
    public function dashboard()
    {
        $username = Auth::user()->name;
        notify()->success("Selamat Datang $username, Selamat Bekerja!");
    
        return view('operator.dashboard', compact('username'));
    }

    public function users()
    {
        $users = User::with('roles')->where('role','!=',1)->get();
        return view('operator.users', compact('users'));
    }

    public function manageRole()
    {
        $users = User::where('role','!=',1)->get();
        $roles = Role::all();
        return view('operator.manage-role', compact(['users','roles']));
    }

    public function updateRole(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);

        return redirect()->route('superAdminUsers')
        ->with('success', 'Data Panitia berhasil diubah');
        
    }

    public function loadCreateUser()
    {
        return view('operator.create-user');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:5',
            'role' => 'required|integer|in:0,1,2,3,4'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;

        $randomValue = rand(10000, 99999);
        $user->password = Hash::make($randomValue);
        $user->token = $randomValue;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('superAdminUsers')
        ->with('success', 'Data Panitia berhasil ditambahkan');
    }


    public function deleteUser($id){
        $user = User::find($id);

        if (!$user) {
            return redirect('/super-admin/users')->with('error', 'Pengguna tidak ditemukan.');
        }

        $user->delete();

        return redirect()->route('superAdminUsers')
        ->with('succesDelete', 'Data Panitia berhasil dihapus');
    }

    public function searchUser(Request $request)
    {
        $search = $request->input('search');

        $users = User::with('roles')
            ->where('role', '!=', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->get();

        return view('operator.users', compact('users'));
    }
    
}
