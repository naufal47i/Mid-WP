<title>SISCO | Posko Kesehatan</title>
@extends('layouts.appUser')

<section class="header1 cid-seOfb1Mmun mbr-parallax-background" id="header1-22">
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(0, 0, 0);">
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">Posko Kesehatan</h1>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Dapatkan informasi dan pengecekan kesehatan didekat anda</h3>
            </div>
        </div>
    </div>

</section>

<section class="video2 cid-seOiIYIjCh" id="video2-2f">


    <div class="container">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style mb-0 display-2">
                <strong>{{$posko->nama_posko}}</strong></h4><br>

                <h5 class="mbr-section-subtitle mbr-fonts-style mb-0 mt-2 display-7">
        </div>
        <div class="row justify-content-center mt-4">
            <img src="/storage/cover_images/{{$posko->cover_image}}" width="40%" class="rounded">
        </div>
    </div>
</section>

<section class="mbr-section article content1 cid-seOixwsugR" id="content1-2d">
    <div class="container" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
        <div class="row">
            <div class="col-md-6 text-right">
                <h5>
                    Alamat:
                </h5>
            </div>
            <div class="col-md-6">
                <p>
                    {{$posko->alamat_kesehatan}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-right">
                <h5>
                    No Telp:
                </h5>
            </div>
            <div class="col-md-6">
                <p>
                     {{$posko->no_telp_kesehatan}}
                </P>
            </div>
        </div>
        <div class="row mx-auto d-block">
            <div class="map justify-center">
                <iframe src="https://maps.google.com/maps?q={{$posko->lat}},{{$posko->lng}}&z=15&output=embed">
                <iframe src="https://maps.google.com/maps?q={{$posko->lat}},{{$posko->lng}}&z=15&output=embed">
            </div>
        </div>
        @if(!Auth::guest())
            @if (Auth::user()->id == $posko->user_id)
                <a href="/poskos/{{$posko->id_posko}}/edit" class="btn btn-primary display-4">EDIT</a>
                {!!Form::open(['action' => ['poskoController@destroy', $posko->id_posko], 'method' => 'POST', 'class' => 'float-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-secondary display-4'])}}
                {!!Form::close() !!}
            @endif
        @endif
    </div>

</section>

@extends('layouts.appFooter')
