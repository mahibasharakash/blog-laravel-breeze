<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-zinc-900">
        <div class="min-h-screen flex flex-col justify-center items-center p-10">
            
            {{-- Background absolute --}}
            <div class="absolute inset-0 mx-0 overflow-hidden -z-10 max-w-none">
                <div class="absolute left-1/2 top-0 ml-[-38rem] h-[25rem] w-[81.25rem] [mask-image:linear-gradient(white,transparent)] z-[-100] overflow-visible">
                    <div class="absolute inset-0 bg-gradient-to-r [mask-image:radial-gradient(farthest-side_at_top,white,transparent)] from-[#36b49f]/30 to-[#DBFF75]/30 opacity-100">
                        <svg aria-hidden="true" class="absolute inset-x-0 inset-y-[-50%] h-[200%] w-full skew-y-[-18deg] fill-black/40 stroke-black/50 mix-blend-overlay stroke-white/5">
                            <defs>
                                <pattern id=":S1:" width="72" height="56" patternUnits="userSpaceOnUse" x="-12" y="4">
                                    <path d="M.5 56V.5H72" fill="none"></path>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="url(#:S1:)"></rect>
                            <svg x="-12" y="4" class="overflow-visible">
                                <rect stroke-width="0" width="73" height="57" x="288" y="168"></rect>
                                <rect stroke-width="0" width="73" height="57" x="144" y="56"></rect>
                                <rect stroke-width="0" width="73" height="57" x="504" y="168"></rect>
                                <rect stroke-width="0" width="73" height="57" x="720" y="336"></rect>
                            </svg>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-md p-10 bg-gradient-bl from-emerald-500 to-black border border-white/25 rounded-lg">

                <div class="flex justify-center mb-5">
                    <a href="{{route('home')}}">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </div>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>
