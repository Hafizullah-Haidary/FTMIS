@extends('layout.master')
{{-- @include('partials.alert') --}}
@section('content')
<div class="container">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("user.create") }}">
                Create User
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        Employee List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                           Id
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                           Email
                        </th>
                        <th>
                           Roles
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $user->id ?? '' }}
                            </td>
                            <td>
                                {{ $user->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            <td>
                                @foreach($user->roles()->pluck('name') as $role)
                                    <span class="badge badge-info">{{ $role }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-xs btn-sm btn-primary" href="{{ route('user.show', $user->id) }}">
                                    view
                                </a>

                                <a class="btn btn-xs btn-sm btn-info" href="{{ route('user.edit', $user->id) }}">
                                   Edit
                                </a>

                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('are you sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-sm btn-danger" value="Delete">
                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
</div>


@endsection
