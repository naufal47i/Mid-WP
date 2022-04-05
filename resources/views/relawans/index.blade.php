
  <title>SISCO | relawan Kesehatan</title>
  @extends('layouts.appUser')


  <section class="header1 cid-seOs3rwYpK mbr-parallax-background" id="header1-2o">



      <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(0, 0, 0);">
      </div>

      <div class="container">
          <div class="row justify-content-md-center">
              <div class="mbr-white col-md-10">
                  <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">
                      Artikel Kesehatan</h1>
                  <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Dapatkan informasi terkini mengenai pandemi serta tips kesehatan lainnya</h3>


              </div>
          </div>
      </div>

  </section>

  <section class="video4 cid-seOsQZdSTD" id="video4-2r">
      <div class="container">
        <div style="font-family: Arial, Helvetica, sans-serif">
            <div class="form-group">
                <form action="/relawans/search"  method="GET">
                    <input type="text" class="btn mx-auto d-block" name="search" style="width: 50%"  placeholder="Cari Pendaftar Relawan .." value="{{ old('search') }}">
                    <input type="submit" value="Cari" class="btn btn-primary mx-auto d-block">
                </form>
            </div>
        </div>

        @include('inc.messages')
          @if(count($relawans) > 0)
              @foreach ($relawans as $relawan)

              <div class="row align-items-center">
                  <div class="col-md-4 col-sm-4">
                      <img src="/storage/photos/{{$relawan->photo}}" width=100%>
                  </div>
                  <div class="col-md-8 col-sm-8">
                      <h5 class="mbr-section-subtitle mbr-fonts-style mb-3 display-5">
                      <strong><a href="/relawans/{{$relawan->id}}">{{$relawan->nama}}</a></strong></h5>
                      <small style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
                          Mendaftar pada {{$relawan->created_at}}
                      </small>
                  </div>
              </div>
              @endforeach
              {{$relawans->links()}}
          @else
          <div class="row align-items-center">
              <div class="col-12 col-lg">
                  <div class="text-wrapper">
                      <p class="mbr-text mbr-fonts-style display-7">COMING SOON...</p>
                  </div>
              </div>
          </div>
          @endif
      </div>
  </section>

  @extends('layouts.appFooter')
