<title>SISCO | Ambulan</title>
@extends('layouts.appAdmin')
@section('content')
    <h1>Edit Artikel</h1>
    {!! Form::open(['action' => ['AmbulanController@update', $ambulan->id_ambulan], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('id_posko', 'Nama Posko')}}
            {{Form::select('id_posko',$poskos)}}
        </div>
        <div class="form-group">
           {{Form::label('NoPol','Nomor Polisi')}}
           {{Form::textarea('NoPol',$ambulan->NoPol,['class' => 'form-control', 'placeholder' => 'Nomor Polisi'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection