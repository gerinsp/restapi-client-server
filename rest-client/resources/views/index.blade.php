@extends('app')

@section('container')
        @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show col-lg-4 mt-5"  role="alert">
              {{ session('success') }}
          </div>
        @endif

        @if(session()->has('failed'))
          <div class="alert alert-danger alert-dismissible fade show col-lg-4 mt-5"  role="alert">
              {{ session('failed') }}
          </div>
        @endif

        <div class="card mt-5">
            <div class="card-header">
             <div class="justify-content-end float-end">
              <a href="/movie/create" class="btn btn-sm btn-primary">Tambah</a>
             </div>
              Data Film
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Director</th>
                        <th scope="col">Tanggal Rilis</th>
                        <th scope="col">Produksi</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $movie)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $movie['judul'] }}</td>
                        <td>{{ $movie['director'] }}</td>
                        <td>{{ $movie['tanggal_rilis'] }}</td>
                        <td>{{ $movie['produksi'] }}</td>
                        <td>
                            <a href="/movie/{{ $movie['id'] }}" class="badge text-bg-primary text-decoration-none">Lihat</a>
                            <a href="/movie/{{ $movie['id'] }}/edit" class="badge text-bg-warning text-decoration-none">Edit</span></a>
                            <form action="/movie/{{ $movie['id'] }}" method="post" class="d-inline">
                              @method('delete')
                              @csrf
                              <button class="badge text-bg-danger text-decoration-none border-0"  onclick="return confirm('Are you sure?')">Hapus</button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
@endsection