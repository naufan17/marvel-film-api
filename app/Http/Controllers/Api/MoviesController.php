<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    public function index(Request $request)
    {
        $title = ucwords($request->query('title'));

        if(empty($title)){
            $movie = Movie::select('id', 'title', 'poster', 'year', 'plot')
                        ->orderBy('year', 'desc')
                        ->get();

            if($movie->isEmpty()){
                return response()->json([
                    "status" => "fail",
                    "message" => "data failed to get"
                ], 404);
                }else{
                return response()->json([
                    "status" => "success",
                    "data" => $movie
                ], 200);
            }
        } else {
            $movie = Movie::select('title', 'poster', 'year', 'trailer', 'released', 'runtime', 'genre', 'director', 'writer', 'actors', 'plot', 'torrent')
                        ->where('title', 'LIKE', '%'.$title.'%')
                        ->orderBy('year', 'desc')
                        ->get();

            if($movie->isEmpty()){
                return response()->json([
                    "status" => "fail",
                    "message" => "data failed to get"
                ], 404);
                }else{
                return response()->json([
                    "status" => "success",
                    "data" => $movie
                ], 200);
            }

        }
    }

    public function show($id)
    {
        $movie = Movie::select('title', 'poster', 'year', 'trailer', 'released', 'runtime', 'genre', 'director', 'writer', 'actors', 'plot', 'torrent')
                    ->where('id', $id)
                    ->get();
                        
        if($movie->isEmpty()){
            return response()->json([
                "status" => "fail",
                "message" => "data failed to get"
            ], 404);
        }else{
            return response()->json([
                "status" => "success",
                "data" => $movie
            ], 200);
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

        if($movie){
            return response()->json([
                "status" => "success",
                "message" => "data stored successfully",
                "data" => $movie
            ], 201);
        }else{
            return response()->json([
                "status" => "fail",
                "message" => "data failed to store"
            ], 500);
        }
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

        if($movie){
            return response()->json([
                "status" => "success",
                "message" => "data updated successfully"
            ], 200);
        }else{
            return response()->json([
                "status" => "fail",
                "message" => "data failed to update"
            ], 404);
        }
    }

    public function destroy($id)
    {
        $movie = Movie::where('id', $id)->delete();

        if($movie){
            return response()->json([
                "status" => "success",
                "message" => "data deleted successfully"
            ], 200);
        }else{
            return response()->json([
                "status" => "fail",
                "message" => "data failed to delete"
            ], 404);
        }
    }
}
