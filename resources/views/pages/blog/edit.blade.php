<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Blog') }}
            </h2>
            {{-- <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                Blog</button> --}}
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form id="EditBlog" method="post" action="{{ route('blog.update',$blog->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- <input name="id" value="{{ $blog->id}}" hidden/> --}}
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="blog_name">
                                Name
                            </label>
                            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                id="blog_name" type="text" placeholder="Enter the name" name="name" value={{ $blog->name }}>
                            <div>
                                <span id="error_name" class="text-red-500 text-xs italic">
                                </span>
                            </div>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="author">
                                Author
                            </label>
                            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                id="author" type="text" name="author" placeholder="Enter the author"  value={{ $blog->author }}>
                            <div>
                                <span id="error_author" class="text-red-500 text-xs italic">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="h-90 -mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="content">
                                Content
                            </label>
                            <textarea class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="content"
                                type="text" name="content" placeholder="Enter the content">{{ $blog->content }}</textarea>
                            <div>
                                <span id="error_content" class="text-red-500 text-xs italic">
                                </span>
                            </div>
                            {{-- <div id="editor">
                                <p>Hello World!</p>
                                <p>Some initial <strong>bold</strong> text</p>
                                <p><br /></p>
                            </div> --}}
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3">
                            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="date">
                                Date
                            </label>
                            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                id="date" type="date" name="date"  value={{ $blog->date }}>
                            <div>
                                <span id="error_date" class="text-red-500 text-xs italic">
                                </span>
                            </div>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="image">
                                Image
                            </label>
                            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                id="image" type="file" name="image">
                            <div>
                                <span id="error_image" class="text-red-500 text-xs italic">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mt-2 flex justify-end">
                        <div class="md:w-1/2 px-3 flex justify-end">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">update</button>
                            <a href="{{ route('blog.index') }}"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('script')
        <script src="{{ asset('/assets/blogEdit.js') }}"></script>
    @endsection
</x-app-layout>
