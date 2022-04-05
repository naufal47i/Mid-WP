<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Ambulan;
use App\Posko_Kesehatan;
use App\Relawan;

class PagesController extends Controller
{
   public function index(){
       $artikels = Artikel::latest()->take(3)->get();
       $ambulan = Ambulan::count();
       $posko = Posko_Kesehatan::count();
       $relawan = Relawan::select('nama')
       ->where('status_relawan', '=', 'Diterima')->count();
    //    return view('pages.index')->with('artikels',$artikels);
       return view('pages.index', compact('artikels','ambulan', 'posko', 'relawan'));
   }

}
