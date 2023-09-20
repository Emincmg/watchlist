<div>
    <section id="myList" class="myList section-bg" style="padding: 20px 0 60px 0;">
        <div class="container">
            <div class="myList-list">
                <ul>
                    <div class="search-container" style="margin-bottom: 2rem;">
                        <div class="search-form">
                            <button>
                                <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"
                                     aria-labelledby="search">
                                    <path
                                        d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                                        stroke="currentColor" stroke-width="1.333" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </button>
                            <input wire:model.live="search" class="input" placeholder="..."
                                   type="text">
                        </div>
                    </div>
                    @isset($movieData)
                        @forelse($movieData as $movie)
                            <li data-aos="fade-up d-flex" wire:loading.remove>
                                <div class="row">
                                    <div class="col-md-2 img-container collapse" data-bs-toggle="collapse"
                                         data-bs-target="#myList-list-{{$loop->iteration}}">
                                        @if(isset($movie['poster_path']) && !empty($movie['poster_path']))
                                            <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}" alt=""
                                                 class="img-fluid">
                                        @endif
                                    </div>
                                    <div class="col-md-10 ">
                                        <a data-bs-toggle="collapse" class="collapse title"
                                           data-bs-target="#myList-list-{{$loop->iteration}}">@if(isset($movie['original_title']) && !empty($movie['original_title']))
                                                {{$movie['original_title']}}
                                            @endif
                                            <i class="bx bx-chevron-down icon-show"></i><i
                                                class="bx bx-chevron-up icon-close"></i></a>
                                        @if(isset($movie['vote_average']) && !empty($movie['vote_average']))
                                            <div class="search-rateInfo">
                                                <h4><strong
                                                        style="color:#052E45 ">{{number_format($movie['vote_average'], 1) }}
                                                        /10</strong>
                                                </h4>
                                            </div>
                                        @endif
                                        @if(isset($movie['genre_ids']) && !empty($movie['genre_ids']))
                                            <p><strong>Categories
                                                    :</strong>

                                                @foreach($genres as $genre)
                                                    @foreach($movie['genre_ids'] as $genre_id)
                                                        @if($genre_id == $genre['id'])
                                                            {{$genre['name']}}{{$loop->last ? '.' : ','}}
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </p>
                                        @endif
                                        @if(isset($movie['release_date']) && !empty($movie['release_date']))
                                            <p><strong>Release Date :</strong> {{$movie['release_date']}}
                                            </p>
                                        @endif
                                        @if(isset($movie['overview']) && !empty($movie['overview']))
                                            <p><strong>Info
                                                    : </strong>{{strip_tags($movie['overview'])}}
                                            </p>
                                        @endif
                                        <div class="read-links">
                                            <button class="custom-button positive" title="Add to movie list"
                                                    id="add-button" data-id="{{$movie['id']}}"><i
                                                    class='bx bx-plus'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <h1 class="mb-5 text-center" style="color: #0A5D80; font-weight: bold">Trending movies</h1>
                            @isset($popular)
                                @foreach($popular as $movie)
                                    <li data-aos="fade-up d-flex" wire:loading.remove>
                                        <div class="row">
                                            <div class="col-md-2 img-container collapse" data-bs-toggle="collapse"
                                                 data-bs-target="#myList-list-{{$loop->iteration}}">
                                                @if(isset($movie['poster_path']) && !empty($movie['poster_path']))
                                                    <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}"
                                                         alt=""
                                                         class="img-fluid">
                                                @endif
                                            </div>
                                            <div class="col-md-10 ">
                                                <a data-bs-toggle="collapse" class="collapse title"
                                                   data-bs-target="#myList-list-{{$loop->iteration}}">@if(isset($movie['original_title']) && !empty($movie['original_title']))
                                                        {{$movie['original_title']}}
                                                    @endif
                                                    <i class="bx bx-chevron-down icon-show"></i><i
                                                        class="bx bx-chevron-up icon-close"></i></a>
                                                @if(isset($movie['vote_average']) && !empty($movie['vote_average']))
                                                    <div class="search-rateInfo">
                                                        <h4><strong
                                                                style="color:#052E45 ">{{number_format($movie['vote_average'], 1) }}
                                                                /10</strong>
                                                        </h4>
                                                    </div>
                                                @endif
                                                @if(isset($movie['genre_ids']) && !empty($movie['genre_ids']))
                                                    <p><strong>Categories
                                                            :</strong>

                                                        @foreach($genres as $genre)
                                                            @foreach($movie['genre_ids'] as $genre_id)
                                                                @if($genre_id == $genre['id'])
                                                                    {{$genre['name']}}{{$loop->last ? '.' : ','}}
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </p>
                                                @endif
                                                @if(isset($movie['release_date']) && !empty($movie['release_date']))
                                                    <p><strong>Release Date :</strong> {{$movie['release_date']}}
                                                    </p>
                                                @endif
                                                @if(isset($movie['overview']) && !empty($movie['overview']))
                                                    <p><strong>Info
                                                            : </strong>{{strip_tags($movie['overview'])}}
                                                    </p>
                                                @endif
                                                <div class="read-links">
                                                    <button class="custom-button positive" title="Add to movie list"
                                                            id="add-button" data-id="{{$movie['id']}}"><i
                                                            class='bx bx-plus'></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endisset
                        @endforelse
                    @endisset
                    <div wire:loading.block wire:target="search">

                        <li class="placeholder-wrapper">

                            <div class="col-md-2">
                                <div class="placeholder-img section-bg"></div>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                </div>

                                <div class="row">
                                </div>
                                <div class="row">
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </li>
                        <li class="placeholder-wrapper">

                            <div class="col-md-2">
                                <div class="placeholder-img section-bg"></div>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                </div>

                                <div class="row">
                                </div>
                                <div class="row">
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </li>
                        <li class="placeholder-wrapper">

                            <div class="col-md-2">
                                <div class="placeholder-img section-bg"></div>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                </div>

                                <div class="row">
                                </div>
                                <div class="row">
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </li>
                        <li class="placeholder-wrapper">

                            <div class="col-md-2">
                                <div class="placeholder-img section-bg"></div>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                </div>

                                <div class="row">
                                </div>
                                <div class="row">
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </li>
                        <li class="placeholder-wrapper">

                            <div class="col-md-2">
                                <div class="placeholder-img section-bg"></div>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                </div>

                                <div class="row">
                                </div>
                                <div class="row">
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </li>
                        <li class="placeholder-wrapper">

                            <div class="col-md-2">
                                <div class="placeholder-img section-bg"></div>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                </div>

                                <div class="row">
                                </div>
                                <div class="row">
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </li>

                    </div>

                </ul>
            </div>
        </div>
    </section>
</div>
