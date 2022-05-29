<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Content--}}
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">
                                    Post Detail
                                </h1>

                                <p class="mt-2 text-sm text-gray-700">
                                    A detail information about {{ $post->title }} and associated comments.
                                </p>
                            </div>

                            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                                <a href="{{ route('posts.index') }}"
                                   class="font-sans text-blue-600 hover:text-blue-500">
                                    Back to the list
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Title
                                </dt>

                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $post->title }}
                                </dd>
                            </div>

                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Category
                                </dt>

                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $post->category->name }}
                                </dd>
                            </div>

                            <div class="sm:col-span-2">
                                <dt class="text-sm font-medium text-gray-500">
                                    Body
                                </dt>

                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $post->body }}
                                </dd>
                            </div>

                            <div class="sm:col-span-2">
                                <dt class="text-sm font-medium text-gray-500">Comments associated to this post</dt>

                                <dd class="mt-1 text-sm text-gray-900">
                                    @if($post->comments->isNotEmpty())
                                        <table class="min-w-full divide-y divide-gray-300">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">
                                                        Comment
                                                    </th>

                                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                                        Created At
                                                    </th>

                                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                                        Created By
                                                    </th>

                                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 md:pr-0">
                                                        <span class="sr-only">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody class="divide-y divide-gray-200">
                                                @foreach($post->comments as $comment)
                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">
                                                            {{ $comment->body }}
                                                        </td>

                                                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
                                                            {{ $comment->created_at }}
                                                        </td>

                                                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
                                                            {{ $comment->user->name }}
                                                        </td>

                                                        <td class="relative flex justify-between whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                                                            <a href="#"
                                                            class="text-gray-600 hover:text-gray-900"
                                                            title="View">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                </svg>
                                                            </a>

                                                            <a href="#"
                                                            class="text-blue-600 hover:text-blue-900"
                                                            title="Edit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                </svg>
                                                            </a>

                                                            <a href="#"
                                                            class="text-red-600 hover:text-red-900"
                                                            title="Delete">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p>
                                            The list is empty
                                        </p>
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>