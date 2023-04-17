@extends('layout.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employee.store') }}" method="POST">
        @csrf

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="Name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7">
                <div class="form-group">
                    <strong>LastName:</strong>
                    <input type="text"  name="LastName" placeholder="LastName" class="form-control"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7">
                <div class="form-group">
                    <strong>FatherName:</strong>
                    <input type="text"  name="FatherName" placeholder="FatherName" class="form-control"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7">
                <div class="form-group">
                    <strong>EnglishName:</strong>
                    <input type="text"  name="EnglishName" placeholder="EnglishName" class="form-control"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7">
                <div class="form-group">
                    <strong>JobTitle:</strong>
                    <input type="text"  name="JobTitle" placeholder="JobTitle" class="form-control"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text"  name="Email" placeholder="Email" class="form-control"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text"  name="Phone" placeholder="Phone" class="form-control"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 pull-right">
                    <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>

    </form>
</div>
@endsection
