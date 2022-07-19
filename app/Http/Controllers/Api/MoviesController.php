<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MoviesResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::select('title', 'poster', 'year', 'plot')
                        ->orderBy('year', 'desc')
                        ->get();

        return new MoviesResource(true, 'Data has been obtained', $movies);    
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'year' => 'required|string',
            'trailer' => 'required|string',
            'torrent' => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $response = Http::get('http://www.omdbapi.com', [
            'apikey' => '7fd0d56',
            't' => $request->title,
            'y' => $request->year,
        ]);

        $data = json_decode($response);

        $movies = Movie::create([
            'title' => $data->Title,
            'poster' => $data->Poster,
            'year' => $request->year,
            'trailer' => $request->trailer,
            'released' => $data->Released,
            'runtime' => $data->Runtime,
            'genre' => $data->Genre,
            'director' => $data->Director,
            'writer' => $data->Writer,
            'actors' => $data->Actors,
            'plot' => $data->Plot,
            'torrent' => $request->torrent,
        ]);

        return new MoviesResource(true, 'Data added successfully', $movies);   
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'title' => 'required|string',
            'year' => 'required|string',
            'trailer' => 'required|string',
            'torrent' => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $response = Http::get('http://www.omdbapi.com', [
            'apikey' => '7fd0d56',
            't' => $request->title,
            'y' => $request->year,
        ]);

        $data = json_decode($response);

        $movies = Movie::where('id', $request->id)->update([
            'title' => $data->Title,
            'poster' => $data->Poster,
            'year' => $data->Year,
            'trailer' => $request->trailer,
            'released' => $data->Released,
            'runtime' => $data->Runtime,
            'genre' => $data->Genre,
            'director' => $data->Director,
            'writer' => $data->Writer,
            'actors' => $data->Actors,
            'plot' => $data->Plot,
            'torrent' => $request->torrent,
        ]);

        return new MoviesResource(true, 'Data added successfully', $movies);   
    }

    public function show($id)
    {
        $movies = Movie::select('title', 'poster', 'year', 'trailer', 'released', 'runtime', 'genre', 'director', 'writer', 'actors', 'plot', 'torrent')
                        ->where('id', $id)->get();
                        
        return new MoviesResource(true, 'data was successfully obtained based on id', $movies);
    }
}
