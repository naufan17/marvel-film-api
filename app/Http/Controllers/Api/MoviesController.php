<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;


class MoviesController extends Controller
{
    public function index(Request $request)
    {        
        $title = (string) ucwords($request->query('title', ''));
        $page = (int) $request->query('page', 1);
        $limit = (int) $request->query('limit', 12);

        $movies = Movie::select('id', 'title', 'poster', 'year', 'plot')
            ->when($title, function ($query, $title) {
                $query->where('title', 'LIKE', '%' . ucwords($title) . '%');
            })
            ->orderBy('year', 'desc')
            ->paginate($limit, ['*'], 'page', $page);
        
        if ($movies->isEmpty()) {
            return response()->json([
                "status" => "Not Found", 
                "message" => "No movies found matching your criteria"
            ], 404);
        }
        
        return response()->json([
            "status" => "OK", 
            "message" => "Movies retrived successfully",
            "data" => $movies
        ], 200);
    }

    public function show($id)
    {
        $movie = Movie::select('title', 'poster', 'year', 'trailer', 'released', 'runtime', 'genre', 'director', 'writer', 'actors', 'plot', 'torrent')
                    ->find($id);
                        
        if (!$movie) {
            return response()->json([
                "status" => "Not Found", 
                "message" => "Data failed to retrived"
            ], 404);
        }
        
        return response()->json([
            "status" => "OK", 
            "message" => "Data retrived successfully",
            "data" => $movie
        ], 200);
    }

    public function store(Request $request)
    {
        $URL_OMDB = env('URL_OMDB', 'http://www.omdbapi.com');
        $API_KEY_OMDB = env('API_KEY_OMDB', '7fd0d56');

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'year' => 'required|string',
            'trailer' => 'required|string',
            'torrent' => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 'Unprocessable content', 
                'message' => 'Invalid data request body',
                'error' => $validator->errors()
            ], 422);       
        }
        
        $response = Http::get($URL_OMDB, [
            'apikey' => $API_KEY_OMDB,
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

        if (!$movie) {
            return response()->json([
                "status" => "Error", 
                "message" => "Movie failed to store"
            ], 500);
        }

        return response()->json([
            "status" => "Created", 
            "message" => "Movie stored successfully", 
            "data" => $movie
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'year' => 'required|string',
            'trailer' => 'required|string',
            'torrent' => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 'Unprocessable content', 
                'message' => 'Invalid data request body',
                'error' => $validator->errors()
            ], 422);       
        }

        $movie = Movie::where('id', $id)->update([
            'title' => $request->title,
            'year' => $request->year,
            'trailer' => $request->trailer,
            'torrent' => $request->torrent,
        ]);

        if (!$movie) {
            return response()->json([
                "status" => "Error", 
                "message" => "Movie failed to update"
            ], 500);
        }

        return response()->json([
            "status" => "OK", 
            "message" => "Movie updated successfully"
        ], 200);
    }

    public function destroy($id)
    {
        $deleted = Movie::destroy($id);

        if (!$deleted) {
            return response()->json([
                "status" => "Not Found", 
                "message" => "Movie not found"
            ], 404);
        }

        return response()->json([
            "status" => "OK", 
            "message" => "Movie deleted successfully"
        ], 200);
    } 
}
