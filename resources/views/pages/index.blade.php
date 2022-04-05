<title>SISCO | Home</title>
@extends('layouts.appUser')


<section class="header1 cid-seN5wLRI9X mbr-fullscreen mbr-parallax-background" id="header1-l">



    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(0, 0, 0);"></div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-1"><strong>SISTEM INFORMASI SIAGA CORONA</strong></h1>



            </div>
        </div>
    </div>
</section>

<section class="counters1 counters cid-seNBjpX6Tv" id="counters1-1m">





    <div class="container">
        <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">Data Saat Ini</h2>


        <div class="container pt-4 mt-2">
            <div class="media-container-row">
                <div class="card p-3 align-center col-12 col-md-6 col-lg-4">
                    <div class="panel-item">
                        <div class="card-img pb-3">
                            <span class="mbr-iconfont mbri-left-right"></span>
                        </div>

                        <div class="card-text">
                            <h3 class="count pt-3 pb-3 mbr-fonts-style display-2">
                                  {{$ambulan}}
                            </h3>
                            <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">Ambulance</h4>

                        </div>
                    </div>
                </div>


                <div class="card p-3 align-center col-12 col-md-6 col-lg-4">
                    <div class="panel-item">
                        <div class="card-img pb-3">
                            <span class="mbr-iconfont mbri-users"></span>
                        </div>
                        <div class="card-text">
                            <h3 class="count pt-3 pb-3 mbr-fonts-style display-2">
                                {{$relawan}}
                            </h3>
                            <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                Relawan</h4>

                        </div>
                    </div>
                </div>

                <div class="card p-3 align-center col-12 col-md-6 col-lg-4">
                    <div class="panel-item">
                        <div class="card-img pb-3">
                            <span class="mbr-iconfont mbrib-home"></span>
                        </div>
                        <div class="card-text">
                            <h3 class="count pt-3 pb-3 mbr-fonts-style display-2">{{$posko}}</h3>
                            <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">Posko Kesehatan</h4>

                        </div>
                    </div>
                </div>



            </div>
        </div>
   </div>
</section>

<section class="features18 popup-btn-cards cid-seNszONbqV" id="features18-1e">
    <div class="container">
        <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">
            Artikel Kesehatan</h2>
        <h3 class="mbr-section-subtitle display-5 align-center mbr-fonts-style mbr-light">
            Dapatkan informasi terkini mengenai pandemi serta tips kesehatan lainnya</h3>
        <div class="media-container-row pt-5 ">
            @foreach ($artikels as $artikel)
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <div class="card-wrapper ">
                        <div class="card-img">
                            <div class="mbr-overlay"></div>
                        <div class="mbr-section-btn text-center"><a href="/artikels/{{$artikel->id_artikel}}" class="btn btn-black display-4">Selengkapnya</a></div>
                        <img src="/storage/cover_images/{{$artikel->cover_image}}" alt="Mobirise">
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style display-7">
                                {{$artikel->title_artikel}}
                            </h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@extends('layouts.appFooter')