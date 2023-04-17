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
            <a class="btn btn-success" href="{{ route('doner.create') }}"> Create New Doner</a>
            {{-- <div class="pull-right">

            </div> --}}
        </div>
        <div class="col-md-9">
            <form method="post" action="{{ route('searchdoner') }}" >
                @csrf
                <div class="input-group">
                    <input type="text" placeholder="Search Doner" name="search" class="form-control" />
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


    <table class="table table-bordered">
        <tr>
            <th width='2px'>Id</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($doners as $doner)
        <tr>
            <td>{{ $doner->id }}</td>
            <td>{{ $doner->Name }}</td>


            <td>
                <form action="{{ route('doner.destroy',$doner->id) }}" method="POST">

                    <a class="btn btn-sm btn-info" href="{{ route('doner.show',$doner->id) }}">Show</a>

                    <a class="btn btn-sm btn-primary" href="{{ route('doner.edit',$doner->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
   </div>
{{--
    {!! $employee->links() !!} --}}

@endsection
