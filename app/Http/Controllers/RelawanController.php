<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Relawan;
use App\Posko_Kesehatan;
use Illuminate\Support\Facades\Auth;

class RelawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except' => ['create','store']]);
    }

    public function index()
    {
        $relawans = Relawan::orderBy('created_at','desc')->paginate(10);
        return view('relawans.index')->with('relawans', $relawans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poskos = Posko_Kesehatan::pluck('nama_posko','id_posko');
        return view('relawans.create')->with('poskos', $poskos);
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
            'nama' => 'required',
            'NIK' => 'required',
            'TTL' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'id_posko' => 'required',
            'photo' => 'image|nullable|max:1999',
        ]);

        //Handle file upload
        if($request->hasFile('photo'))
        {
            //Get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();

            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just extension
            $extension = $request->file('photo')->getClientOriginalExtension();

            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload Image
            $path = $request->file('photo')->storeAs('public/photos', $fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        //create adrtikel
        $relawan = new Relawan;
        $relawan->nama = $request->input('nama');
        $relawan->NIK = $request->input('NIK');
        $relawan->TTL = $request->input('TTL');
        $relawan->jenis_kelamin = $request->input('jenis_kelamin');
        $relawan->no_telp = $request->input('no_telp');
        $relawan->email = $request->input('email');
        $relawan->status_relawan = "Terdaftar";
        $relawan->id_posko = $request->input('id_posko');
        $relawan->photo = $fileNameToStore;
        $relawan->save();

        return redirect('/relawans/create')->with('Success',"Pendaftaran Berhasil");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relawan = Relawan::find($id);
        $posko = Posko_Kesehatan::find($relawan->id_posko);
        return view('relawans/show', compact('relawan','posko'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relawan = Relawan::find($id);

        //cek user
        if (Auth::guest())
        {
            return redirect('/relawans/create')->with('error','Unauthorized Page');
        }
        return view('relawans/edit')->with('relawan',$relawan);
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
        $relawan = Relawan::find($id);
        $relawan->status_relawan = "Diterima";
        $relawan->save();
        return redirect('/relawans/')->with('Success',"Pendaftaran Terverifikasi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relawan = Relawan::find($id);

        $relawan->status_relawan = "Ditolak";
        $relawan->save();
        return redirect('/relawans')->with('Success',"Pendaftaran Ditolak");
    }

    public function search(Request $request)
	{
        $search = $request->search;

        $relawans = Relawan::orderBy('created_at','desc')
        ->select('*')
        ->where('nama','like',"%".$search."%")
        ->paginate(5);

		return view('relawans.index', compact('relawans'));

	}
}
