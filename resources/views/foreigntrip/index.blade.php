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
    <div class="container-md">
        <div class="row">
            <div class="text-center">
                <img src="{{ asset('dist/img/foreigntrip.png') }}" alt="logo">
                <br>
                <h5>ریاست پلان و پالیسی</h5>
                <h5>آمریت ارتباط خارجه</h5>
                <h4>سیستم سفرهای خارجی کارمندان وزارت</h3>


            </div>
            <hr>
            <br>


            <div class="row text-center">
                {{-- <div class="d-flex justify-content-between"></div> --}}
                {{-- <div class="col-xs-12 col-sm-12 col-md-1 text-right">
                        <a class="btn btn-success pull-right" href="{{ route('employeeReport') }}">Export Pdf</a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2">
                <a class="btn btn-secondary" href="{{ route('employeeView') }}">view</a>
            </div> --}}
            <div class="col-md-2" style="align-content: center">
                <a class="btn btn-success" href="{{ route('foreigntrip.create') }}">
                    {{ trans('foreigntrip.Create New Employee') }}</a>

            </div>
            <div class="col-md-8">
                <form method="get" action="{{ route('searchemployee') }}">
                    @csrf
                    <div class="input-group">
                        <input type="text" placeholder="{{ trans('foreigntrip.Search Firstname and Lastname') }}" value="" name="search" class="form-control" />
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search fa-fw"></i></button>
                        </span>
                    </div>
                </form>


            </div>
            <br>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif


        <br>
        <table id="my-table" class="table table-bordered table-responsive">
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
                {{-- <th>{{ trans('foreigntrip.participation_id') }}</th>
                <th>{{ trans('foreigntrip.pre_trip_date') }}</th>
                <th>{{ trans('foreigntrip.pre_trip_subject') }}</th>
                <th>{{ trans('foreigntrip.ministry_approval') }}</th>
                <th>{{ trans('foreigntrip.agree_mof') }}</th>
                <th>{{ trans('foreigntrip.order_of_authority') }}</th>
                <th>{{ trans('foreigntrip.participant_grantee') }}</th> --}}
                <th>{{ trans('foreigntrip.participation') }}</th>
                <th>{{ trans('foreigntrip.report_date') }}</th>
                <th>{{ trans('foreigntrip.report_image') }}</th>
                <th>{{ __('foreigntrip.considerations') }}</th>
                <th width="280px">{{ trans('foreigntrip.Action') }}</th>

            </tr>

            @foreach ($foreigntrips as $foreigntrip)
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
                {{-- <td>{{ $foreigntrip->participations->Name }}</td>
                <td>{{ $foreigntrip->pre_trip_date }}</td>
                <td>{{ $foreigntrip->pre_trip_subject }}</td>
                <td>{{ $foreigntrip->ministry_approval }}</td>
                <td>{{ $foreigntrip->agree_mof }}</td>
                <td>{{ $foreigntrip->order_of_authority }}</td>
                <td>{{ $foreigntrip->participant_grantee }}</td> --}}
                <td>{{ $foreigntrip->participation }}</td>
                <td>{{ $foreigntrip->report_date }}</td>
                <td><img style="height:50px;width:50px;" class="form-control" src="{{asset('/reportImages/'.$foreigntrip->report_image) }}"></td>
                <td>{{ $foreigntrip->considerations }}</td>

                <td>
                    <form action="{{ route('foreigntrip.destroy', $foreigntrip->id) }}" method="POST">

                        <a class="btn btn-sm btn-info" href="{{ route('foreigntrip.show', $foreigntrip->id) }}">{{ trans('foreigntrip.show') }}</a>

                        <a class="btn btn-sm btn-primary" href="{{ route('foreigntrip.edit', $foreigntrip->id) }}">{{ trans('foreigntrip.edit') }}</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger">{{ trans('foreigntrip.delete') }}</button>
                    </form>
                </td>

            </tr>
            @endforeach

        </table>

        {!! $foreigntrips->links() !!}

    </div>

    </div>

</body>

</html>
@endsection