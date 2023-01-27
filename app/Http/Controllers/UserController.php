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

    // public function update(Request $request, $id)
    // {
    //     request()->validate([
    //         'name'       => 'required|string|min:2|max:100',
    //         'email'      => 'required|email|unique:users,email, ' . $id . ',id',
    //         'old_password' => 'nullable|string',
    //         'password' => 'nullable|required_with:old_password|string|confirmed|min:6'
    //     ]);

    //     $user = User::find($id);

    //     $user->name = $request->name;
    //     $user->email = $request->email;

    //     if ($request->filled('old_password')) {
    //         if (Hash::check($request->old_password, $user->password)) {
    //             $user->update([
    //                 'password' => Hash::make($request->password)
    //             ]);
    //         } else {
    //             return back()
    //                 ->withErrors(['old_password' => __('Please enter the correct password')])
    //                 ->withInput();
    //         }
    //     }

    //     if (request()->hasFile('foto')) {
    //         if($user->foto && file_exists(storage_path('app/public/storage/gambar-barang/' . $user->foto))){
    //             Storage::delete('app/public/storage/gambar-barang/'.$user->foto);
    //         }

    //         $file = $request->file('foto');
    //         $fileName = $file->hashName() . '.' . $file->getClientOriginalExtension();
    //         $request->foto->move(storage_path('app/public/storage/gambar-barang/'), $fileName);
    //         $user->foto = $fileName;
    //     }


    //     $user->save();

    //     alert()->success('Berhasil','Data Berhasil Diubah');
    //     return redirect('/profile');
    // }

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
