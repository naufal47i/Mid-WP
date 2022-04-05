<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ambulan;
use App\Posko_Kesehatan;

class AmbulanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ambulanData = Ambulan::all();
        $ambulan = [];
        $posko = [];


        if (count($ambulanData) > 0)
        {
            $ambulan = $ambulanData->random();
            $posko = Posko_Kesehatan::find($ambulan->id_posko);
        }
        return view('ambulans.index', compact('ambulan','posko'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poskos = Posko_Kesehatan::pluck('nama_posko','id_posko');
        return view('ambulans/create')->with('poskos', $poskos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_posko' => 'required',
            'NoPol' => 'required'
        ]);
        //create ambulan
        $ambulan = new Ambulan;
        $ambulan->id_posko = $request->input('id_posko');
        $ambulan->NoPol = $request->input('NoPol');
        $ambulan->save();

        return redirect('ambulans/admin')->with('Success',"Ambulan Ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $ambulan = Ambulan::find($id);
        // return view('ambulans/show')->with('ambulan',$ambulan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ambulan = Ambulan::find($id);
        $poskos = Posko_Kesehatan::pluck('nama_posko','id_posko');
        return view('ambulans.edit', compact('ambulan','poskos'));
        // return view('ambulans/edit')->with('ambulan',$ambulan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'id_posko' => 'required',
            'NoPol' => 'required'
        ]);


        //create artikel
        $ambulan = Ambulan::find($id);
        $ambulan->id_posko = $request->input('id_posko');
        $ambulan->NoPol = $request->input('NoPol');
        $ambulan->save();

        return redirect('ambulans/admin')->with('Success',"Ambulan Diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Ambulan = Ambulan::find($id);
        $Ambulan->delete();
        return redirect('ambulans/admin')->with('Success',"Ambulan Terhapus");
    }

    public function admin()
    {
        $ambulans = Ambulan::join('posko__kesehatans', 'posko__kesehatans.id_posko', '=', 'ambulans.id_posko')
        ->select('*')->orderBy('NoPol', 'asc')
        ->paginate(7);
        return view('ambulans/admin', compact('ambulans'));
    }

}
