<x-app-layout x-data="{ open: false }">

    {{-- header --}}
    <x-slot name="header">
        <div class="flex justify-between items-center min-h-[80px] max-h-[80px]">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Category') }}
            </h2>
            <x-primary-button form="update-category-form" type="submit">
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </x-slot>

    {{-- category --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <form id="update-category-form" action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        {{-- Name --}}
                        <div>
                            <x-input-label class="text-gray-800 dark:text-white" for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full duration-500 outline-0 focus-within:outline-0" type="text" name="name" :value="old('name', $category->name)" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>