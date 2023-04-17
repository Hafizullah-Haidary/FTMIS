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
        footer{
            margin-top: 80%
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
        @page{
            size: landscape;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">

</head>
<body>
    <div class="container-xxl">
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


            <table class="table table-bordered table-responsive">
                <tr>

                    <th>{{ trans('foreigntrip.id') }}</th>
                    <th>{{ trans('foreigntrip.emp_id') }}</th>
                    <th>{{ trans('foreigntrip.department_id') }}</th>
                    <th>{{ trans('foreigntrip.program_name') }}</th>
                    <th>{{ trans('foreigntrip.inviter_id') }}</th>
                    <th>{{ trans('foreigntrip.date_of_program') }}</th>
                    <th>{{ trans('foreigntrip.eventPlace') }}</th>
                    <th>{{ trans('foreigntrip.doner_id') }}</th>
                    <th>{{ trans('foreigntrip.commitee_date') }}</th>
                    <th>{{ trans('foreigntrip.participation_id') }}</th>
                    <th>{{ trans('foreigntrip.pre_trip_date') }}</th>
                    <th>{{ trans('foreigntrip.pre_trip_subject') }}</th>
                    <th>{{ trans('foreigntrip.ministry_approval') }}</th>
                    <th>{{ trans('foreigntrip.agree_mof') }}</th>
                    <th>{{ trans('foreigntrip.order_of_authority') }}</th>
                    <th>{{ trans('foreigntrip.participant_grantee') }}</th>
                    <th>{{ trans('foreigntrip.participation') }}</th>
                    <th>{{ trans('foreigntrip.report_date') }}</th>
                    <th>{{ trans('foreigntrip.report_image') }}</th>
                    <th>{{ __('foreigntrip.considerations') }}</th>


                </tr>
                <tr>

                    <td>{{ $foreigntrip->id }}</td>
                    <td>{{ $foreigntrip->employee->Name }}</td>
                    <td>{{ $foreigntrip->department->Name }}</td>
                    <td>{{ $foreigntrip->program_name }}</td>
                    <td>{{ $foreigntrip->InvitingAuthority->Name }}</td>
                    <td>{{ $foreigntrip->date_of_program }}</td>
                    <td>{{ $foreigntrip->eventPlace }}</td>
                    <td>{{ $foreigntrip->doner->Name }}</td>
                    <td>{{ $foreigntrip->commitee_date }}</td>
                    <td>{{ $foreigntrip->participations->Name }}</td>
                    <td>{{ $foreigntrip->pre_trip_date }}</td>
                    <td>{{ $foreigntrip->pre_trip_subject }}</td>
                    <td>{{ $foreigntrip->ministry_approval }}</td>
                    <td>{{ $foreigntrip->agree_mof }}</td>
                    <td>{{ $foreigntrip->order_of_authority }}</td>
                    <td>{{ $foreigntrip->participant_grantee }}</td>
                    <td>{{ $foreigntrip->participation }}</td>
                    <td>{{ $foreigntrip->report_date }}</td>
                    <td>{{$foreigntrip->report_image}}</td>
                    <td>{{ $foreigntrip->considerations }}</td>
                </tr>
            </table>

            </body>
            </html>
@endsection
