<x-app-layout x-data="{ open: false }">

    {{-- header --}}
    <x-slot name="header">
        <div class="flex justify-between items-center min-h-[80px] max-h-[80px]">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Post') }}
            </h2>
            <x-primary-button form="update-post-form" type="submit">
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </x-slot>

    {{-- post --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <form id="update-post-form" action="{{ route('post.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        {{-- Title --}}
                        <div class="mb-3">
                            <x-input-label class="text-gray-800 dark:text-white" for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full duration-500 outline-0 focus-within:outline-0" type="text" name="title" :value="old('title', $post->title)" autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        {{-- Category --}}
                        <div class="mb-3">
                            <x-input-label class="text-gray-800 dark:text-white" for="category_id" :value="__('Category')" />
                            <select id="category_id" name="category_id" class="block mt-1 w-full duration-500 outline-0 focus-within:outline-0 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="">Select a Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="body" :value="__('Body')" />
                            <textarea id="body" name="body" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" rows="10">{{ old('body', $post->body) }}</textarea>
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>