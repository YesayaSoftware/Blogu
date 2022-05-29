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
                            action="{{ route('posts.store') }}"
                            method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="space-y-8 divide-y divide-gray-200">
                                <div>
                                    <div class="sm:flex sm:items-center">
                                        <div class="sm:flex-auto">
                                            <h1 class="text-xl font-semibold text-gray-900">
                                                New Post
                                            </h1>

                                            <p class="mt-2 text-sm text-gray-700">
                                                Create a new post, your visitors are excited to hear about that.
                                            </p>
                                        </div>

                                        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                                            <a href="{{ route('posts.index') }}"
                                               class="font-sans text-blue-600 hover:text-blue-500">
                                                Back to the list
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-4">
                                            <label
                                                for="title"
                                                class="block text-sm font-medium text-gray-700 @error('title') text-red-700 @enderror">
                                                Title
                                            </label>

                                            <div class="mt-1">
                                                <input
                                                    id="title"
                                                    name="title"
                                                    type="text"
                                                    autocomplete="title"
                                                    value="{{ old('title') }}"
                                                    class="shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 block w-full sm:text-sm rounded-md @error('title') border-red-300 @enderror">
                                            </div>

                                            @error('title')
                                                <p class="mt-2 text-sm text-red-500">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="sm:col-span-4">
                                            <label
                                                for="category_id"
                                                class="block text-sm font-medium text-gray-700 @error('category_id') text-red-700 @enderror">
                                                Category
                                            </label>

                                            <div class="mt-1">
                                                <select id="category_id"
                                                    name="category_id"
                                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md @error('category_id') border-red-300 @enderror">

                                                    <option value="">
                                                        Choose a category
                                                    </option>

                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                             @selected(old('category_id') == $category->id)>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @error('category_id')
                                                <p class="mt-2 text-sm text-red-500">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="sm:col-span-6">
                                            <label
                                                for="body"
                                                class="block text-sm font-medium text-gray-700 @error('category_id') text-red-700 @enderror"">
                                                Body
                                            </label>

                                            <div class="mt-1">
                                                <textarea
                                                    id="body"
                                                    name="body"
                                                    rows="3"
                                                    class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border border-gray-300 rounded-md @error('category_id') border-red-300 @enderror">{{ old('body') }}</textarea>
                                            </div>

                                            @error('body')
                                                <p class="mt-2 text-sm text-red-500">
                                                    {{ $message }}
                                                </p>
                                            @else
                                                <p class="mt-2 text-sm text-gray-500">
                                                    Write a few sentences about this post.
                                                </p>
                                            @endif
                                        </div>

                                        <div class="sm:col-span-6">
                                            <label for="cover-photo"
                                                   class="block text-sm font-medium text-gray-700">
                                                Cover photo
                                            </label>

                                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>

                                                    <div class="flex text-sm text-gray-600">
                                                        <label for="thumbnail"
                                                               class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                            <span>Upload a file</span>

                                                            <input id="thumbnail" name="thumbnail" type="file" class="sr-only">
                                                        </label>

                                                        <p class="pl-1">or drag and drop</p>
                                                    </div>

                                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-5">
                                <div class="flex justify-end">
                                    <a href="{{ route('posts.index') }}"
                                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Cancel
                                    </a>

                                    <button
                                        type="submit"
                                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Create
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
