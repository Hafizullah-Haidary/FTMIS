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
            <a class="btn btn-success" href="{{ route('employee.create') }}"> Create New </a>
            {{-- <div class="pull-right">

            </div> --}}
        </div>
        <div class="col-md-7">
            <form method="POST" action="{{ route('searchname') }}" >
                @csrf
                <div class="input-group">
                    <input type="text" placeholder="Search Firstname and Lastname" name="search" class="form-control" />
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </span>
                </div>
            </form>


        </div>
    </div>
    <br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>LastName</th>
            <th>FatherName</th>
            <th>EnglsihName</th>
            <th>JobTitle</th>
            <th>Email</th>
            <th>Phone</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employee)

        <tr>

            <td width="2px">{{$employee->id}}</td>
            <td>{{ $employee->Name }}</td>
            <td>{{ $employee->LastName }}</td>
            <td>{{ $employee->FatherName }}</td>
            <td>{{ $employee->EnglishName }}</td>
            <td>{{ $employee->JobTitle }}</td>
            <td>{{ $employee->Email }}</td>
            <td>{{ $employee->Phone }}</td>

            <td>
                <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">

                    <a class="btn btn-sm btn-info" href="{{ route('employee.show',$employee->id) }}">Show</a>

                    <a class="btn btn-sm btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{-- {{ $employees->onEachSide(5)->links() }} --}}

    {{-- {!! $employees->links() !!} --}}
    {!! $employees->appends(['sort' => 'id'])->links() !!}

   </div>
@endsection
