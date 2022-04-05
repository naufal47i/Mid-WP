<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.2.0, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.2.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="{{asset('assets/images/sisco-128x128-1.png')}}" type="image/x-icon">
  <meta name="description" content="This is a ambulance page of SISCO">


  <title>SISCO | Pendaftaran Relawan</title>
  <link rel="stylesheet" href="{{asset('assets/web/assets/mobirise-icons/mobirise-icons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap-grid.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap-reboot.min.css')}}">
</head>
<body>
<div id="app">
    <main class="container" style="padding: 5% 15%">
        <h1>Pendaftaran Relawan SISCO</h1>
        @include('inc.messages')
            {!! Form::open(['action' => 'RelawanController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('nama', 'Nama')}}
                    {{Form::text('nama', '', ['class' => 'form-control', 'placeholder' => 'Jhonny Yes Phapa'])}}
                </div>
                <div class="form-group">
                    {{Form::label('NIK', 'NIK')}}
                    {{Form::text('NIK', '', ['class' => 'form-control', 'placeholder' => '123456789456153'])}}
                </div>
                <div class="form-group">
                    {{Form::label('TTL', 'TTL')}}
                    {{Form::text('TTL', '', ['class' => 'form-control', 'placeholder' => 'Jakarta, 12 September 1998'])}}
                </div>
                <div class="form-group">
                    {{Form::label('jenis_kelamin', 'Jenis Kelamin')}}
                    <br>
                    {{Form::radio('jenis_kelamin', 'Male')}}
                    {{Form::label('jenis_kelamin', 'Laki-laki')}}
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    {{Form::radio('jenis_kelamin', 'Female')}}
                    {{Form::label('jenis_kelamin', 'Perempuan')}}
                </div>
                <div class="form-group">
                    {{Form::label('no_telp', 'Nomor Telepon')}}
                    {{Form::text('no_telp', '', ['class' => 'form-control', 'placeholder' => '08123456789'])}}
                </div>
                <div class="form-group">
                    {{Form::label('email', 'Email')}}
                    {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'example@example.com'])}}
                </div>

                <div class="form-group">
                    {{Form::label('id_posko', 'Posko Pilihan')}}
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    {{Form::select('id_posko', $poskos)}}
                </div>

                <div class="form-group">
                    {{Form::file('photo')}}
                </div>
                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
    </main>
</div>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
