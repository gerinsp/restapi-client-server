<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $token = session()->get('token');
        $movie = Http::withToken($token)->get('http://127.0.0.1:7000/api/movie')['movie'];
        return view('index', [
            'title' => 'Movie',
            'movies' => $movie
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', [
            'title' => 'Tambah Data',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = Http::post('http://127.0.0.1:7000/api/movie', [
            'judul' => $request->judul,
            'director' => $request->director,
            'tanggal_rilis' => $request->tanggal_rilis,
            'produksi' => $request->produksi
        ]);

        if($movie->successful()){
            return redirect('/movie')->with('success', 'New Movie has been added!');
        }

        if($movie->failed()){
            return redirect('/movie')->with('failed', 'Movie has been failed to added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::get('http://127.0.0.1:7000/api/movie/' . $id)['data'];
        return view('show', [
            'title' => 'Detail Movie',
            'movie' => $movie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Http::get('http://127.0.0.1:7000/api/movie/' . $id)['data'];
        return view('edit', [
            'title' => 'Edit',
            'movie' => $movie
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Http::put('http://127.0.0.1:7000/api/movie/' . $id, [
            'judul' => $request->judul,
            'director' => $request->director,
            'tanggal_rilis' => $request->tanggal_rilis,
            'produksi' => $request->produksi
        ]);

        if($movie->successful()){
            return redirect('/movie')->with('success', 'New Movie has been updated!');
        }

        if($movie->failed()){
            return redirect('/movie')->with('failed', 'Movie failed to update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Http::delete('http://127.0.0.1:7000/api/movie/' . $id);
        if($movie->successful()){
            return redirect('/movie')->with('success', 'Movie has been deleted!');
        }

        if($movie->failed()){
            return redirect('/movie')->with('failed', 'Movie failed to deleted!');
        }
    }
}
