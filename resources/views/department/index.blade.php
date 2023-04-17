@extends('layout.master')

@section('content')
<br>
<div  class="text-center">
    <h5>ریاست پلان و پالیسی</h5>
    <h5>آمریت ارتباط خارجه</h5>
    <h3>سیستم سفرهای خارجی کارمندان وزارت</h3>


</div><br>
<br>
<div class="container">

    <div class="row">
        <div class="col-md-2">
            <a class="btn btn-success" href="{{ route('department.create') }}"> Create New</a>
            {{-- <div class="pull-right">

            </div> --}}
        </div>
        <div class="col-md-8">
            <form method="post" action="{{ route('searchdepartment') }}" >
                @csrf
                <div class="input-group">
                    <input type="text" placeholder="Search Department" name="search" class="form-control" />
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </span>
                </div>
            </form>


        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<br>
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($departments as $department)
        <div style="text-align: center">
            <tr>
                <td width="2px">{{ $department->id }}</td>
                <td>{{ $department->Name }}</td>


                <td>
                    <form action="{{ route('department.destroy',$department->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('department.show',$department->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('department.edit',$department->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        </div>

        @endforeach
    </table>

    {!! $departments->links() !!}

</div>

@endsection
