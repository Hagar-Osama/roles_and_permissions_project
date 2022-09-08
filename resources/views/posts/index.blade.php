<x-guest-layout>
    <div class="mt-12 max-w-6xl mx-auto">
        @can('create', App\Models\Post::class)
        <div class="flex justify-end m-2 p-2">
            <a href="{{route('posts.create')}}" class="px-4 py-2 bg-indigo-400 rounded">New Post</a>
        </div>
        @endcan
        @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            <span class="font-medium">Success alert!</span> {{session('success')}}.
        </div>
        @endif
        <div class="mt-5">
            <div class="flex flex-col mt-1">
                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                        <table class="text-left w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Body</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-100"></th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                @foreach($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">


                                        <div class="ml-5">
                                            <div class="text-sm leading-5 font-medium text-gray-900">{{$loop->iteration}}</div>
                                        </div>

                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">


                                            <div class="ml-5">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{$post->title}}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">


                                            <div class="ml-5">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{$post->body}}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                        <div class="flex space-x-2">
                                            @can('update', $post)
                                            <a href="{{route('posts.edit',$post->id)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            @endcan
                                            @can('delete', $post)
                                            <form action="{{route('posts.destroy', $post->id)}}" method="POST" onsubmit="return confirm('Are You Sure');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:text-red-900" type="submit">Delete</button>
                                            </form>
                                            @endcan
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
    </div>
</x-guest-layout>
