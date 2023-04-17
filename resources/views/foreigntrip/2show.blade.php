@extends('layout.master')

@section('content')
<html dir="rtl" lang="da">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            border-color: black;
            font-size: 13px;
        }

        th {
            height: 10px;
            text-align: center;
            vertical-align: center;

        }

        /* styles for screens smaller than 600px */
        @media (max-width: 600px) {
            /* adjust layout for small screens */
        }

        /* styles for screens between 600px and 1200px */
        @media (min-width: 600px) and (max-width: 1200px) {
            /* adjust layout for medium screens */
        }

        /* styles for screens larger than 1200px */
        @media (min-width: 1200px) {
            /* adjust layout for large screens */
        }



        .table td,
        .table th {
            padding: 0.75rem;
            vertical-align: middle;
            border-top: 1px solid #dee2e6;
        }

        .table td {
            height: 12px;
        }

        td {

            text-align: center;
            vertical-align: center;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">

</head>
<body>


    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <h2> {{ trans('foreigntrip.showEmployee') }}</h2>
                </div>
                <br>
                <br>
                <div class="pull-right">
                    <br>
                    <a class="btn btn-sm btn-primary" href="{{ route('foreigntrip.index') }}"> {{ trans('foreigntrip.Back') }}</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.emp_id') }}:</strong>
                    {{ $foreigntrip->employee->Name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.department_id') }}:</strong>
                    {{ $foreigntrip->department->Name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.program_name') }}:</strong>
                    {{ $foreigntrip->program_name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.inviter_id') }}:</strong>
                    {{ $foreigntrip->invitingAuthority->Name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.date_of_program') }}:</strong>
                    {{ $foreigntrip->date_of_program }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.eventPlace') }}:</strong>
                    {{ $foreigntrip->eventPlace }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>d{{ trans('foreigntrip.doner_id') }}:</strong>
                    {{ $foreigntrip->doner->Name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>d{{ trans('foreigntrip.commitee_date') }}:</strong>
                    {{ $foreigntrip->commitee_date }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.participation_id') }}:</strong>
                    {{ $foreigntrip->participations->Name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>>{{ trans('foreigntrip.pre_trip_date') }}:</strong>
                    {{ $foreigntrip->pre_trip_date }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.pre_trip_subject') }}:</strong>
                    {{ $foreigntrip->pre_trip_subject }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.ministry_approval') }}:</strong>
                    {{ $foreigntrip->ministry_approval }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.agree_mof') }}:</strong>
                    {{ $foreigntrip->agree_mof }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.order_of_authority') }}:</strong>
                    {{ $foreigntrip->order_of_authority }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.participant_grantee') }}:</strong>
                    {{ $foreigntrip->participant_grantee }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.participation') }}:</strong>
                    {{ $foreigntrip->participation }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.report_date') }}:</strong>
                    {{ $foreigntrip->report_date }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ trans('foreigntrip.considerations') }}:</strong>
                    {{ $foreigntrip->considerations }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
