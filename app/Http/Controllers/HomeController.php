<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user(); // Mengambil data pengguna
        return view('pages.home', [
            'username' => $user->name, // Asumsi field 'name' menyimpan username
            'email' => $user->email, // Mengambil email pengguna
        ]);
    }
}
