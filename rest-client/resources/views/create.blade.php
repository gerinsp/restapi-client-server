@extends('app')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card" style="margin-top:150px;">
            <div class="card-header">
              Form Tambah Data
            </div>
            <div class="card-body">
                <form method="POST" action="/movie">
                    @csrf
                    <div class="mb-3">
                      <label for="judul" class="form-label">Judul</label>
                      <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <div class="mb-3">
                        <label for="director" class="form-label">Director</label>
                        <input type="text" class="form-control" id="director" name="director">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_rilis" class="form-label">Tanggal Rilis</label>
                        <input type="text" class="form-control" id="tanggal_rilis" name="tanggal_rilis">
                    </div>
                    <div class="mb-3">
                        <label for="produksi" class="form-label">Produksi</label>
                        <input type="text" class="form-control" id="produksi" name="produksi">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>
        
@endsection