
<title>SISCO | Admin Page</title>
@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="media-container-row pt-5 pb-5">
                <h3>Ambulan Kita</h3>
                <a href="/ambulans/create" class="btn btn-primary btn-block" style="float-right">Tambah Ambulan</a>
            </div>
            <div class="table-responsive">
                @if(count($ambulans) > 0)
                <table id="tabel-ambulance" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nomor Polisi</th>
                            <th>Posko Kesehatan</th>
                            <th>UBAH</th>
                            <th>HAPUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ambulans as $ambulan)
                        <tr>
                            <td>{{$ambulan->NoPol}}</td>
                            <td>{{$ambulan->nama_posko}}</td>
                            <td><a href="/ambulans/{{$ambulan->id_ambulan}}/edit" class="btn btn-primary display-4">Ubah</a></td>
                            <td>
                                {!!Form::open(['action' => ['AmbulanController@destroy', $ambulan->id_ambulan], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Hapus', ['class' => 'btn btn-danger display-4'])}}
                                {!!Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $ambulans->links() }} --}}

                @else
                <table class="table table-striped">
                <tr>
                    <th>Tidak ada ambulan</th>
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('moreJS')
    <script>
        $(document).ready(function(){
			$('#tabel-ambulance').DataTable();
        });
    </script>
@endsection
