<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MasterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nav = 'master';
        $menu = 'master';
        $data = User::all();
        return view('master-user.index', compact('nav', 'menu', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $nav = 'master';
        $menu = 'master';
        $role = Role::all();
        return view('master-user.create', compact('nav', 'menu', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'role_id' => 'required',
            'password' => 'required',
        ]);

        // dd($request);
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($user) {
            return redirect()->route('index.masterUser')->with('success', 'Data Berhasil Di Tambah !!');
        } else {
            return redirect()->route('create.masterUser')->with('error', 'Gagal Menambah Data !!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $nav = 'master';
        $menu = 'master';
        $role = Role::all();
        return view('master-user.update', compact('nav', 'menu', 'role', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        if($request->password == null){
            $user->password = $user->password;
        }else{
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if ($user) {
            return redirect()->route('index.masterUser')->with('success', 'Data Berhasil Di Update !!');
        } else {
            return redirect()->route('edit.masterUser', $user->id)->with('error', 'Gagal Mengupdate Data !!');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        if ($user) {
            $user->delete();
            return redirect()->route('index.masterUser')->with('success', 'Data Berhasil Di Hapus !!');
        } else {
            return redirect()->route('index.masterUser')->with('error', 'Gagal Menghapus Data !!');
        }
    }
}
