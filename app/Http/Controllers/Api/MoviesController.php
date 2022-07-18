<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MoviesResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::select('title', 'posters', 'year')->get();

        return new MoviesResource(true, 'List data film', $movies);    
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'posters' => 'required|string',
            'year' => 'required',
            'trailer' => 'required|string',
            'released' => 'required|date',
            'runtime' => 'required|string',
            'genre' => 'required|string',
            'director' => 'required|string',
            'writer' => 'required|string',
            'actors' => 'required|string',
            'plot' => 'required|string',
            'torrent' => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $movies = Movie::create([
            'title' => $request->title,
            'year' => $request->year,
            'released' => $request->released,
            'runtime' => $request->runtime,
            'genre' => $request->genre,
            'director' => $request->director,
            'writer' => $request->writer,
            'actors' => $request->actors,
            'plot' => $request->plot,
            'posters' => $request->posters,
            'torrent' => $request->torrent,
        ]);

        return new MoviesResource(true, 'Data berhasil ditambahkan', $movies);   
    }

    public function show(Movie $movie)
    {
        return new MoviesResource(true, 'List detail film', $movie);
    }
}
