<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function profile()
    {
        return \view('layouts.profil');
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

        $user = [
            'name'     => 'required',
            'email'    => 'required|email:dns',
            'password' => 'required|',
            'foto'     => 'image|file|max:3000'
        ];

        $validasi = $request->validate($user);

        if($request->file('foto'))
        {
            if($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validasi['foto'] = $request->file('foto')->store('gambar-barang');
        }

        User::where('id', $id)
              ->update($validasi);

        alert()->success('Berhasil','Data Berhasil Diubah');
        return redirect('/profile');
    }

    public function destroy($id)
    {
        $user = User::find($id);
 
        $user->delete();

        alert()->info('Info','Data Telah Dihapus');
        return redirect('/user');
    }

    // update password
    public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            alert()->error('Gagal','Password lama salah');
            return \redirect('/profile');
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        alert()->info('Berhasil','Password telah diganti');
        return \redirect('/profile');
}
}
