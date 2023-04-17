
@extends('layout.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
           <h2>Edit Roles</h2>
        </div>

        <div class="card-body">
            <form action="{{ route("permission.update", [$permission->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Permission Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif

                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('foreigntrip.save') }}">
                </div>
            </form>


        </div>
    </div>
</div>

@endsection
