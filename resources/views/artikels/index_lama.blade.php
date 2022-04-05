@extends('layouts.app')


@section('content')
    <h1>Artikel</h1>
    @if(count($artikels) > 0)
        @foreach ($artikels as $artikel)
            <div class="wadah">
            <h3><a href="/artikels/{{$artikel->id_artikel}}">{{$artikel->title_artikel}}</a></h3>
                <p>{{$artikel->body_artikel}}</p>
                <small>Ditulis {{$artikel->created_at}}</small>
            </div>
        @endforeach
        {{$artikels->links()}}
    @else
        <p>Artikel tidak ditemukan</p>
    @endif
    @if(!Auth::guest())
        <h3><a class="btn btn-primary" href="/artikels/create">Tulis Artikel baru!</a></h3>
    @endif
@endsection