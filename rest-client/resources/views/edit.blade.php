@extends('app')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card" style="margin-top:150px;">
            <div class="card-header">
              Form Edit Data
            </div>
            <div class="card-body">
                <form method="POST" action="/movie/{{ $movie['id'] }}">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                      <label for="judul" class="form-label">Judul</label>
                      <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $movie['judul']) }}">
                    </div>
                    <div class="mb-3">
                        <label for="director" class="form-label">Director</label>
                        <input type="text" class="form-control" id="director" name="director" value="{{ old('director', $movie['director']) }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_rilis" class="form-label">Tanggal Rilis</label>
                        <input type="text" class="form-control" id="tanggal_rilis" name="tanggal_rilis" value="{{ old('tanggal_rilis', $movie['tanggal_rilis']) }}">
                    </div>
                    <div class="mb-3">
                        <label for="produksi" class="form-label">Produksi</label>
                        <input type="text" class="form-control" id="produksi" name="produksi" value="{{ old('produksi', $movie['produksi']) }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>
        
@endsection