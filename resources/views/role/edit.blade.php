@extends('layout.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Edit Roles
        </div>

        <div class="card-body">
            <form action="{{ route("role.update", [$role->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($role) ? $role->name : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif

                </div>
                <div class="form-group {{ $errors->has('guard_name') ? 'has-error' : '' }}">
                    <label for="name">Guard</label>
                    <input type="text" id="guard_name" name="guard_name" class="form-control" value="{{ old('guard_name', isset($role) ? $role->guard_name : '') }}" required>
                    @if($errors->has('guard_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('guard_name') }}
                        </em>
                    @endif

                </div>
                <div class="form-group {{ $errors->has('permission') ? 'has-error' : '' }}">
                    <label for="permission">Permissions
                       </label>
                    <select name="permission[]" id="permission" class="form-control select2" multiple="multiple" required>
                        @foreach($permissions as $id => $permissions)
                            <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('permission'))
                        <em class="invalid-feedback">
                            {{ $errors->first('permission') }}
                        </em>
                    @endif

                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('save') }}">
                </div>
            </form>


        </div>
    </div>
</div>

@endsection
