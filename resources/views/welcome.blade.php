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

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            /*! tailwindcss v3.1.7 | MIT License | https://tailwindcss.com*/*,:after,:before{border:0 solid #e5e7eb;box-sizing:border-box}:after,:before{--tw-content:""}html{-webkit-text-size-adjust:100%;font-family:ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5;-moz-tab-size:4;-o-tab-size:4;tab-size:4}body{line-height:inherit;margin:0}hr{border-top-width:1px;color:inherit;height:0}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{border-collapse:collapse;border-color:inherit;text-indent:0}button,input,optgroup,select,textarea{color:inherit;font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0}fieldset,legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::-moz-placeholder,textarea::-moz-placeholder{color:#9ca3af;opacity:1}input::placeholder,textarea::placeholder{color:#9ca3af;opacity:1}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{height:auto;max-width:100%}*,:after,:before{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgba(59,130,246,.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgba(59,130,246,.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgba(59,130,246,.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.mx-2{margin-left:.5rem;margin-right:.5rem}.my-1{margin-bottom:.25rem;margin-top:.25rem}.mt-10{margin-top:2.5rem}.mt-5{margin-top:1.25rem}.mb-10{margin-bottom:2.5rem}.mb-6{margin-bottom:1.5rem}.ml-5{margin-left:1.25rem}.flex{display:flex}.hidden{display:none}.h-auto{height:auto}.w-full{width:100%}.w-3{width:.75rem}.max-w-3xl{max-width:48rem}.max-w-lg{max-width:32rem}.flex-auto{flex:1 1 auto}.rotate-180{--tw-rotate:180deg}.rotate-180,.transform{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.list-disc{list-style-type:disc}.flex-col{flex-direction:column}.items-center{align-items:center}.justify-start{justify-content:flex-start}.justify-between{justify-content:space-between}.scroll-smooth{scroll-behavior:smooth}.border-b{border-bottom-width:1px}.border-gray-400{--tw-border-opacity:1;border-color:rgb(156 163 175/var(--tw-border-opacity))}.bg-gray-800{--tw-bg-opacity:1;background-color:rgb(31 41 55/var(--tw-bg-opacity))}.bg-gray-700{--tw-bg-opacity:1;background-color:rgb(55 65 81/var(--tw-bg-opacity))}.p-2{padding:.5rem}.p-10{padding:2.5rem}.p-4{padding:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-2{padding-bottom:.5rem;padding-top:.5rem}.pt-0{padding-top:0}.indent-4{text-indent:1rem}.indent-8{text-indent:2rem}.indent-12{text-indent:3rem}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-base{font-size:1rem;line-height:1.5rem}.text-lg{font-size:1.125rem;line-height:1.75rem}.font-bold{font-weight:700}.font-normal{font-weight:400}.tracking-tight{letter-spacing:-.025em}.text-gray-300{--tw-text-opacity:1;color:rgb(209 213 219/var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175/var(--tw-text-opacity))}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.transition-colors{transition-duration:.15s;transition-property:color,background-color,border-color,fill,stroke,-webkit-text-decoration-color;transition-property:color,background-color,border-color,text-decoration-color,fill,stroke;transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,-webkit-text-decoration-color;transition-timing-function:cubic-bezier(.4,0,.2,1)}.transition-transform{transition-duration:.15s;transition-property:transform;transition-timing-function:cubic-bezier(.4,0,.2,1)}.duration-500{transition-duration:.5s}.duration-200{transition-duration:.2s}.hover\:translate-x-1:hover{--tw-translate-x:0.25rem;transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}@media (min-width:640px){.sm\:mx-4{margin-left:1rem;margin-right:1rem}.sm\:my-2{margin-bottom:.5rem;margin-top:.5rem}.sm\:mt-10{margin-top:2.5rem}.sm\:h-screen{height:100vh}.sm\:w-72{width:18rem}.sm\:flex-row{flex-direction:row}.sm\:p-20{padding:5rem}.sm\:text-2xl{font-size:1.5rem;line-height:2rem}.sm\:text-lg{font-size:1.125rem;line-height:1.75rem}.sm\:leading-none{line-height:1}}@media (min-width:768px){.md\:text-lg{font-size:1.125rem;line-height:1.75rem}}
        </style>
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
