<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Documentation Marvel API</title>

        <style src="{{ asset('css/app.css') }}" defer></style>
        
        <!-- Tailwind -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <script>
            $(function() {
                $("#show-get-all").click(function() {
                    $("#content-get-all").toggle();
                });
            });
            $(function() {
                $("#show-search").click(function() {
                    $("#content-search").toggle();
                });
            });
        </script>

    </head>
    <body class="antialiased">
        <div class="relative bg-gray-800">
            <div class="flex sm:flex-row flex-col">
                <div class="sm:w-72 sm:h-screen h-auto w-full">
                    <div class="flex items-center justify-start p-2 mx-6 mt-10">
                        <span class="text-gray-300 text-xl sm:mx-4 mx-2 sm:text-2xl font-bold">
                            Documentation
                        </span>
                    </div>
                    <nav class="sm:mt-10 mt-5 px-6 ">
                        <a class="flex items-center p-2 sm:my-4 my-2 transition-colors duration-500 text-gray-400 hover:translate-x-1" href="#get_all">
                            <span class="sm:mx-4 mx-2 text-base sm:text-lg font-normal">
                                Get all movies
                            </span>
                        </a>
                        <a class="flex items-center p-2 sm:my-4 my-2 transition-colors duration-500 text-gray-400 hover:translate-x-1" href="#get_by_id">
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
                                        <p class="text-gray-300 indent-12">"title": "Captain Marvel",</p>
                                        <p class="text-gray-300 indent-12">"poster": "https://m.media-amazon.com/images/M/MV5BNW...</p>
                                        <p class="text-gray-300 indent-12">"year": 2022,</p>
                                        <p class="text-gray-300 indent-12">"Doctor Strange teams up with a mysterious teenage girl from...</p>
                                        <p class="text-gray-300 indent-8">}</p>
                                        <p class="text-gray-300 indent-8">{</p>
                                        <p class="text-gray-300 indent-12">"title": "Moon Knight,</p>
                                        <p class="text-gray-300 indent-12">"poster": "https://m.media-amazon.com/images/M/MV5BYT...</p>
                                        <p class="text-gray-300 indent-12">"year": 2022,</p>
                                        <p class="text-gray-300 indent-12">"plot": "Steven Grant discovers he's been granted the powers...</p>
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
                                    Search movies by title
                                </h2>
                                <p class="text-base text-gray-400 md:text-lg">
                                    Get detailed data based on title with the following request:
                                </p>
                                <ul class="text-base text-gray-400 ml-5 sm:text-lg list-disc">
                                    <li>Request: https://marvel-film-api.herokuapp.com/api/movies/{title}</li>
                                </ul>
                                <p class="text-base text-gray-400 sm:text-lg">
                                    Example:
                                </p>
                                <div class="border-b border-gray-400">
                                    <button type="button" aria-label="Open item" title="Open item" id="show-search" class="flex items-center justify-between w-full py-2 focus:outline-none">
                                    <p class="text-base text-gray-400 sm:text-lg">https://marvel-film-api.herokuapp.com/api/movies/captain%20marvel</p>
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
                                        <p class="text-gray-300 indent-12">"trailer": "https://www.youtube.com/watch?v=Z1BCujX3pw8",</p>
                                        <p class="text-gray-300 indent-12">"released": "08 Mar 2019",</p>
                                        <p class="text-gray-300 indent-12">"runtime": "123 min",</p>
                                        <p class="text-gray-300 indent-12">"genre": "Action, Adventure, Sci-Fi",</p>
                                        <p class="text-gray-300 indent-12">"director": "Anna Boden, Ryan Fleck",</p>
                                        <p class="text-gray-300 indent-12">"writer": "Anna Boden, Ryan Fleck, Geneva Robertson-Dworet",</p>
                                        <p class="text-gray-300 indent-12">"actors": "Brie Larson, Samuel L. Jackson, Ben Mendelsohn",</p>
                                        <p class="text-gray-300 indent-12">"plot": "Carol Danvers becomes one of the universe's most...</p>
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
