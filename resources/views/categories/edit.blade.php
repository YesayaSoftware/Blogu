<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Content--}}
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <form
                            class="space-y-8"
                            action="{{ route('categories.update', $category->id) }}"
                            method="POST">
                            @method('PATCH')
                            @csrf

                            <div class="space-y-8 divide-y divide-gray-200">
                                <div>
                                    <div class="sm:flex sm:items-center">
                                        <div class="sm:flex-auto">
                                            <h1 class="text-xl font-semibold text-gray-900">
                                                Edit Category
                                            </h1>

                                            <p class="mt-2 text-sm text-gray-700">
                                                Edit a {{ $category->name }} that will be associated with posts.
                                            </p>
                                        </div>

                                        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                                            <a href="{{ route('categories.index') }}"
                                               class="font-sans text-blue-600 hover:text-blue-500">
                                                Back to the list
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-4">
                                            <label
                                                for="name"
                                                class="block text-sm font-medium text-gray-700 @error('name') text-red-700 @enderror">
                                                Name
                                            </label>

                                            <div class="mt-1">
                                                <input
                                                    id="name"
                                                    name="name"
                                                    type="text"
                                                    autocomplete="name"
                                                    value="{{ $category->name }}"
                                                    class="shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 block w-full sm:text-sm rounded-md @error('name') border-red-300 @enderror">
                                            </div>

                                            @error('name')
                                            <p class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>

                                        <div class="sm:col-span-6">
                                            <label
                                                for="description"
                                                class="block text-sm font-medium text-gray-700">
                                                Description
                                            </label>

                                            <div class="mt-1">
                                                <textarea
                                                    id="description"
                                                    name="description"
                                                    rows="3"
                                                    class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border border-gray-300 rounded-md">{{ $category->description }}</textarea>
                                            </div>

                                            <p class="mt-2 text-sm text-gray-500">Write a few sentences about this category.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-5">
                                <div class="flex justify-end">
                                    <a href="{{ route('categories.index') }}"
                                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Cancel
                                    </a>

                                    <button
                                        type="submit"
                                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
