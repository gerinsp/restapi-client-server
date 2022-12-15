<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $movie = Movie::find($request->id);

        // if(!$movie){
        //     return response()->json([
        //         'response' => false,
        //         'ket' => 'data film tidak ditemukan'
        //     ], 404);
        // }

        // if($request->id == ""){
        //     return response()->json([
        //         'response' => false,
        //         'ket' => 'id harus diisi'
        //     ], 404);
        // }
        
        // if($request->id == strval($movie->id)){
        //     return response()->json([
        //         'response' => true,
        //         'movie'   => Movie::where('id', $request->id)->get()
        //     ], 200);
        // }

        // if(!$request->token == "1234"){
        //     return response()->json([
        //         'response' => false,
        //         'ket' => 'Token tidak valid!'
        //     ], 404);
        // }
        
        return response()->json([
            'response' => true,
            'movie'   => Movie::all()
        ], 200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul'         => 'required',
            'director'      => 'required',
            'tanggal_rilis' => 'required',
            'produksi'      => 'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $movie = Movie::create([
            'judul'     => $request->judul,
            'director'  => $request->director,
            'tanggal_rilis' => $request->tanggal_rilis,
            'produksi'  => $request->produksi
        ]);

        if($movie){
            return response()->json([
                'success' => true,
                'movie' => $movie
            ], 201);
        }
        
        return response()->json([
            'success' => false
        ], 409);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::where('id', $id)->first();

        if($movie){
            return response()->json([
                'response' => true,
                'data'   => $movie
            ], 200);
        }

        return response()->json([
            'response' => false,
            'data'   => 'Data film tidak ditemukan!'
        ], 404);
        
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
        $validator = Validator::make($request->all(), [
            'judul'         => 'required',
            'director'      => 'required',
            'tanggal_rilis' => 'required',
            'produksi'      => 'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $update = [
            'judul'     => $request->judul,
            'director'  => $request->director,
            'tanggal_rilis' => $request->tanggal_rilis,
            'produksi'  => $request->produksi
        ];

        $movie = Movie::where('id', $id)->update($update);

        if($movie){
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diupdate!',
                'movie' => Movie::find($id)
            ], 200);
        }
        
        return response()->json([
            'success' => false
        ], 409);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!'
        ], 200);
    }
}
