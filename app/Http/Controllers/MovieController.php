<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MovieController extends Controller
{
    /**
     * Method user() returns a User object while method guest() returns boolean, therefore it is either an object or "false".
     *
     * @var Authenticatable
     */
    private Authenticatable $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user() ?? Auth::guest();
            return $next($request);
        });

    }

    /**
     * Checks if a movie exists in the users list.
     *
     * @param $tmdb_id
     * @return JsonResponse
     */
    public function checkMovieExists ($tmdb_id) : JsonResponse
    {

        $movie = $this->user->movies()->where('tmdb_id', $tmdb_id)->first();
        if ($movie) {
            abort(409, 'Movie already exists in user list.');
        }
        return response()->json(['message' => 'Movie checked',204]);
    }

    /**
     * Inserts movie to the user list.
     *
     * @param $tmdb_id
     * @return JsonResponse
     */
    public function insert($tmdb_id) : JsonResponse
    {
        $movieData = $this->getMovieData($tmdb_id);

        $this->user->movies()->save($movieData);

        return response()->json(['message' => 'Movie added',], 201);
    }

    /**
     * Deletes movie from users list.
     *
     * @param $tmdb_id
     * @return JsonResponse
     */
    public function delete($tmdb_id) : JsonResponse
    {
        Movie::destroy($tmdb_id);
        return response()->json(['message' => 'Movie deleted'],204);
    }


    /**
     * Returns the movie data from TMDB API
     *
     * @param $tmdb_id
     * @return Movie
     * @throws GuzzleException
     */
    private function getMovieData($tmdb_id) : Movie
    {
        $client = new Client();

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/'.$tmdb_id.'language=en-US', [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIwNzc5MjQyMDAzZTkxYzgxMjViZDM3M2E1MTdjZWJkNyIsInN1YiI6IjY1MDg4MGM0ODI2MWVlMDExYzUzZDhlZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.7XsDG0aAQy_s11CPK7UgiE1-qfKjg0MfCtSQnwcN1sw',
                'accept' => 'application/json',
            ],
        ]);
        $movie = json_decode($response->getBody()->getContents(), true);

        return new Movie([
            'tmdb_id' => $movie['id'] ?? null,
            'original_title' => $movie['original_title'] ?? null,
            'overview' => $movie['overview'] ?? null,
            'genre_ids' => $movie['genres'] ?? null,
            'poster_path' => $movie['poster_path'] ?? null,
            'release_date' => $movie['release_date'] ?? null,
            'runtime' => $movie['runtime'] ?? null,
            'vote_average' => $movie['vote_average'] ?? null,
            'imdb_id' => $movie['imdb_id'] ?? null,
        ]);
    }
}
