@php
    $permissionsGroupName = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
@endphp


<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>Edit Role</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">Edit Role</h1>
        </div>
    </x-slot:content-header>

    <form class="row mt-4 g-3 form-horizontal" action="{{ route('admin.role.update', $role->id) }}" method="post">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}" id="name" placeholder="Enter role name">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Permissions -->
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Permissions</label>
            <div class="col-sm-10">

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="allPermissions">
                    <label class="form-check-label" for="allPermissions">
                        All Permissions
                    </label>
                </div>

                <hr>

                @foreach ($permissionsGroupName as $group)
                <div class="row">
                    <!-- Group Name -->
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="permissionGroupName{{ $group->group_name }}">
                            <label class="form-check-label" for="permissionGroupName{{ $group->group_name }}">
                                {{ Str::title($group->group_name) }}
                            </label>
                        </div>
                    </div>

                    @php
                        $permissions = DB::table('permissions')->select('name','id')->where('group_name', $group->group_name)->get()
                    @endphp
                    <!-- Permission Name -->
                    <div class="col-md-8">
                        @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="permission{{ $permission->id }}">
                            <label class="form-check-label" for="permission{{ $permission->id }}">
                                {{ Str::title(implode(' ', explode('.', $permission->name))) }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-primary text-bold">Update Role</button>
        </div>
    </form>

</x-app-layout>
