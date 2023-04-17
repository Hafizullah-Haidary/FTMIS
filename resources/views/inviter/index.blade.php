@extends('layout.master')

@section('content')
<br>
<div  class="text-center">
    <h5>ریاست پلان و پالیسی</h5>
    <h5>آمریت ارتباط خارجه</h5>
    <h3>دیتابیس سفرهای خارجی کارمندان وزارت</h3>


</div><br>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-success" href="{{ route('inviter.create') }}"> Create New Inviter</a>
                {{-- <div class="pull-right">

                </div> --}}
            </div>
            <div class="col-md-9">
                <form method="post" action="{{ route('searchinviter') }}" >
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
                <th>Id</th>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($inviters as $inviter)
            <tr>
                <td width="2px">{{ $inviter->id }}</td>
                <td>{{ $inviter->Name }}</td>


                <td>
                    <form action="{{ route('inviter.destroy',$inviter->id) }}" method="POST">

                        <a class="btn btn-sm btn-info" href="{{ route('inviter.show',$inviter->id) }}">Show</a>

                        <a class="btn btn-sm btn-primary" href="{{ route('inviter.edit',$inviter->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

    </div>


@endsection
