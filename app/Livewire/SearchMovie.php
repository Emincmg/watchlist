<?php

namespace App\Livewire;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class SearchMovie extends Component
{
    use WithPagination;

    /**
     * @var string
     */
    #[Url(history: true)]
    public string $search = '';


    /**
     * Renders the component
     *
     * @throws GuzzleException
     */
    public function render(): View
    {
        $movieData = [];
        $genres = $this->getGenreData();
        $popular = $this->getPopularMovies();

        if ($this->search) {
            $response = $this->sendRequest('https://api.themoviedb.org/3/search/movie?query=' . $this->search .
                '&api_key=0779242003e91c8125bd373a517cebd7', 'GET', ['decode_content' => 'gzip', 'Connection' => 'keep-alive']);
            $movies = json_decode($response->getBody()->getContents(), 1);
            $movieData = $movies['results'];
        }
        return view('livewire.search-movie', compact('movieData', 'genres', 'popular'));
    }


    /**
     * Gets popular movies from TMDB API
     *
     * @return mixed
     * @throws GuzzleException
     */
    private function getPopularMovies(): mixed
    {
        $response = $this->sendRequest('https://api.themoviedb.org/3/movie/popular?language=en-US&page=1', 'GET',
            ['headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIwNzc5MjQyMDAzZTkxYzgxMjViZDM3M2E1MTdjZWJkNyIsInN1YiI6IjY1MDg4MGM0ODI2MWVlMDExYzUzZDhlZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.7XsDG0aAQy_s11CPK7UgiE1-qfKjg0MfCtSQnwcN1sw',
                'accept' => 'application/json',
            ]]);
        $popularData = json_decode($response->getBody()->getContents(), 1);

        return $popularData['results'];
    }


    /**
     * Gets genre data from TMDB API
     *
     * @return mixed
     * @throws GuzzleException
     */
    private function getGenreData(): mixed
    {
        $response = $this->sendRequest('https://api.themoviedb.org/3/genre/movie/list?language=en', 'GET',
            ['headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIwNzc5MjQyMDAzZTkxYzgxMjViZDM3M2E1MTdjZWJkNyIsInN1YiI6IjY1MDg4MGM0ODI2MWVlMDExYzUzZDhlZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.7XsDG0aAQy_s11CPK7UgiE1-qfKjg0MfCtSQnwcN1sw',
                'accept' => 'application/json',
            ]]);
        $genreData = json_decode($response->getBody()->getContents(), 1);
        return $genreData['genres'];
    }


    /**
     * Sends an HTTP Request via GuzzleHttp
     *
     * @param string $url
     * @param string $method
     * @param array $parameters
     * @return \Psr\Http\Message\ResponseInterface
     * @throws GuzzleException
     */
    public function sendRequest(string $url, string $method, array $parameters): \Psr\Http\Message\ResponseInterface
    {
        $client = new Client();
        return $client->request($method, $url, $parameters);
    }
}
