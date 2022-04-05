<?php

namespace App\Http\Controllers;
use App\Artikel;
use App\User;
use App\Ambulan;
use App\Posko_Kesehatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $artikels = $user->artikels->take(3);
        $ambulans = Ambulan::join('posko__kesehatans', 'posko__kesehatans.id_posko', '=', 'ambulans.id_posko')
        ->select('*')->orderBy('NoPol', 'asc')
        ->take(3)->get();
        $poskos = Posko_Kesehatan::orderBy('nama_posko', 'asc')->take(3)->get();
        return view('admin', compact('artikels','ambulans', 'poskos'));
    }
}
