@extends('layouts.blog.layout')

@section('title', 'Home')

@section('content')

    {{-- Main Contents --}}
    <section class="flex flex-col gap-8 px-4 py-10 mx-auto lg:gap-18 lg:grid lg:grid-cols-12 max-w-7xl sm:px-6 lg:px-8">

        {{-- Posts --}}
        <section class="flex flex-col gap-8 lg:col-span-8">

            @forelse ( $posts as $post )
                
                <article class="w-full rounded-xl p-6 text-white shadow-lg bg-zinc-900/40 ring-1 backdrop-blur-[2px] ring-white/15 space-y-6 shadow-xl">
                        
                    <div class="flex flex-row items-center justify-between">
                        
                        {{-- Category Pill --}}
                        <div>
                            <a href="{{route('article.category', ['category' => $post->category->slug])}}" class="inline-flex gap-0.5 justify-center overflow-hidden text-sm sm:text-base font-medium transition rounded-full py-1 px-3 bg-emerald-400/10 text-emerald-400 ring-1 ring-inset ring-emerald-400/20 hover:bg-emerald-400/10 hover:text-emerald-300 hover:ring-emerald-300">
                                {{ $post->category->name }}
                            </a>
                        </div>

                        {{-- Date --}}
                        <p class="text-sm font-semibold sm:text-base text-zinc-400">
                            {{ $post->created_at->diffForHumans() }}
                        </p>

                    </div>

                    {{-- Main Content --}}
                    <div>

                        {{-- Article Title --}}
                        <a href="{{route('article.details', $post->slug)}}">
                            <h3 class="mb-4 text-xl font-bold md:text-4xl hover:underline decoration-emerald-700">
                                {{ str($post->title)->limit(250) }}
                            </h3>
                        </a>

                        {{-- Excerpt --}}
                        <p class="text-base font-medium text-zinc-400 md:text-lg line-clamp-3">
                            {{ str($post->body)->limit(250) }}
                        </p>

                    </div>

                    {{-- Card Bottom --}}
                    <div class="flex flex-row items-center justify-between">

                        {{-- Author Info --}}
                        <div class="flex items-center gap-4">
                            <img class="w-8 h-8 p-0.5 rounded-full ring-1 ring-emerald-500" src="https://avatars.githubusercontent.com/u/61485238?v=4" alt="{{$post->user->name}}" />
                            <h4> {{ $post->user->name }} </h4>
                        </div>

                        {{-- Read More Link --}}
                        <a class="inline-flex gap-2 justify-center items-start overflow-hidden text-sm font-medium transition text-emerald-400 hover:text-emerald-500" href="{{route('article.details', $post->slug)}}">
                            Read more
                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="mt-0.4 h-5 w-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="m11.5 6.5 3 3.5m0 0-3 3.5m3-3.5h-9"></path>
                            </svg>
                        </a>

                    </div>

                </article>
            
            @empty

                <h3 class="mb-5 text-white text-xl font-bold decoration-emerald-700 md:text-4xl">
                    Sorry, No Posts Available
                </h3>
                
            @endforelse
            
            {{-- This is where you call the links() method on the paginator object --}}
            <div class="!text-white">
                {{ $posts->links('vendor.pagination.tailwind') }}
            </div>

        </section>

        @include('layouts.blog.includes.sidebar.widget')

    </section>
        
@endsection
