<x-app-layout x-data="{ open: false }">

    {{-- header --}}
    <x-slot name="header">
        <div class="flex justify-between items-center min-h-[80px] max-h-[80px]">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Post') }}
            </h2>
            <x-primary-button form="create-post-form" type="submit">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </x-slot>

    {{-- post --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <form id="create-post-form" action="{{ route('post.store') }}" method="POST">
                    @csrf

                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        {{-- Name and slug --}}
                        <div class="mb-3">
                            <x-input-label class="text-gray-800 dark:text-white" for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full duration-500 outline-0 focus-within:outline-0" type="text" name="title" :value="old('title')" autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        {{-- Category --}}
                        <div class="mb-3">
                            <x-input-label class="text-gray-800 dark:text-white" for="category_id" :value="__('Category')" />
                            <select id="category_id" name="category_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full duration-500 outline-0 focus-within:outline-0">
                                <option selected>Select a Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <!-- Body -->
                        <div class="mb-3">
                            <x-input-label for="body" :value="__('Body')" />
                            <textarea id="body" name="body" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full duration-500 outline-0 focus-within:outline-0" rows="10">{{ old('body') }}</textarea>
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>