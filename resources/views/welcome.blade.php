<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

        <title>Documentation Marvel API</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <!-- <script src="https://cdn.tailwindcss.com"></script> -->

        <link href="/css/app.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased ">
        <div class="relative bg-gray-800">
            <div class="flex sm:flex-row flex-col">
                <div class="sm:w-72 sm:h-screen h-auto w-full">
                    <div class="flex items-center justify-start p-2 mx-6 mt-10">
                        <span class="text-gray-300 text-xl sm:mx-4 mx-2 sm:text-2xl font-bold">
                            Documentation
                        </span>
                    </div>
                    <nav class="sm:mt-10 mt-5 px-6 ">
                        <a class="flex items-center p-2 sm:my-2 my-1 transition-colors duration-500 text-gray-400 hover:translate-x-1" href="#get_all">
                            <span class="sm:mx-4 mx-2 text-base sm:text-lg font-normal">
                                Get all movies
                            </span>
                        </a>
                        <a class="flex items-center p-2 sm:my-2 my-1 transition-colors duration-500 text-gray-400 hover:translate-x-1" href="#get_by_id">
                            <span class="sm:mx-4 mx-2 text-base sm:text-lg font-normal">
                                Get movies by id
                            </span>
                        </a>
                        <a class="flex items-center p-2 sm:my-2 my-1 transition-colors duration-500 text-gray-400 hover:translate-x-1" href="#search_by_title">
                            <span class="sm:mx-4 mx-2 text-base sm:text-lg font-normal">
                                Search movies by title
                            </span>
                        </a>
                    </nav>
                </div>
                <div class="flex-auto">
                    <div class="sm:p-20 p-10">
                        <div class="max-w-3xl mb-10">
                            <h2 class="max-w-lg mb-6 text-xl font-bold tracking-tight text-gray-300 sm:text-2xl sm:leading-none">
                            Introduction
                            </h2>
                            <p class="text-base text-gray-400 sm:text-lg">
                                This application programming interface provides a collection of Marvel movies and series data. There are around 30+ data in the form of titles, posters, release years, trailers, release dates, durations, genres, directors, authors, actors, plots and download links via torrent.                            
                            </p><br>
                            <p class="text-base text-gray-400 sm:text-lg">
                                These are open data for public. It doesn't need an API key to call these methods. You can call simple GET request or open it directly from the browser.
                            </p><br>
                            <ul class="text-base text-gray-400 ml-5 sm:text-lg list-disc">
                                <li>The base endpoint is: https://marvel-film-api.herokuapp.com/</li>
                                <li>All endpoints return either a JSON object or array.</li>
                            </ul>
                        </div>
                        <div id="get_all">
                            <div class="max-w-3xl mb-10">
                                <h2 class="max-w-lg mb-6 text-xl font-bold tracking-tight text-gray-300 sm:text-2xl sm:leading-none">
                                    Get all movies
                                </h2>
                                <p class="text-base text-gray-400 sm:text-lg">
                                    Get all data with the following request:
                                </p>
                                <ul class="text-base text-gray-400 ml-5 sm:text-lg list-disc">
                                    <li>Request: https://marvel-film-api.herokuapp.com/api/movies</li>
                                </ul>
                                <p class="text-base text-gray-400 sm:text-lg">
                                    Example:
                                </p>
                                <div class="border-b border-gray-400">
                                    <button type="button" aria-label="Open item" title="Open item" id="show-get-all" class="flex items-center justify-between w-full py-2 focus:outline-none">
                                    <p class="text-base text-gray-400 sm:text-lg">https://marvel-film-api.herokuapp.com/api/movies</p>
                                    <!-- Add "transform rotate-180" classes on svg, if is open" -->
                                    <svg viewBox="0 0 24 24" class="w-3 text-gray-400 transition-transform duration-200">
                                        <polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" points="2,7 12,17 22,7" stroke-linejoin="round"></polyline>
                                    </svg>
                                    </button>
                                    <div class="p-4 pt-0 hidden bg-gray-700" id="content-get-all">
                                        <p class="text-gray-300">{</p>
                                        <p class="text-gray-300 indent-4">"success": true,</p>
                                        <p class="text-gray-300 indent-4">"message": "Data has been obtained",</p>
                                        <p class="text-gray-300 indent-4">"data": [</p>
                                        <p class="text-gray-300 indent-8">{</p>
                                        <p class="text-gray-300 indent-12">"id": "8",</p>
                                        <p class="text-gray-300 indent-12">"title": "Captain Marvel",</p>
                                        <p class="text-gray-300 indent-12">"poster": "https://m.media-amazon.com/images/M/MV5BNW..."</p>
                                        <p class="text-gray-300 indent-12">"year": 2022,</p>
                                        <p class="text-gray-300 indent-12">"Doctor Strange teams up with a mysterious teenage girl from..."</p>
                                        <p class="text-gray-300 indent-8">}</p>
                                        <p class="text-gray-300 indent-8">{</p>
                                        <p class="text-gray-300 indent-12">"id": "31",</p>
                                        <p class="text-gray-300 indent-12">"title": "Moon Knight",</p>
                                        <p class="text-gray-300 indent-12">"poster": "https://m.media-amazon.com/images/M/MV5BYT..."</p>
                                        <p class="text-gray-300 indent-12">"year": 2022,</p>
                                        <p class="text-gray-300 indent-12">"plot": "Steven Grant discovers he's been granted the powers..."</p>
                                        <p class="text-gray-300 indent-8">}</p>
                                        <p class="text-gray-300 indent-4">]</p>
                                        <p class="text-gray-300">}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="get_by_id">
                            <div class="max-w-3xl mb-10">
                                <h2 class="max-w-lg mb-6 text-xl font-bold tracking-tight text-gray-300 sm:text-2xl sm:leading-none">
                                    Get movies by id
                                </h2>
                                <p class="text-base text-gray-400 md:text-lg">
                                    Get detailed data based on title with the following request:
                                </p>
                                <ul class="text-base text-gray-400 ml-5 sm:text-lg list-disc">
                                    <li>Request: https://marvel-film-api.herokuapp.com/api/movies/{id}</li>
                                </ul>
                                <p class="text-base text-gray-400 sm:text-lg">
                                    Example:
                                </p>
                                <div class="border-b border-gray-400">
                                    <button type="button" aria-label="Open item" title="Open item" id="show-get-id" class="flex items-center justify-between w-full py-2 focus:outline-none">
                                    <p class="text-base text-gray-400 sm:text-lg">https://marvel-film-api.herokuapp.com/api/movies/31</p>
                                    <!-- Add "transform rotate-180" classes on svg, if is open" -->
                                    <svg viewBox="0 0 24 24" class="w-3 text-gray-400 transition-transform duration-200">
                                        <polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" points="2,7 12,17 22,7" stroke-linejoin="round"></polyline>
                                    </svg>
                                    </button>
                                    <div class="p-4 pt-0 hidden bg-gray-700" id="content-get-id">
                                        <p class="text-gray-300">{</p>
                                        <p class="text-gray-300 indent-4">"success": true,</p>
                                        <p class="text-gray-300 indent-4">"message": "Data has been obtained",</p>
                                        <p class="text-gray-300 indent-4">"data": [</p>
                                        <p class="text-gray-300 indent-8">{</p>
                                        <p class="text-gray-300 indent-12">"title": "Moon Knight",</p>
                                        <p class="text-gray-300 indent-12">"poster": "https://m.media-amazon.com/images/M/MV5BYTc5...",</p>
                                        <p class="text-gray-300 indent-12">"year": 2022,</p>
                                        <p class="text-gray-300 indent-12">"trailer": "https://www.youtube.com/embed/x7Krla_UxRg",</p>
                                        <p class="text-gray-300 indent-12">"released": "20 Mar 2022",</p>
                                        <p class="text-gray-300 indent-12">"runtime": "N/A",</p>
                                        <p class="text-gray-300 indent-12">"genre": "Action, Adventure,Fantasy",</p>
                                        <p class="text-gray-300 indent-12">"director": "N/A",</p>
                                        <p class="text-gray-300 indent-12">"writer": "Doug Moench",</p>
                                        <p class="text-gray-300 indent-12">"actors": "Oscar Isaac, Ethan Hawke, May Calamawy",</p>
                                        <p class="text-gray-300 indent-12">"plot": "Steven Grant discovers he's been granted the powers..."</p>
                                        <p class="text-gray-300 indent-12">"torrent": "magnet:?xt=urn:btih:B067E0D98C5A1F92382A8..."</p>
                                        <p class="text-gray-300 indent-8">}</p>
                                        <p class="text-gray-300 indent-4">]</p>
                                        <p class="text-gray-300">}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="search_by_title">
                            <div class="max-w-3xl mb-10">
                                <h2 class="max-w-lg mb-6 text-xl font-bold tracking-tight text-gray-300 sm:text-2xl sm:leading-none">
                                    Search movies by title
                                </h2>
                                <p class="text-base text-gray-400 md:text-lg">
                                    Get detailed data based on title with the following request:
                                </p>
                                <ul class="text-base text-gray-400 ml-5 sm:text-lg list-disc">
                                    <li>Request: https://marvel-film-api.herokuapp.com/api/movies/search/{title}</li>
                                </ul>
                                <p class="text-base text-gray-400 sm:text-lg">
                                    Example:
                                </p>
                                <div class="border-b border-gray-400">
                                    <button type="button" aria-label="Open item" title="Open item" id="show-search" class="flex items-center justify-between w-full py-2 focus:outline-none">
                                    <p class="text-base text-gray-400 sm:text-lg">https://marvel-film-api.herokuapp.com/api/movies/search/captain%20marvel</p>
                                    <!-- Add "transform rotate-180" classes on svg, if is open" -->
                                    <svg viewBox="0 0 24 24" class="w-3 text-gray-400 transition-transform duration-200">
                                        <polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" points="2,7 12,17 22,7" stroke-linejoin="round"></polyline>
                                    </svg>
                                    </button>
                                    <div class="p-4 pt-0 hidden bg-gray-700" id="content-search">
                                        <p class="text-gray-300">{</p>
                                        <p class="text-gray-300 indent-4">"success": true,</p>
                                        <p class="text-gray-300 indent-4">"message": "Data has been obtained",</p>
                                        <p class="text-gray-300 indent-4">"data": [</p>
                                        <p class="text-gray-300 indent-8">{</p>
                                        <p class="text-gray-300 indent-12">"title": "Captain Marvel",</p>
                                        <p class="text-gray-300 indent-12">"poster": "https://m.media-amazon.com/images/M/MV5BMT...",</p>
                                        <p class="text-gray-300 indent-12">"year": 2019,</p>
                                        <p class="text-gray-300 indent-12">"trailer": "https://www.youtube.com/embed/Z1BCujX3pw8",</p>
                                        <p class="text-gray-300 indent-12">"released": "08 Mar 2019",</p>
                                        <p class="text-gray-300 indent-12">"runtime": "123 min",</p>
                                        <p class="text-gray-300 indent-12">"genre": "Action, Adventure, Sci-Fi",</p>
                                        <p class="text-gray-300 indent-12">"director": "Anna Boden, Ryan Fleck",</p>
                                        <p class="text-gray-300 indent-12">"writer": "Anna Boden, Ryan Fleck, Geneva Robertson-Dworet",</p>
                                        <p class="text-gray-300 indent-12">"actors": "Brie Larson, Samuel L. Jackson, Ben Mendelsohn",</p>
                                        <p class="text-gray-300 indent-12">"plot": "Carol Danvers becomes one of the universe's most..."</p>
                                        <p class="text-gray-300 indent-12">"torrent": "magnet:?xt=urn:btih:00DE6A0146A8526CB3E..."</p>
                                        <p class="text-gray-300 indent-8">}</p>
                                        <p class="text-gray-300 indent-4">]</p>
                                        <p class="text-gray-300">}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
