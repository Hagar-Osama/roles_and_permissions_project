<x-guest-layout>
<div class="flex m-2 p-2">
        <a href="{{route('posts.index')}}" class="px-4 py-2 bg-indigo-400 rounded">Posts Index</a>
    </div>

    <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">
            <form method="post" action="{{route('posts.store')}}">
                @csrf
                <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
                    <h3 class="text-sm">Add Post</h3>

                </div>

                <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
                    <label class="text-xs">Title</label>

                    <div class="mt-2 relative rounded-md shadow-sm">


                        <input type="text" name="title" value="{{$post->title}}" class="form-input w-full px-12 py-2 appearance-none rounded-md focus:border-indigo-600">
                    </div>
                    @error('title')
                    <span class="text-sm text-red-400">{{$message}}</span>
                    @enderror
                </div>

                <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
                    <label class="text-xs">Body</label>

                    <div class="mt-2 relative rounded-md shadow-sm">


                        <textarea name="body" class="form-input w-full px-12 py-2 appearance-none rounded-md focus:border-indigo-600" rows="3">{{$post->body}}</textarea>
                    </div>
                    @error('body')
                    <span class="text-sm text-red-400">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-between items-center px-5 py-3">
                    <button class="px-3 py-1 text-gray-700 text-sm rounded-md bg-gray-200 hover:bg-gray-300 focus:outline-none">Cancel</button>
                    <button class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-500 focus:outline-none">Create</button>
                </div>
            </form>
        </div>


</x-guest-layout>


