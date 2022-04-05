
  <title>SISCO | Ambulans</title>
  @extends('layouts.appAdmin')
  @section('content')
      <h1 style="padding: 5% 0 2% 0">Input Data Ambulance</h1>
      {!! Form::open(['action' => 'AmbulanController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="form-group">
              {{Form::label('id_posko', 'Posko Pilihan')}}
            <br>
              {{Form::select('id_posko',$poskos)}}
          </div>
          <div class="form-group" style="width: 40%">
              {{Form::label('NoPol', 'Nomor Polisi')}}
              {{Form::text('NoPol', '', ['class' => 'form-control', 'placeholder' => 'Nomor Polisi'])}}
          </div>
          <br>
          {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
  @endsection
