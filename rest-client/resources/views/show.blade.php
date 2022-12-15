@extends('app')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card" style="margin-top:150px;">
            <div class="card-header">
              Detail Movie
            </div>
            <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Judul :{{ $movie['judul'] }}</li>
                      <li class="list-group-item">Director :{{ $movie['director'] }}</li>
                      <li class="list-group-item">Tanggal Rilis :{{ $movie['tanggal_rilis'] }}</li>
                      <li class="list-group-item">Produksi :{{ $movie['produksi'] }}</li>
                    </ul>
            </div>
        </div>
    </div>
</div>
        
@endsection