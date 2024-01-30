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
        $title = ucwords($request->query('title'));
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 12);

        $moviesQuery = Movie::select('id', 'title', 'poster', 'year', 'plot')
                            ->orderBy('year', 'desc');
        
        if (!empty($title)) {
            $moviesQuery->where('title', 'LIKE', '%' . $title . '%');
        }
        
        $movies = $moviesQuery->paginate($limit, ['*'], 'page', $page);
        
        if ($movies->isEmpty()) {
            return response()->json(["status" => "Fail", "message" => "Data failed to get"], 404);
        }
        
        return response()->json(["status" => "Success", "data" => $movies], 200);
    }

    public function show($id)
    {
        $movie = Movie::select('title', 'poster', 'year', 'trailer', 'released', 'runtime', 'genre', 'director', 'writer', 'actors', 'plot', 'torrent')
                    ->find($id);
                        
        if (!$movie) {
            return response()->json(["status" => "Fail", "message" => "Data failed to get"], 404);
        }
        
        return response()->json(["status" => "Success", "data" => $movie], 200);
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

    
        if ($movie) {
            return response()->json(["status" => "Success", "message" => "Data stored successfully", "data" => $movie], 201);
        }

        return response()->json(["status" => "Fail", "message" => "Data failed to store"], 500);
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
            return response()->json($validator->errors(), 422);
        }

        $movie = Movie::where('id', $id)->update([
            'title' => $request->title,
            'year' => $request->year,
            'trailer' => $request->trailer,
            'torrent' => $request->torrent,
        ]);

        if ($movie) {
            return response()->json(["status" => "Success", "message" => "Data updated successfully"], 200);
        }

        return response()->json(["status" => "Fail", "message" => "Data failed to update"], 404);
    }

    public function destroy($id)
    {
        $deleted = Movie::destroy($id);

        if ($deleted) {
            return response()->json([ "status" => "Success", "message" => "Data deleted successfully"], 200);
        }

        return response()->json(["status" => "Fail", "message" => "Data failed to delete"], 404);
    }
}
