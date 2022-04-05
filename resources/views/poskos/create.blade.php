@extends('layouts.appAdmin')

@if (!Auth::guest())

@section('content')
    <h1>Tambah Posko Kesehatan</h1>
    {!! Form::open(['action' => 'PoskoKesehatanController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('nama_posko', 'nama')}}
            {{Form::text('nama_posko', '', ['class' => 'form-control', 'placeholder' => 'nama'])}}
        </div>
        <div class="form-group">
            {{Form::label('alamat_kesehatan', 'Alamat posko')}}
            {{Form::textarea('alamat_kesehatan', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Alamat posko'])}}
        </div>
        <div class="form-group">
            {{Form::label('no_telp_kesehatan', 'No Telepon')}}
            {{Form::text('no_telp_kesehatan', '', ['class' => 'form-control', 'placeholder' => 'No Telepon'])}}
        </div>
        <div class="form-group">
            {{Form::label('lat', 'Latitude')}}
            {{Form::text('lat', '', ['class' => 'form-control', 'placeholder' => 'Latitude'])}}
        </div>

        <div class="form-group">
            {{Form::label('lng', 'Longitute')}}
            {{Form::text('lng', '', ['class' => 'form-control', 'placeholder' => 'Longitute'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection

@endif
