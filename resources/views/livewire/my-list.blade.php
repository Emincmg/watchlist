<div>
    <!-- ======= My List Section ======= -->
    <section id="myList" class="myList section-bg">
        <div class="container mt-5">
            <nav wire:ignore>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-will-read-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-will-read" type="button" role="tab" aria-controls="nav-will-read"
                            aria-selected="true">Watchlist
                    </button>
                    <div class="filters-wrapper d-flex ml-auto">
                        <button class="custom-button negative" id="sortByButton"><i class='bx bx-sort'
                                                                                    style="font-size: 0.8rem;"></i>
                        </button>
                        <button class="custom-button negative" id="filterButton"><i class='bx bx-search-alt-2'
                                                                                    style="font-size: 0.8rem;"></i>
                        </button>
                    </div>
                </div>
            </nav>
            <div class="search-container mt-3" id="filterDiv" wire:ignore>
                <form class="search-form" onkeydown="return event.key != 'Enter';" style="position: unset">
                    <button>
                        <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"
                             aria-labelledby="search">
                            <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                                  stroke="currentColor" stroke-width="1.333" stroke-linecap="round"
                                  stroke-linejoin="round"></path>
                        </svg>
                    </button>
                    <input wire:model.live="search" class="input" placeholder="..."
                           required="" type="text">
                    <button class="reset" type="reset">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </form>
            </div>
            <div class="mt-3 mb-3" id="sortByOptions" wire:ignore>
                <div class="form-check form-check-inline">
                    <input class="form-check-input selected" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                           value="original_title" wire:click="sortBy('original_title')">
                    <label class="form-check-label" for="inlineRadio1">Title</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                           value="vote_average" wire:click="sortBy('vote_average')">
                    <label class="form-check-label" for="inlineRadio3">Rating</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4"
                           value="release_date" wire:click="sortBy('release_date')">
                    <label class="form-check-label" for="inlineRadio4">Date</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5"
                           value="runtime" wire:click="sortBy('runtime')">
                    <label class="form-check-label" for="inlineRadio5">Minutes</label>
                </div>
                <div class="form-check form-check-inline">
                    <button class="custom-button negative" wire:click="sortDirection('ASC')" value="ASC"><i
                            class='bx bx-chevron-up'></i></button>
                    <button class="custom-button negative" wire:click="sortDirection('DESC')" value="DESC"><i
                            class='bx bx-chevron-down'></i></button>
                </div>
            </div>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-will-read" role="tabpanel"
                     aria-labelledby="nav-will-read-tab" tabindex="0" wire:ignore.self>
                    <div class="myList-list mt-3">
                        <ul>
                            @forelse($movies as $movie)
                                <li data-aos="fade-up d-flex">
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
                                            @if(isset($movie['imdb_id']) && !empty($movie['imdb_id']))
                                                <a href="https://www.imdb.com/title/{{$movie['imdb_id']}}"
                                                   class="list-store-link"><i class='bx bxl-imdb'></i>IMDb</a>
                                            @endif
                                            <a data-bs-toggle="collapse" class="collapse title"
                                               data-bs-target="#myList-list-{{$loop->iteration}}">@if(isset($movie['original_title']) && !empty($movie['original_title']))
                                                    {{$movie['original_title']}}
                                                @endif
                                            </a>
                                            @if(isset($movie['vote_average']) && !empty($movie['vote_average']))
                                                <div class="rateInfo">
                                                    <h4><strong
                                                            style="color:#052E45 ">{{number_format($movie['vote_average'], 1) }}
                                                            /10</strong>
                                                    </h4>
                                                </div>
                                            @endif
                                            <div class="del-button-wrapper">
                                                <button class="custom-button negative" title="Delete movie"
                                                        id="deleteButton" data-id="{{$movie['id']}}">
                                                    <i class='bx bx-x' style='font-size: 0.8rem'></i></button>
                                            </div>
                                            @if(isset($movie['genre_ids']) && !empty($movie['genre_ids']))
                                                    <p><strong>Categories :</strong>
                                                    @foreach($movie['genre_ids'] as $genre)
                                                        {{$genre['name']}}{{$loop->last ? '.' : ','}}
                                                @endforeach
                                                    </p>
                                            @endif
                                            @if(isset($movie['release_date']) && !empty($movie['release_date']))
                                                <p><strong>Release Date :</strong> {{$movie['release_date']}}
                                                </p>
                                            @endif
                                            @if(isset($movie['runtime']) && !empty($movie['runtime']))
                                                <p><strong>{{$movie['runtime']}} </strong> Minutes
                                            @endif
                                            @if(isset($movie['overview']) && !empty($movie['overview']))
                                                <p><strong>Info
                                                        : </strong>{{$movie['overview']}}</p>
                                            @endif
                                            <div id="myList-list-{{$loop->iteration}}" class="mb-5"
                                                 data-bs-parent=".myList-list">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <div class="empty-container">
                                    <h2>No movies.</h2>
                                </div>
                            @endforelse
                            {{$movies->links('layouts.pagination-links')}}
                            <div class="col mt-4">
                                <div class="container portfolio-insert">
                                    <div class="col-md-6 icon-box">
                                        <div class="d-flex flex-column">
                                            <a href="{{route('search')}}"><i class="bx bx-plus rounded-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--    <!-- ======= Counts Section ======= -->--}}
    {{--    <section id="counts" class="counts section-bg">--}}
    {{--        <div class="container">--}}

    {{--            <div class="row no-gutters">--}}

    {{--                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">--}}
    {{--                    <div class="count-box">--}}
    {{--                        <i class='bx bx-book-open'></i>--}}
    {{--                        <span data-purecounter-start="0" data-purecounter-end="{{$booksCount}}"--}}
    {{--                              data-purecounter-duration="1" class="purecounter"></span>--}}
    {{--                        <p><strong>Books</strong></p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">--}}
    {{--                    <div class="count-box">--}}
    {{--                        <i class='bx bx-user-pin'></i>--}}
    {{--                        <span data-purecounter-start="0" data-purecounter-end="{{$authorsCount}}"--}}
    {{--                              data-purecounter-duration="1" class="purecounter"></span>--}}
    {{--                        <p><strong>Authors</strong></p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">--}}
    {{--                    <div class="count-box">--}}
    {{--                        <i class='bx bx-objects-horizontal-left'></i>--}}
    {{--                        <span data-purecounter-start="0" data-purecounter-end="{{$categoriesCount}}"--}}
    {{--                              data-purecounter-duration="1"--}}
    {{--                              class="purecounter"></span>--}}
    {{--                        <p><strong>Categories.</strong></p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">--}}
    {{--                    <div class="count-box">--}}
    {{--                        <i class='bx bx-notepad' ></i>--}}
    {{--                        <span data-purecounter-start="0" data-purecounter-end="{{$notesCount}}" data-purecounter-duration="1"--}}
    {{--                              class="purecounter"></span>--}}
    {{--                        <p><strong>Book notes</strong></p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section><!-- End Counts Section -->--}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sortByOptions = document.getElementById('sortByOptions');
            const sortByButton = document.getElementById('sortByButton');
            const filterDiv = document.getElementById('filterDiv');
            const filterButton = document.getElementById('filterButton');


            sortByOptions.style.display = 'none';
            if (filterDiv)
                filterDiv.style.display = 'none';


            sortByButton.addEventListener('click', function () {

                if (sortByOptions.style.display === 'none') {
                    sortByOptions.style.display = 'block';
                } else {
                    sortByOptions.style.display = 'none';
                    $(this).addClass('hide');
                }
            });
            filterButton.addEventListener('click', function () {

                if (filterDiv.style.display === 'none') {
                    filterDiv.style.display = 'block';
                } else {
                    filterDiv.style.display = 'none';
                }
            });
        });
    </script>
</div>

