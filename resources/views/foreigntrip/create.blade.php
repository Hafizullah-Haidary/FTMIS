@extends('layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <h3 style="text-align: right">{{ trans('foreigntrip.addnew') }}</h3>



                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('foreigntrip.index') }}"> {{ trans('foreigntrip.Back') }}</a>
                </div>
            </div>
            <form action="{{ route('foreigntrip.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7">
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

                    <div class="col-xs-12 col-sm-12 col-md-7">
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


                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.program_name') }}:</strong>
                            <input type="text" name="program_name" placeholder="{{ trans('foreigntrip.program_name') }}" class="form-control" />
                            @if ($errors->has('program_name'))
                                <span class="text-danger">{{ $errors->first('program_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.inviter_id') }}:</strong>
                            <select id="search"class="form-select" id="single-select-clear-field" name="inviter_id"
                                data-placeholder="{{ trans('foreigntrip.inviter_id') }}">

                                <option value="">-- Select Inviters --</option>

                                @foreach ($inviters as $inviter)
                                    <option value="{{ $inviter->id }}">{{ $inviter->Name }}
                                    </option>
                                @endforeach

                            </select>
                            @if ($errors->has('inviter_id'))
                                <span class="text-danger">{{ $errors->first('inviter_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.date_of_program') }}:</strong>
                            <div class="input-group date">
                                <input type="text" id="datepicker" name="date_of_program" placeholder="{{ trans('foreigntrip.date_of_program') }}"
                                    class="form-control" />

                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                            </div>

                            @if ($errors->has('date_of_program'))
                            <span class="text-danger">{{ $errors->first('date_of_program') }}</span>
                        @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.eventPlace') }}:</strong><br>
                            <input type="text" name="eventPlace" placeholder="{{ trans('foreigntrip.eventPlace') }}" class="form-control" />

                            @if ($errors->has('eventPlace'))
                                <span class="text-danger">{{ $errors->first('eventPlace') }} <i
                                        class="fa fa-calender"></i></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.doner_id') }}:</strong>
                            <select id="selecttwo" class="form-select" id="single-select-clear-field" name="doner_id"
                                data-placeholder="{{ trans('foreigntrip.doner_id') }}">

                                <option value="">-- Select doner --</option>

                                @foreach ($doners as $doner)
                                    <option value="{{ $doner->id }}">{{ $doner->Name }}
                                    </option>
                                @endforeach

                            </select>
                            @if ($errors->has('doner_id'))
                                <span class="text-danger">{{ $errors->first('doner_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">

                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.commitee_date') }}:</strong>
                            <div class="input-group date">
                                <input id="datepicker3" type="text" name="commitee_date" placeholder="{{ trans('foreigntrip.commitee_date') }}"
                                    class="form-control" />
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>


                            </div>
                            @if ($errors->has('commitee_date'))
                            <span class="text-danger">{{ $errors->first('commitee_date') }}</span>
                        @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
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
                            @if ($errors->has('participation_id'))
                                <span class="text-danger">{{ $errors->first('participation_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">

                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.pre_trip_date') }}:</strong>
                            <div class="input-group date">
                                <input id="datepicker2" type="text" name="pre_trip_date" placeholder="{{ trans('foreigntrip.pre_trip_date') }}"
                                    class="form-control" />
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                                @if ($errors->has('pre_trip_date'))
                                    <span class="text-danger">{{ $errors->first('pre_trip_date') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.pre_trip_subject') }}:</strong>
                            <input type="text" name="pre_trip_subject" placeholder="{{ trans('foreigntrip.pre_trip_subject') }}"
                                class="form-control" />
                            @if ($errors->has('pre_trip_subject'))
                                <span class="text-danger">{{ $errors->first('pre_trip_subject') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.ministry_approval') }}:</strong>
                            <input type="text" name="ministry_approval" placeholder="{{ trans('foreigntrip.ministry_approval') }}"
                                class="form-control" />
                            @if ($errors->has('ministry_approval'))
                                <span class="text-danger">{{ $errors->first('ministry_approval') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.order_of_authority') }}:</strong>
                            <input type="text" name="order_of_authority" placeholder="{{ trans('foreigntrip.order_of_authority') }}"
                                class="form-control" />
                            @if ($errors->has('order_of_authority'))
                                <span class="text-danger">{{ $errors->first('order_of_authority') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.agree_mof') }}:</strong>
                            <input type="text" name="agree_mof" placeholder="{{ trans('foreigntrip.agree_mof') }}" class="form-control" />
                            @if ($errors->has('agree_mof'))
                                <span class="text-danger">{{ $errors->first('agree_mof') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.participant_grantee') }}:</strong>
                            <input type="text" name="participant_grantee" placeholder="{{ trans('foreigntrip.participant_grantee') }}"
                                class="form-control" />
                            @if ($errors->has('participant_grantee'))
                                <span class="text-danger">{{ $errors->first('participant_grantee') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.participation') }}:</strong>
                            <input type="text" name="participation" placeholder="اشتراک یا عدم اشتراک"
                                class="form-control" />
                            @if ($errors->has('participation'))
                                <span class="text-danger">{{ $errors->first('participation') }}</span>
                            @endif
                        </div>
                    </div>

                        {{-- <div class="form-group">
                    <strong>Participation:</strong>

                    <input type="checkbox" name="participation" placeholder="Participation"
                        class="form-control" />
                </div> --}}

                    <div class="col-xs-12 col-sm-12 col-md-7">

                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.report_date') }}:</strong>
                            <div class="input-group date">
                                <input id="datepicker1" type="text" name="report_date" placeholder="تاریخ گزارش"
                                    class="form-control" />
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>

                            </div>
                            @if ($errors->has('report_date'))
                            <span class="text-danger">{{ $errors->first('report_date') }}</span>
                        @endif
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="report_image">{{trans('foreigntrip.report_image')}}</label>
                        <input type="file" name="report_image" class="form-control" id="report_image">
                      </div>
                    </div>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-7">

                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.report_date') }}:</strong>
                            <div class="input-group date">
                                <input id="datepicker1" type="text" name="report_date" placeholder="report_date"
                                    class="form-control" />
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                                @if ($errors->has('report_date'))
                                    <span class="text-danger">{{ $errors->first('report_date') }}</span>
                                @endif
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>{{ trans('foreigntrip.considerations') }}:</strong><br>
                            <textarea name="considerations" id="" cols="84" rows="10"></textarea>
                            {{-- <input type="text" name="consideration" placeholder="consideration" class="form-control" /> --}}
                        </div>
                    </div>
                </div>
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary pull-center">{{ trans('foreigntrip.save') }}</button>
        </div>
        <br>
        <br>
        <hr>
    </div>


    </form>


    </div>
@endsection
