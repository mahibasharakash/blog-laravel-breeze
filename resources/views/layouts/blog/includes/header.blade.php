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

{{-- Fonts --}}
<header class="inset-x-0 top-0 z-50 shadow-sm lg:sticky lg:overflow-y-visible backdrop-blur bg-zinc-900/20 ring-1 lg:flex text-zinc-400 ring-white/10">
    <div class="w-full px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="relative flex flex-row items-center justify-between gap-6 lg:gap-8">

            {{-- Logo --}}
            <div class="flex items-center justify-start">
                <div class="flex items-center flex-shrink-0">
                    <a href="{{route('home')}}">
                        <svg class="w-12 h-12 fill-emerald-500" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 6.036c-2.667 0-4.333 1.325-5 3.976 1-1.325 2.167-1.822 3.5-1.491.761.189 1.305.738 1.906 1.345C13.387 10.855 14.522 12 17 12c2.667 0 4.333-1.325 5-3.976-1 1.325-2.166 1.822-3.5 1.491-.761-.189-1.305-.738-1.907-1.345-.98-.99-2.114-2.134-4.593-2.134zM7 12c-2.667 0-4.333 1.325-5 3.976 1-1.326 2.167-1.822 3.5-1.491.761.189 1.305.738 1.907 1.345.98.989 2.115 2.134 4.594 2.134 2.667 0 4.333-1.325 5-3.976-1 1.325-2.167 1.822-3.5 1.491-.761-.189-1.305-.738-1.906-1.345C10.613 13.145 9.478 12 7 12z"></path>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Search Box --}}
            <div class="flex-grow min-w-0 px-0">
                <div class="flex items-center px-0 py-4 mx-auto">
                    <form class="w-full" action="{{ route('home') }}" method="GET">
                    <label for="search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-9 h-9 text-zinc-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input id="search" name="query" class="block w-full py-3 pl-16 pr-3 text-lg transition border-0 rounded-full placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-2xl sm:leading-6 ring-1 ui-not-focus-visible:outline-none lg:flex bg-white/5 text-zinc-400 ring-inset ring-white/10 hover:ring-white/20" placeholder="Search" type="search" />
                        </div>
                    </form>
                </div>
            </div>

            {{-- Routing Link --}}
            <div class="flex items-center justify-start">
                @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="outline-0 border-0 bg-transparent rounded-full text-white px-5 py-3 inline-flex justify-center items-center">
                                <div>{{ Auth::user()->name }}</div>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="outline-0 border-0 bg-transparent rounded-full text-white px-5 py-3 inline-flex justify-center items-center">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="outline-0 border-0 bg-transparent rounded-full text-white px-5 py-3 inline-flex justify-center items-center">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>

        </div>
    </div>
</header>