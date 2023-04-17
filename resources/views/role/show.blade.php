@extends('layout.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Roles List
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                Id
                            </th>
                            <td>
                                {{ $role->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                               Roles
                            </th>
                            <td>
                                {{ $role->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Permissions
                            </th>
                            <td>
                                @foreach($role->permissions()->pluck('name') as $permission)
                                    <span class="label label-info label-many">{{ $permission }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-sm btn-default" href="{{ url()->previous() }}">
                    Back
                </a>
            </div>

            <nav class="mb-3">
                <div class="nav nav-tabs">

                </div>
            </nav>
            <div class="tab-content">

            </div>
        </div>
    </div>
</div>

@endsection
