<x-admin-layout>
    <h3 class="text-gray-700 text-3xl font-semibold">Role</h3>
    @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        <span class="font-medium">Success alert!</span> {{session('success')}}.
    </div>
    @endif
    <div class="flex justify-end m-2 p-2">
        <a href="{{route('admin.roles.index')}}" class="px-4 py-2 bg-indigo-400 rounded">Back</a>
    </div>

    <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">
        <form method="post" action="{{route('admin.roles.update', $role->id)}}">
            @csrf
            @method('PUT')
            <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
                <h3 class="text-sm">Add Role</h3>

            </div>

            <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
                <label class="text-xs">Name</label>

                <div class="mt-2 relative rounded-md shadow-sm">


                    <input type="text" name="name" value="{{$role->name}}" class="form-input w-full px-12 py-2 appearance-none rounded-md focus:border-indigo-600">
                </div>
                @error('name')
                <span class="text-sm text-red-400">{{$message}}</span>
                @enderror
            </div>


            <div class="flex justify-between items-center px-5 py-3">
                <button class="px-3 py-1 text-gray-700 text-sm rounded-md bg-gray-200 hover:bg-gray-300 focus:outline-none">Cancel</button>
                <button class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-500 focus:outline-none">Update</button>
            </div>
        </form>
    </div>
    <!--permissions -->
    <h3 class="text-gray-700 text-3xl font-semibold">Permissions</h3>
    <div class="max-w-md mx-auto">
        @foreach($role->permissions as $permission)
        <span class="m-2 p-2 bg-indigo-300 rounded-md">{{$permission->name}}</span>
        @endforeach
    </div>
    <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">

        <form method="post" action="{{route('admin.roles.permissions', $role->id)}}">
            @csrf
            <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">

                <h3 class="text-sm">Assign Permission</h3>

            </div>

            <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
                <label class="text-xs">Permissions</label>

                <div class="mt-2 relative rounded-md shadow-sm">


                    <select name="permissions[]" class="form-input w-full px-12 py-2 appearance-none rounded-md focus:border-indigo-600" multiple>
                        @foreach($permissions as $permission)
                        <option value="{{$permission->id}}" @selected($role->hasPermission($permission->name))>{{$permission->name}}</option>
                        @endforeach

                    </select>
                </div>
                @error('name')
                <span class="text-sm text-red-400">{{$message}}</span>
                @enderror
            </div>


            <div class="flex justify-between items-center px-5 py-3">
                <button class="px-3 py-1 text-gray-700 text-sm rounded-md bg-gray-200 hover:bg-gray-300 focus:outline-none">Cancel</button>
                <button class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-500 focus:outline-none">Assign Permission</button>
            </div>
        </form>
    </div>



</x-admin-layout>
