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

        if($movies->isEmpty()){
            return new MoviesResource(false, 'Data failed to get', null);
        }else{
            return new MoviesResource(true, 'Data has been obtained', $movies);    
        }
    }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'title' => 'required|string',
    //         'year' => 'required|string',
    //         'trailer' => 'required|string',
    //         'torrent' => 'required|string',
    //     ]);

    //     if($validator->fails()) {
    //         return response()->json($validator->errors(), 422);
    //     }

    //     $response = Http::get('http://www.omdbapi.com', [
    //         'apikey' => '7fd0d56',
    //         't' => $request->title,
    //         'y' => $request->year,
    //     ]);

    //     $data = json_decode($response);

    //     $movies = Movie::create([
    //         'title' => $data->Title,
    //         'poster' => $data->Poster,
    //         'year' => $request->year,
    //         'trailer' => $request->trailer,
    //         'released' => $data->Released,
    //         'runtime' => $data->Runtime,
    //         'genre' => $data->Genre,
    //         'director' => $data->Director,
    //         'writer' => $data->Writer,
    //         'actors' => $data->Actors,
    //         'plot' => $data->Plot,
    //         'torrent' => $request->torrent,
    //     ]);

    //     if($movies->isEmpty()){
    //         return new MoviesResource(false, 'Data failed to store', null);
    //     }else{
    //         return new MoviesResource(true, 'Data stored successfully', $movies);    
    //     }
    // }

    public function show($title)
    {
        $movies = Movie::select('title', 'poster', 'year', 'trailer', 'released', 'runtime', 'genre', 'director', 'writer', 'actors', 'plot', 'torrent')
                        ->where('title', 'LIKE', '%'.$title.'%')->get();
                        
        if($movies->isEmpty()){
            return new MoviesResource(false, 'Data failed to get', null);
        }else{
            return new MoviesResource(true, 'Data has been obtained', $movies);    
        }
    }

    // public function destroy($id)
    // {
    //     $movies = Movie::where('id', $id)->delete();

    //     if($movies->isEmpty()){
    //         return new MoviesResource(false, 'Data failed to delete', null);
    //     }else{
    //         return new MoviesResource(true, 'Data deleted successfully', $movies);    
    //     }
    // }
}
