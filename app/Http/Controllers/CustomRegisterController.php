<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomRegisterController extends Controller
{
    public function index()
    {
      return \view('auth.register');
    }
    
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|min:4',
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:6',
        'level' => 'required'
      ]);

      $validatedData['password'] = Hash::make ($validatedData['password']);
      User::create($validatedData);

      $request->session()->flash('success', 'Daftar Berhasil, Silahkan Login');

      return \redirect('/login'); 

    }
}
