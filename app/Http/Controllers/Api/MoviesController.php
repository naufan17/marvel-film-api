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
        $movie = Movie::select('id', 'title', 'poster', 'year', 'plot')
                        ->orderBy('year', 'desc')
                        ->get();

        if($movie->isEmpty()){
            return new MoviesResource(false, 'Data failed to get', null);
        }else{
            return new MoviesResource(true, 'Data has been obtained', $movie);    
        }
    }

    public function show($id)
    {
        $movie = Movie::select('title', 'poster', 'year', 'trailer', 'released', 'runtime', 'genre', 'director', 'writer', 'actors', 'plot', 'torrent')
                        ->where('id', $id)->get();
                        
        if($movie->isEmpty()){
            return new MoviesResource(false, 'Data failed to get', null);
        }else{
            return new MoviesResource(true, 'Data has been obtained', $movie);    
        }
    }

    public function search($title)
    {
        $title = ucwords($title);
        $movie = Movie::select('title', 'poster', 'year', 'trailer', 'released', 'runtime', 'genre', 'director', 'writer', 'actors', 'plot', 'torrent')
                        ->where('title', 'LIKE', '%'.$title.'%')->get();
                        
        if($movie->isEmpty()){
            return new MoviesResource(false, 'Data failed to get', null);
        }else{
            return new MoviesResource(true, 'Data has been obtained', $movie);    
        }
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
            // return response()->json($validator->errors(), 422);
            return new MoviesResource(false, 'Data failed to store', null);
        }

        $response = Http::get('http://www.omdbapi.com', [
            'apikey' => '7fd0d56',
            't' => $request->title,
            'y' => $request->year,
        ]);

        $data = json_decode($response);

        $movie = Movie::create([
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

        return new MoviesResource(true, 'Data stored successfully', $movie);    
    }

    public function update(Request $request, Movie $movie)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'year' => 'required|string',
            'trailer' => 'required|string',
            'torrent' => 'required|string',
        ]);

        if($validator->fails()) {
            // return response()->json($validator->errors(), 422);
            return new MoviesResource(false, 'Data failed to store', null);
        }

        $movie->update([
            'title' => $request->title,
            'year' => $request->year,
            'trailer' => $request->trailer,
            'torrent' => $request->torrent,
        ]);

        return new MoviesResource(true, 'Data updated successfully', null);    
    }

    public function destroy($id)
    {
        $movie = Movie::where('id', $id)->delete();

        return new MoviesResource(true, 'Data deleted successfully', $movie);    
    }
}
