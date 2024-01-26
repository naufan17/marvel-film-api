<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    public function index(Request $request)
    {
        $title = ucwords($request->query('title'));

        $moviesQuery = Movie::select('id', 'title', 'poster', 'year', 'plot')
                            ->orderBy('year', 'desc');
        
        if (!empty($title)) {
            $moviesQuery->where('title', 'LIKE', '%' . $title . '%');
        }
        
        $movies = $moviesQuery->get();
        
        if ($movies->isEmpty()) {
            return response()->json(["status" => "fail", "message" => "data failed to get"], 404);
        }
        
        return response()->json(["status" => "success", "data" => $movies], 200);
        
    }

    public function show($id)
    {
        $movie = Movie::select('title', 'poster', 'year', 'trailer', 'released', 'runtime', 'genre', 'director', 'writer', 'actors', 'plot', 'torrent')
                    ->find($id);
                        
        if (!$movie) {
            return response()->json(["status" => "fail", "message" => "data failed to get"], 404);
        }
        
        return response()->json(["status" => "success", "data" => $movie], 200);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|string',
            'year' => 'required|string',
            'trailer' => 'required|string',
            'torrent' => 'required|string',
        ]);

        $response = Http::get('http://www.omdbapi.com', [
            'apikey' => '7fd0d56',
            't' => $validator['title'],
            'y' => $validator['year'],
        ]);

        $data = json_decode($response);

        if (isset($data['Title'])) {
            $movie = Movie::create([
                'title' => $data['Title'],
                'poster' => $data['Poster'],
                'year' => $validator['year'],
                'trailer' => $validator['trailer'],
                'released' => $data['Released'],
                'runtime' => $data['Runtime'],
                'genre' => $data['Genre'],
                'director' => $data['Director'],
                'writer' => $data['Writer'],
                'actors' => $data['Actors'],
                'plot' => $data['Plot'],
                'torrent' => $validator['torrent'],
            ]);
        
            if ($movie) {
                return response()->json(["status" => "success", "message" => "data stored successfully", "data" => $movie], 201);
            }
        }        

        return response()->json(["status" => "fail", "message" => "data failed to store"], 500);
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'title' => 'required|string',
            'year' => 'required|string',
            'trailer' => 'required|string',
            'torrent' => 'required|string',
        ]);

        $movie = Movie::where('id', $id)->update([
            'title' => $validator['title'],
            'year' => $validator['year'],
            'trailer' => $validator['trailer'],
            'torrent' => $validator['torrent'],
        ]);

        if ($movie) {
            return response()->json(["status" => "success", "message" => "data updated successfully"], 200);
        }

        return response()->json(["status" => "fail", "message" => "data failed to update"], 404);
    }

    public function destroy($id)
    {
        $deleted = Movie::destroy($id);

        if ($deleted) {
            return response()->json([ "status" => "success", "message" => "data deleted successfully"], 200);
        }

        return response()->json(["status" => "fail", "message" => "data failed to delete"], 404);
    }
}
