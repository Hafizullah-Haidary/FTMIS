@extends('layout.master')
@section('content')

<div class="card">
    <div class="card-header">
       Roles
    </div>

    <div class="card-body">
        <form action="{{ route("role.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>RoleName</strong><br>
                    <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                        @foreach($roles as $id => $roles)
                            <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                </div>
            </div> --}}
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name</strong>
                    <br>

                    {!! Form::select('roles[]', $roles, array('class' => 'form-control','multiple')) !!}
                </div>
            </div> --}}
            <div class="form-group {{ $errors->has('guard_name') ? 'has-error' : '' }}">
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
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('guard_name') }}
                    </em>
                @endif

            </div>
            {{-- <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Permissions</strong>
                    {!! Form::select('permissions[]', $permissions,[], array('class' => 'form-control','multiple')) !!}
                </div>
            </div> --}}

            <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                <label for="permission">Select permissions
                    </label>
                <select name="permission[]" id="permission" class="form-control select2" multiple="multiple" required>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permission', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permission'))
                    <em class="invalid-feedback">
                        {{ $errors->first('permission') }}
                    </em>
                @endif

            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="save">
            </div>
        </form>


    </div>
</div>
@endsection
