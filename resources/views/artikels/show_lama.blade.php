@extends('layouts.app')
{{-- @include('inc.messages') --}}

@section('content')
    <a href="/artikels" class="btn btn-default">Kembali</a>
    <h1>{{$artikel->title_artikel}}</h1>
    <small>Ditulis {{$artikel->created_at}}</small>
    <div>
        <h2>{{$artikel->body_artikel}}</h2>
    </div>
    @if(!Auth::guest())
    <a href="/artikels/{{$artikel->id_artikel}}/edit" class="btn btn-primary">Edit</a>
    <hr>
    {!!Form::open(['action' => ['ArtikelController@destroy', $artikel->id_artikel], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
    @endif
@endsection
