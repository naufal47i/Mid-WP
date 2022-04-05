
<title>SISCO | Admin Page</title>
@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="media-container-row pt-5 pb-5">
                <h3>Artikel Anda</h3>
                <a href="/artikels/create" class="btn btn-primary btn-block" style="float-right">Tambah Artikel</a>
            </div>
            <div class="table-responsive">
                @if(count($artikels) > 0)
                    <table id="tabel-ar" class="table table-striped">
                        <thead>
                        <tr>
                            <th>TITLE</th>
                            <th>UBAH</th>
                            <th>HAPUS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($artikels as $artikel)
                            <tr>
                                <th>{{$artikel->title_artikel}}</th>
                                <th><a href="/artikels/{{$artikel->id_artikel}}/edit" class="btn btn-primary display-4">Ubah</a></th>
                                <th>
                                    {!!Form::open(['action' => ['ArtikelController@destroy', $artikel->id_artikel], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Hapus', ['class' => 'btn btn-danger display-4'])}}
                                    {!!Form::close() !!}
                                </th>
                            </tr>
                        @endforeach
    </tbody>
                    </table>

                @else
                <table class="table table-striped">
                    <tr>
                        <th>Tidak ada artikel</th>
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('moreJS')
    <script>
        $(document).ready(function(){
			$('#tabel-ar').DataTable();
        });
    </script>
@endsection
