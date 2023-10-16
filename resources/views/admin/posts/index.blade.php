<x-layout>

    <x-setting heading="Manages Post">
        <section>
            <div class="flex flex-col justify-center h-full">
                <!-- Table -->
                <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                    <div class="p-3">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Post Title</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Category</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-center">Action</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <a href="/post/{{ $post->slug }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left font-medium text-green-500">
                                                    {{ $post->category->name }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-lg text-center">
                                                    <a href="/admin/posts/{{ $post->id }}/edit"
                                                        class="text-blue-500 hover:text-blue-600">Edit</a>
                                                    <form action="/admin/posts/{{ $post->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-xs text-gray-400">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-setting>

</x-layout>
