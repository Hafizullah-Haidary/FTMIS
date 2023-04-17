@extends('layout.master')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <h2>{{ trans('foreigntrip.editEmployee') }}</h2>
                </div>
                <br>
                                    <div class="pull-right">
                    <a class="btn btn-sm btn-primary" href="{{ route('employee.index') }}"> {{ trans('foreigntrip.Back') }}</a>
                </div>
            </div>
        </div>
        <br>

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

        <form action="{{ route('foreigntrip.update', $foreigntrip->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.emp_id') }}:</strong>
                            <select id="select2"class="form-select" id="single-select-clear-field" name="emp_id"
                                data-placeholder="Select Employee">


                                <option value="">-- Select Employee --</option>


                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}"
                                        {{ $employee->id == $foreigntrip->emp_id ? 'selected' : '' }}>
                                        ' اسم :'
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
                        </div>
                    </div>





                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.department_id') }}:</strong><br>
                            <select id="selectsearch"class="form-select" id="single-select-clear-field" name="department_id"
                                data-placeholder="Select Department">

                                <option value="">-- Select Department --</option>

                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"
                                        {{ $department->id == $foreigntrip->department_id ? 'selected' : '' }}>
                                        {{ $department->Name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.program_name') }}:</strong>
                            <input type="text" name="program_name" placeholder="program_name"
                                value="{{ $foreigntrip->program_name }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.inviter_id') }}:</strong><br>
                            <select id="search"class="form-select" id="single-select-clear-field" name="inviter_id"
                                data-placeholder="Select Inviter">

                                <option value="">-- Select Inviters --</option>

                                @foreach ($inviters as $inviter)
                                    <option value="{{ $inviter->id }}"
                                        {{ $inviter->id == $foreigntrip->inviter_id ? 'selected' : '' }}>
                                        {{ $inviter->Name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.date_of_program') }}:</strong>
                            <input  type="text" name="date_of_program" placeholder="date_of_program"
                                value="{{ $foreigntrip->date_of_program }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.eventPlace') }}:</strong>
                            <input type="text" name="eventPlace" placeholder="eventPlace"
                                value="{{ $foreigntrip->eventPlace }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.doner_id') }}:</strong><br>
                            <select id="selecttwo" class="form-select" id="single-select-clear-field" name="doner_id"
                                data-placeholder="Select Doner">

                                <option value="">-- Select doner --</option>

                                @foreach ($doners as $doner)
                                    <option value="{{ $doner->id }}"
                                        {{ $doner->id == $foreigntrip->doner_id ? 'selected' : '' }}>{{ $doner->Name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.commitee_date') }}:</strong>
                            <input type="text" name="commitee_date" placeholder="commitee_date"
                                value="{{ $foreigntrip->commitee_date }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.participation_id') }}:</strong><br>
                            <select id="select" class="form-select" id="single-select-clear-field"
                                name="participation_id" data-placeholder="Select Participation Type">

                                <option value="">-- Select Participation Type --</option>

                                @foreach ($participations as $participation)
                                    <option value="{{ $participation->id }}"
                                        {{ $participation->id == $foreigntrip->participation_id ? 'selected' : '' }}>
                                        {{ $participation->Name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.pre_trip_date') }}:</strong>
                            <input type="text" name="pre_trip_date" placeholder="pre_trip_date"
                                value="{{ $foreigntrip->pre_trip_date }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.pre_trip_subject') }}:</strong>
                            <input type="text" name="pre_trip_subject" placeholder="pre_trip_subject"
                                value="{{ $foreigntrip->pre_trip_subject }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.ministry_approval') }}:</strong>
                            <input type="text" name="ministry_approval" placeholder="ministry_approval"
                                value="{{ $foreigntrip->ministry_approval }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.agree_mof') }}:</strong>
                            <input type="text" name="agree_mof" placeholder="agree_mof"
                                value="{{ $foreigntrip->ministry_approval }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.order_of_authority') }}:</strong>
                            <input type="text" name="order_of_authority" placeholder="order_of_authority"
                                value="{{ $foreigntrip->ministry_approval }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.participant_grantee') }}:</strong>
                            <input type="text" name="participant_grantee" placeholder="participant_grantee"
                                value="{{ $foreigntrip->participant_grantee }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.participation') }}:</strong>
                            <input type="text" name="participation" placeholder="اشتراک یا عدم اشتراک"
                                value="{{ $foreigntrip->participation }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.report_date') }}:</strong>
                            <input type="text" name="report_date" placeholder="report_date"
                                value="{{ $foreigntrip->report_date }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="form-group">

                        <label for="report_image">{{trans('foreigntrip.report_image')}}</label>
                        <input type="file" name="report_image" class="form-control-file" id="report_image">
                        @php
                            $imageName=$foreigntrip->report_image;
                        @endphp
                        <br>
                        <img style="height:100px;width:100px;" src="{{url('reportImages/'.$imageName)}}" alt="image">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.considerations') }}:</strong>
                            <input type="text" name="considerations" placeholder="considerations"
                                value="{{ $foreigntrip->considerations }}" class="form-control" />
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-sm btn-primary pull-rigth">{{ trans('foreigntrip.Update') }}</button>
                    </div>
                    <br>
                    <br>
                    <hr>


                </div>

        </form>
    </div>
@endsection
