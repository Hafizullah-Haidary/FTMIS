<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Report;
use App\Models\Employee;
use App\Models\Department;
use App\Models\ForeignTrip;
use App\Models\NatureOfParticipation;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\ForeignKeyDefinition;

class ReportController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $departments = Department::all();
        $foreigntrips = ForeignTrip::all();
        $participations=NatureOfParticipation::all();
        return view('foreigntripReport.employeeReport', compact('employees', 'departments', 'foreigntrips','participations'));
    }
    public function search(Request $request)
    {

        if (isset($request->emp_id)) {
            $emp_id = $request->emp_id;
        } else {
            $emp_id = null;
        }
        if (isset($request->participation_id)) {
            $participation_id = $request->participation_id;
        } else {
            $participation_id = null;
        }
        if (isset($request->department_id)) {
            $department_id = $request->department_id;
        } else {
            $department_id = null;
        }
        if (isset($request->program_name)) {
            $program_name = $request->program_name;
        } else {
            $program_name = null;
        }
        if (isset($request->from_date_of_program)) {
            $from_date_of_program = $request->from_date_of_program;
        } else {
            $from_date_of_program = null;
        }
        if (isset($request->to_date_of_program)) {
            $to_date_of_program = $request->to_date_of_program;
        } else {
            $to_date_of_program = null;
        }
        if (isset($request->date_of_program)) {
            $date_of_program = $request->date_of_program;
        } else {
            $date_of_program = null;
        }
        // $employees = Employee::all();
        // $departments = Department::all();
        // $foreigntrips = ForeignTrip::all();


        $foreigntrips = ForeignTrip::query('foreigntrips');
        if ($request->emp_id != null) {
            $foreigntrips = $foreigntrips->Where('foreigntrips.emp_id', $emp_id);
        }
        if ($request->participation_id != null) {
            $foreigntrips = $foreigntrips->Where('foreigntrips.participation_id', $participation_id);
        }
        if ($request->program_name != null) {
            $foreigntrips = $foreigntrips->Where('foreigntrips.program_name', $program_name);
        }

        if ($request->department_id != null) {
            $foreigntrips = $foreigntrips->Where('foreigntrips.department_id', $department_id);
        }

        if (!empty($request->from_date_of_program) && !empty($request->to_date_of_program)) {

            $foreigntrips = ForeignTrip::whereBetween('date_of_program', [$request->from_date_of_program, $request->to_date_of_program]);
        }

        $foreigntrips = $foreigntrips
            ->select(
                'foreigntrips.*',
                'employees.Name as EmployeeName',
                'employees.LastName as EmployeeLastName',
                'employees.FatherName as EmployeeFatherName',
                'employees.JobTitle as EmployeeJob',
                'departments.Name as departmentName',


                // 'inviters.Name as inviterName',
                // 'doners.Name as donerName',
                // 'participations.Name as participationName'
            )
            ->join('employees', 'employees.id', 'foreigntrips.emp_id')
            ->join('departments', 'departments.id', 'foreigntrips.department_id')
            ->join('inviters', 'inviters.id', 'foreigntrips.inviter_id')
            ->join('doners', 'doners.id', 'foreigntrips.doner_id')
            ->join('participations', 'participations.id', 'foreigntrips.participation_id')

            ->get();
            // $data=['foreigntrips'=>$foreigntrips];



            // $pdf=PDF::loadView('foreigntripReport.reportPDF',$data);

            // return $pdf->download('report.pdf');

        // if ($emp_id) {


        //     $foreigntrips = $foreigntrips->Where('foreigntrips.emp_id',   $emp_id );
        //     dd($emp_id,$foreigntrips);
        // }
        // dd($foreigntrips);
        return view('foreigntripReport.report', compact('foreigntrips')

        );
    }
    // public function report(Request $request){


    // // $emp_id=$request->emp_id;
    //     $data=['foreigntrips'=>$foreigntrips];



    //     $pdf=PDF::loadView('foreigntripReport.reportPDF',compact('foreigntrips'));

    //     return $pdf->download('reportPDF.pdf');




    // }
}
