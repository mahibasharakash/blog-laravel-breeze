<x-app-layout x-data="{ open: false }">

    {{-- header --}}
    <x-slot name="header">
        <div class="flex justify-between items-center min-h-[80px] max-h-[80px]">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Category') }}
            </h2>
            <div class="inline-flex justify-end items-center gap-3">
                <a href="{{route('category.create')}}">
                    <x-primary-button> {{ __('New') }} </x-primary-button>
                </a>
                <form action="{{ route('category.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search Here ..." value="{{ $searchQuery ?? '' }}" class="min-w-[600px] max-w-[600px] outline-0 bg-gray-100 border border-gray-200 rounded-md" />
                </form>
            </div>
        </div>
    </x-slot>

    {{-- category --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black/65 dark:text-white">

                    @if ($categories->count() > 0)

                        @if(session('success'))

                            <div class="border border-emerald-500 py-3 px-5 text-emerald-500 mb-10 rounded-xl">
                                {{ session('success') }}
                            </div>

                        @endif

                        <div class="overflow-y-auto max-h-[600px] min-h-[600px]">
                            <table class="table-auto w-full">
                                <thead class="w-full">
                                    <tr class="w-full">
                                        <th class="min-w-[150px] max-w-[150px] text-start font-medium px-5 py-3 text-sm"> Category </th>
                                        <th class="min-w-[150px] max-w-[150px] text-start font-medium px-5 py-3 text-sm"> Slug </th>
                                        <th class="min-w-[150px] max-w-[150px] text-start font-medium px-5 py-3 text-sm"> Posts </th>
                                        <th class="min-w-[150px] max-w-[150px] text-start font-medium px-5 py-3 text-sm"> Created At </th>
                                        <th class="min-w-[150px] max-w-[150px] text-start font-medium px-5 py-3 text-sm"> Action </th>
                                    </tr>
                                </thead>
                                <tbody class="w-full">
                                    @foreach ( $categories as $category )
                                        <tr class="w-full hover:bg-gray-100 duration-500 dark:hover:bg-gray-700">
                                            <td class="min-w-[150px] max-w-[150px] text-start font-medium px-5 py-3 text-sm"> <div class="truncate"> {{ $category->name }} </div> </td>
                                            <td class="min-w-[150px] max-w-[150px] text-start font-medium px-5 py-3 text-sm"> <div class="truncate"> {{ $category->slug }} </div> </td>
                                            <td class="min-w-[150px] max-w-[150px] text-start font-medium px-5 py-3 text-sm"> <div class="truncate"> {{ $category->posts->count() }} </div> </td>
                                            <td class="min-w-[150px] max-w-[150px] text-start font-medium px-5 py-3 text-sm"> <div class="truncate"> {{ $category->created_at->diffForHumans() }} </div> </td>
                                            <td class="min-w-[150px] max-w-[150px] text-start font-medium px-5 py-3 text-sm">
                                                <div class="flex justify-start items-center gap-3">
                                                    <a href="{{route('category.show', $category->id)}}" class="decoration-0 text-gray-900 dark:text-gray-400">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="decoration-0 text-red-400">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="w-full mt-4">
                            {{ $categories->links('vendor.pagination.tailwind') }}
                        </div>

                    @else

                        <div class="text-xl font-medium"> No Data Found </div>

                    @endif

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
