<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('admin.master.user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'type'      => $request->level,
        ]);

        alert()->success('Berhasil','Data Berhasil Ditambahkan');
        return redirect('/user');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = $request->level;
         
        $user->save();

        alert()->success('Berhasil','Data Berhasil Diubah');
        return redirect('/user');
    }

    public function destroy($id)
    {
        $user = User::find($id);
 
        $user->delete();

        alert()->info('Info','Data Telah Dihapus');
        return redirect('/user');
    }
}
