<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('tmdb_id')->nullable();
            $table->string('original_title')->nullable();
            $table->string('overview',5000)->nullable();
            $table->json('genre_ids')->nullable();
            $table->string('poster_path')->nullable();
            $table->string('release_date')->nullable();
            $table->string('runtime')->nullable();
            $table->string('vote_average')->nullable();
            $table->string('imdb_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
