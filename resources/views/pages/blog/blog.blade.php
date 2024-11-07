<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Blog') }}
            </h2>
            <a href="{{ route('blog.create') }}" type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                Blog</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Author
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Content
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{ $blog->id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <img class="rounded-full w-10 h-10"
                                            src="{{ asset('/storage/' . $blog->image) }}">
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $blog->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($blog->date)->format('j F, Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $blog->author }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $blog->content }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-between">
                                            <a href="{{ route('blog.edit', $blog->id) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500">Edit</a>
                                            <a href="javascript:void(0);"
                                                class="delete-blog font-medium text-red-600 dark:text-red-500 ms-1"
                                                data-id="{{ $blog->id }}">Delete</a>

                                            <form id="delete-form-{{ $blog->id }}"
                                                action="{{ route('blog.destroy', $blog->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <nav aria-label="Page navigation example">
                {{ $blogs->links() }}
            </nav>

        </div>
    </div>
    @section('script')
        <script src="{{ asset('/assets/blog.js') }}"></script>
    @endsection
</x-app-layout>
