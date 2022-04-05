
<title>SISCO | posko Kesehatan</title>

@extends('layouts.appAdmin')
@section('content')
    <h1>Edit Posko Kesehatan</h1>
    {!! Form::open(['action' => ['PoskoKesehatanController@update', $posko->id_posko], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
         <div class="form-group">
            {{Form::label('nama_posko', 'Nama posko')}}
            {{Form::text('nama_posko', $posko->nama_posko, ['class' => 'form-control', 'placeholder' => 'Nama posko'])}}
        </div>
        <div class="form-group">
            {{Form::label('alamat_kesehatan', 'Alamat posko')}}
            {{Form::textarea('alamat_kesehatan', $posko->alamat_kesehatan, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Alamat posko'])}}
        </div>
        <div class="form-group">
            {{Form::label('no_telp_kesehatan', 'Nomor Telepon')}}
            {{Form::text('no_telp_kesehatan', $posko->no_telp_kesehatan, ['class' => 'form-control', 'placeholder' => 'Nomor Telepon'])}}
        </div>
        <div class="form-group">
            {{Form::label('lat', 'Latitude')}}
            {{Form::text('lat', $posko->lat, ['class' => 'form-control', 'placeholder' => 'Latitude'])}}
        </div>

        <div class="form-group">
            {{Form::label('lng', 'Longitute')}}
            {{Form::text('lng', $posko->lng, ['class' => 'form-control', 'placeholder' => 'Longitute'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection
