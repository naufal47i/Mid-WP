<title>SISCO | relawan Kesehatan</title>
@extends('layouts.appUser')


<section class="header1 cid-seOfb1Mmun mbr-parallax-background" id="header1-22">
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(0, 0, 0);">
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">Pendaftar Relawan</h1>
                {{-- <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Dapatkan informasi terkini mengenai pandemi serta tips kesehatan lainnya</h3> --}}
            </div>
        </div>
    </div>

</section>

<section class="video2 cid-seOiIYIjCh" id="video2-2f">


    <div class="container">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style mb-0 display-2">
                <strong>{{$relawan->nama}}</strong></h4><br>

                <h5 class="mbr-section-subtitle mbr-fonts-style mb-0 mt-2 display-7">Mendaftar pada {{$relawan->created_at}}</h5>
        </div>
        <div class="row justify-content-center mt-4">
            <img src="/storage/photos/{{$relawan->photo}}" width=40% height="40%">
        </div>
    </div>
</section>

<section class="mbr-section article content1 cid-seOixwsugR" id="content1-2d">
    <div class="container">
        <div class="media-container-row">
            <div class="mbr-text col-12 mbr-fonts-style display-7 col-md-8">
                {{-- <small>Ditulis pada {{$relawan->created_at}} oleh {{$relawan->user->name}}</small> <br><br> --}}
                <div class="row">
                    <div class="col-4">Nama</div>
                    <div class="col-8">{{$relawan->nama}}</div>
                </div>
                <div class="row">
                    <div class="col-4">NIK</div>
                    <div class="col-8">{{$relawan->NIK}}</div>
                </div>
                <div class="row">
                    <div class="col-4">TTL</div>
                    <div class="col-8">{{$relawan->TTL}}</div>
                </div>
                <div class="row">
                    <div class="col-4">Jenis Kelamin</div>
                    <div class="col-8">
                        @if ($relawan->jenis_kelamin == 'Male')
                            Pria
                        @else
                            Wanita
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">Nomor Telepon</div>
                    <div class="col-8">{{$relawan->no_telp}}</div>
                </div>
                <div class="row">
                    <div class="col-4">Email</div>
                    <div class="col-8">{{$relawan->email}}</div>
                </div>
                <div class="row">
                    <div class="col-4">Posko Pilihan</div>
                    <div class="col-8">{{$posko->nama_posko}}</div>
                </div>
                <div class="row">
                    <div class="col-4">Status</div>
                    <div class="col-8">{{$relawan->status_relawan}}</div>
                </div>
                </div>
            </div>
        </div>
        @if(!Auth::guest())
            @if($relawan->status_relawan != "Diterima" )
                {!!Form::open(['action' => ['RelawanController@update', $relawan->id], 'method' => 'POST', 'class' => 'float-left'])!!}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('TERIMA', ['class' => 'btn btn-primary display-4'])}}
                {!!Form::close() !!}


                {!!Form::open(['action' => ['RelawanController@destroy', $relawan->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('TOLAK', ['class' => 'btn btn-secondary display-4'])}}
                {!!Form::close() !!}
            @endif
        @endif
    </div>
</section>


@extends('layouts.appFooter')
