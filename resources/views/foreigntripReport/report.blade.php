<html>

<head>
    @include('layout.css')
    <style>
        @media print {
            #printPageButton {
                display: none;

            }





            table {
                font-size: 13px
            }



            /*
            .table td {
                padding: 0.75rem;
                vertical-align: middle;
                text-align: center;
                font-size: 110px
            }

            .table thead th {
                vertical-align: middle;
                border-bottom: 2px solid #dee2e6;
                text-align: center;
                font-size: 110px
            }

            table,
            th,
            td {
                border: 1px solid black;
            } */



            /* .page-break  { display: block; page-break-before: always; } */

            #back {
                display: none
            }

        }


        @page {
            size: landscape;

            margin-left: 2mm;
            margin-right: 2mm;
            margin-top: 2mm;
            margin-bottom: 5mm
        }

        .table td {
            padding: 0.75rem;
            vertical-align: middle;
            text-align: center;
            font-size: 12px;

            word-wrap: break-word;

        }

        .table thead th {
            vertical-align: middle;
            border-bottom: 2px solid #dee2e6;
            text-align: center;
            font-size: 12px
        }

        body {
            width: fit-content;
            block-size: fit-content;
            margin-top: 1mm;

        }

        table {
            font-size: 14px;
            word-wrap: break-word;
        }

        @media (max-width: 420px) and (orientation: landscape),
        (max-height: 560px) body {
            margin: 0 auto;
        }
    </style>

</head>

<body>

    <div class="pull-right">
        <a id="back"class="btn btn-sm btn-primary" href="{{ route('foreigntripReport') }}">
            {{ trans('foreigntrip.Back') }}</a>
    </div>
    <div>
        <header>
            <div style="text-align:center">
                <img src="{{ asset('dist/img/foreigntrip.png') }}" alt="logo" style="">
                <br>
                <h5>ریاست پلان و پالیسی</h5>
                <h5>آمریت ارتباط خارجه</h5>
                <h4>دیتابیس سفرهای خارجی کارمندان وزارت</h4>


            </div>
            <div>
        </header>
    </div>


    <form action="{{ route('searchforeigntrip') }}" method="get">
        <table class="table table-bordered tableToPrint entire-webpage">
            <thead>
                <tr>
                    <th>{{ trans('foreigntrip.id') }}</th>
                    <th>{{ trans('foreigntrip.emp_id') }}</th>
                    <th>{{ trans('foreigntrip.LastName') }}</th>
                    <th>{{ trans('foreigntrip.FatherName') }}</th>
                    <th>{{ trans('foreigntrip.JobTitle') }}</th>
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
                    <th>{{ __('foreigntrip.considerations') }}</th>

                </tr>
            </thead>
            @if (count($foreigntrips))
                @foreach ($foreigntrips as $foreigntrip)
                    <tr>
                        <td>{{ $foreigntrip->id }}</td>
                        <td>{{ $foreigntrip->employee->Name }}</td>
                        <td>{{ $foreigntrip->employee->LastName }}</td>
                        <td>{{ $foreigntrip->employee->FatherName }}</td>
                        <td>{{ $foreigntrip->employee->JobTitle }}</td>
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
                        <td>{{ $foreigntrip->considerations }}</td>



                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center"colspan="20">No User Found</td>
                </tr>
            @endif
        </table>

    </form>
    </div>
    <div class="container bg-light">
        <div class="col-md-12 text-center">
            <button id="printPageButton" type="button" class="btn btn-primary" onclick="window.print();"><i
                    class="fa fa-print"></i>پرینت</button>

        </div>
    </div>

    <script>
        function Print() {
            $(".tableToPrint td, .tableToPrint th").each(function() {
                $(this).css("width", $(this).width() + "px")
            });
            $(".tableToPrint tr").wrap("<div class='avoidBreak'></div>");
            window.print();
        }
    </script>

</body>

</html>
