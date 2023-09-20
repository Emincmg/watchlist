<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $casts =
        [
            'genre_ids'=>'array',
        ];

    protected $fillable =
        [
            'tmdb_id',
            'original_title',
            'overview',
            'genre_ids',
            'poster_path',
            'release_date',
            'runtime',
            'vote_average',
            'imdb_id',
        ];
}
