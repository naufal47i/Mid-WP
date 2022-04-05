<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Artikel;
use App\User;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }

    public function index()
    {
        //$artikels = Artikel::all();
        //$artikels = select('SELECT * FROM artikels');
        //$artikels = Artikel::orderBy('added_on','desc')->take(3)->get();
        $artikels = Artikel::orderBy('created_at','desc')->paginate(5);
        return view('artikels.index')->with('artikels', $artikels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikels/create');//
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
            'title_artikel' => 'required',
            'body_artikel' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle file upload
        if($request->hasFile('cover_image'))
        {
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        //create adrtikel
        $artikel = new Artikel;
        $artikel->title_artikel = $request->input('title_artikel');
        $artikel->body_artikel = $request->input('body_artikel');
        $artikel->cover_image = $fileNameToStore;
        $artikel->user_id = auth()->user()->id;
        $artikel->save();

        return redirect('artikels/admin')->with('Success',"Artikel Ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::find($id);
        return view('artikels/show')->with('artikel',$artikel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::find($id);

        //cek user
        if (auth()->user()->id !== $artikel->user_id)
        {
            return redirect('/artikels')->with('Error','Unauthorized Page');
        }
        return view('artikels/edit')->with('artikel',$artikel);
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
            'title_artikel' => 'required',
            'body_artikel' => 'required'
        ]);

        if($request->hasFile('cover_image'))
        {
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        //create adrtikel
        $artikel = Artikel::find($id);
        $artikel->title_artikel = $request->input('title_artikel');
        $artikel->body_artikel = $request->input('body_artikel');
        if($request->hasFile('cover_image')){
            $artikel->cover_image = $fileNameToStore;
        }
        $artikel->save();

        return redirect('artikels/admin')->with('Success',"Artikel Diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);

        //cek user
        if (auth()->user()->id !== $artikel->user_id)
        {
            return redirect('artikels/admin')->with('Error','Unauthorized Page');
        }

        if($artikel->cover_image != 'noimage.jpg')
        {
            //delete image
            Storage::delete('public/cover_images/'.$artikel->cover_image);
        }


        $artikel->delete();
        return redirect('artikels/admin')->with('Success',"Artikel Terhapus");
    }

    public function admin()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $artikels = $user->artikels;
        return view('artikels/admin', compact('artikels'));
    }
}
