
@extends('layout.master')

@section('title')
    Roles
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Roles Table</h3>
                <div class="card-tools">
                    {{-- @can('role-create') --}}
                        <a href="{{ route('role.create') }} " class="btn btn-primary"><i class="fas fa-shield-alt"></i> Add new
                            Role</a>
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Guard</th>
                            <th>Permission</th>
                            <th>Date Posted</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        <button class="btn btn-sm btn-warning" role="button"><i class="fas fa-shield-alt"></i>
                                            {{ $permission->name }}</button>
                                    @endforeach
                                </td>
                                <td><span class="tag tag-success">{{ $role->created_at }}</span></td>
                                <td>
                                    {{-- @can('role-delete') --}}
                                        <a class="btn btn-xs btn-sm btn-primary" href="{{ route('role.show', $role->id) }}">
                                            view
                                        </a>
                                    {{-- @endcan --}}
{{--
                                    @can('role-edit') --}}
                                        <a class="btn btn-xs btn-info" href="{{ route('role.edit', $role->id) }}">
                                            Edit
                                        </a>
                                    {{-- @endcan --}}
                                    {{-- @can('role-delete') --}}
                                        <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                                            onsubmit="return confirm('are you sure?');" style="display: inline-block;">
                                            <input type="hidden"  name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-sm btn-danger" value="Delete">
                                        </form>
                                    {{-- @endcan --}}



                                </td>
                                {{--  <td>
                            <a href="{{ route('role.show', $role->id ) }}" class="btn btn-info">Change Permission</a>
                            <a href="{{ route('role.destroy',$role->id ) }}" class="btn btn-danger">Delete</a>
                        </td>  --}}
                            </tr>
                        @empty
                            <tr>
                                <td><i class="fas fa-folder-open"></i> No Record found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
