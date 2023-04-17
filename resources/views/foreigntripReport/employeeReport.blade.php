

@extends('layout.master')
@section('content')
<div>
    <div class="pull-right">
        <a id="back"class="btn btn-sm btn-primary" href="{{ route('foreigntrip.index') }}">
            {{ trans('foreigntrip.Back') }}</a>
    </div>
<div  class="text-center">
    <img src="{{ asset('dist/img/foreigntrip.png') }}" alt="logo">
    <br>
    <h5>ریاست پلان و پالیسی</h5>
    <h5>آمریت ارتباط خارجه</h5>
    <h3>سیستم سفرهای خارجی کارمندان وزارت</h3>


</div><br>
<br>
<h4 class="text-center">{{ trans('foreigntrip.report') }}</h4>

<hr>

<form action="{{ route('searchforeigntrip') }}" method="get">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>{{ trans('foreigntrip.emp_id') }}:</strong>
                <select id="select2"class="form-select" id="single-select-clear-field" name="emp_id"
                    data-placeholder="{{ trans('foreigntrip.select employee') }}">


                    <option value="">-- Select Employee --</option>


                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">' اسم :'
                            {{ $employee->Name .
                                ' تخلص :' .
                                $employee->LastName .
                                ' ولد :' .
                                $employee->FatherName .
                                ' وظیفه : ' .
                                $employee->JobTitle }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('department_id'))
                    <span class="text-danger">{{ $errors->first('department_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>{{ trans('foreigntrip.department_id') }}:</strong>
                <select id="selectsearch"class="form-select" id="single-select-clear-field" name="department_id"
                    data-placeholder="{{ trans('foreigntrip.department_id') }}">

                    <option value="">-- Select Department --</option>


                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">
                            {{ $department->Name }}
                        </option>
                    @endforeach

                </select>
                @if ($errors->has('department_id'))
                    <span class="text-danger">{{ $errors->first('department_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>{{ trans('foreigntrip.date') }}:</strong>
                <div class="input-group date">
                    <input type="text" id="datepicker" name="from_date_of_program" placeholder="date_of_program"
                        class="form-control" />
                    <span class="input-group-append">
                        <span class="input-group-text bg-white">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>


            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>{{ trans('foreigntrip.date1') }}:</strong>
                <div class="input-group date">
                    <input type="text" id="datepicker1" name="to_date_of_program" placeholder="date_of_program"
                        class="form-control" />
                    <span class="input-group-append">
                        <span class="input-group-text bg-white">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>


            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>{{ trans('foreigntrip.participation_id') }}:</strong>
                <select id="select" class="form-select" id="single-select-clear-field"
                    name="participation_id" data-placeholder="{{ trans('foreigntrip.participation_id') }}">

                    <option value="">-- Select Participation Type --</option>

                    @foreach ($participations as $participation)
                        <option value="{{ $participation->id }}">{{ $participation->Name }}
                        </option>
                    @endforeach

                </select>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>{{ trans('foreigntrip.program_name') }}:</strong>
                <input type="text" name="program_name" placeholder="{{ trans('foreigntrip.program_name') }}" class="form-control" />
                @if ($errors->has('program_name'))
                    <span class="text-danger">{{ $errors->first('program_name') }}</span>
                @endif
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary"   name="search"><a target="_blank"></a>{{ trans('foreigntrip.search') }}</button>

        </div>



    </div>

</form>
</div>
<hr>
@endsection
