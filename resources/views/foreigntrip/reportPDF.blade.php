<html dir="rtl">
    <head>
        <meta charset="UTF-8">
        <style>
            @font-face {
            font-family: 'BNaznnBd';
            src: url('/fonts/BNaznnBd.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
}
body {
    font-family: 'BNaznnBd', sans-serif;
}

        </style>
    </head>
    <body>

        <table class="table table-bordered justify-content-center">
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
                <th>{{ __('foreigntrip.considerations') }}</th>

            </tr>

            @foreach ($foreigntrips as $foreigntrip)
                <tr>
                    <td>{{ $foreigntrip->id}}</td>
                    <td>{{ $foreigntrip->employee->Name}}</td>
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

        </table>

    </body>
</html>
