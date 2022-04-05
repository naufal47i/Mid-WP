
  <title>SISCO | artikel Kesehatan</title>
@extends('layouts.appAdmin')
@section('content')
    <h1>Edit Artikel</h1>
    {!! Form::open(['action' => ['ArtikelController@update', $artikel->id_artikel], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title_artikel', 'Judul')}}
            {{Form::text('title_artikel', $artikel->title_artikel, ['class' => 'form-control', 'placeholder' => 'Judul'])}}
        </div>
        <div class="form-group">
           {{Form::label('body_artikel','Isi Artikel')}}
           {{ Form::textarea('body_artikel',$artikel->body_artikel,['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Isi Artikel'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection
