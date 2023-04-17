<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Doner;
use App\Models\Employee;
use App\Models\Department;
use App\Models\ForeignTrip;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\InvitingAuthority;

use App\Models\NatureOfParticipation;
use Illuminate\Support\Facades\File;


class ForeignTripController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:foreigntrip-show', ['only' => ['index', 'show']]);
        $this->middleware('permission:foreigntrip-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:foreigntrip-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:foreigntrip-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {

        // if($request->ajax()){
        //     $foreigntrip=ForeignTrip::latest()->get();
        //     FacadesDataTables::of($foreigntrip)
        //     ->addIndexColumn()
        //     ->addColumns('action',function($row){
        //         $btn='<a href="javascript:void(0)" class="edit btn-primary btn-sm"></a>';
        //         return $btn;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
        // }
        // return view('foreigntrip.index');
        $foreigntrips = ForeignTrip::with('employee')
            ->with('department')
            ->with('invitingAuthority')
            ->with('doner')
            ->with('participations')

            ->select('*')
            ->get();
        $foreigntrips = ForeignTrip::latest()->paginate(4);


        return view('foreigntrip.index', compact('foreigntrips'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function convert_shamsi_to_miladi(Request $request)
    {

        $date = \Morilog\Jalali\CalendarUtils::toJalali($request->year, $request->month, $request->day);
        $date2 = (new \Morilog\Jalali\Jalalian($date[0], $date[1], $date[2]))->toArray();
        $dayOfWeek = $date2['dayOfWeek'];

        /*$day_name=\Morilog\Jalali\CalendarUtils::getDayNames($dayOfWeek);
		$month_name=\Morilog\Jalali\CalendarUtils::getMonthNames($date[1]);*/
        $day = $date2['day'];
        $month = $date2['month'];
        $year = $date2['year'];

        $date_string = $year . "/" . $month . '/' . $day;
        return $date_string;
    }
    public function shamsi(Request $request)
    {
        return view('foreigntrip.create');
    }
    public function miladi(Request $request)
    {
        return view('foreigntrip.create');
        // return view('adminlte::admin.calendar.miladi');
    }
    public function create()
    {
        // dd('dkfjk');

        $participations = NatureOfParticipation::all();
        $doners = Doner::all();
        $departments = Department::all();
        $inviters = InvitingAuthority::all();
        $employees = Employee::all();
        return view('foreigntrip.create', compact(
            'employees',
            'departments',
            'inviters',
            'doners',
            'participations'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'emp_id' => 'required',
            'department_id' => 'required',
            'program_name' => 'required',
            'inviter_id' => 'required',
            'date_of_program' => 'required',
            'eventPlace' => 'required',
            'doner_id' => 'required',
            'commitee_date' => 'required',
            'participation_id' => 'required',
            'pre_trip_date' => 'required',
            'pre_trip_subject' => 'required',
            'ministry_approval' => 'required',
            'agree_mof' => 'required',
            'order_of_authority' => 'required',
            'participant_grantee' => 'required',
            'participation' => 'required',
            'report_date' => 'required',
            'considerations' => 'required',

        ]);
        if ($request->hasFile('report_image')) {
            $file = $request->file('report_image');
            $filename = $file->getClientOriginalName();
            // Move the file to desired location
            $file->move(public_path('reportImages'), $filename);
        }

//         $newImageName=time().'-'. $request->report_image.'-'.$request->report_image->extension();
//        $test= $request->report_image->move(public_path('images'),$newImageName);
// dd($test);
        // ForeignTrip::create($request->all());
        $foreigntrip=ForeignTrip::create([
            'emp_id'=>$request->input('emp_id'),
            'department_id'=>$request->input('department_id'),
            'program_name'=>$request->input('program_name'),
            'inviter_id'=>$request->input('inviter_id'),
            'date_of_program'=>$request->input('date_of_program'),
            'eventPlace'=>$request->input('eventPlace'),
            'doner_id'=>$request->input('doner_id'),
            'commitee_date'=>$request->input('commitee_date'),
            'participation_id'=>$request->input('participation_id'),
            'pre_trip_date'=>$request->input('pre_trip_date'),
            'pre_trip_subject'=>$request->input('pre_trip_subject'),
            'ministry_approval'=>$request->input('ministry_approval'),
            'agree_mof'=>$request->input('agree_mof'),
            'order_of_authority'=>$request->input('order_of_authority'),
            'participant_grantee'=>$request->input('participant_grantee'),
            'participation'=>$request->input('participation'),
            'report_date'=>$request->input('report_date'),
            'report_image'=> $filename,
            'considerations'=>$request->input('considerations'),
        ]);







        return redirect()->route('foreigntrip.index')
            ->with('success', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     *

     */
    public function show(ForeignTrip $foreigntrip)
    {

        return view('foreigntrip.show', compact('foreigntrip'));
    }


    public function edit(ForeignTrip $foreigntrip)
    {
        $participations = NatureOfParticipation::all();
        $doners = Doner::all();
        $departments = Department::all();
        $inviters = InvitingAuthority::all();
        $employees = Employee::all();
        return view('foreigntrip.edit', compact(
            'foreigntrip',
            'employees',
            'departments',
            'inviters',
            'doners',
            'participations'
        ));
        return view('foreigntrip.edit', compact('foreigntrip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForeignTrip $foreigntrip)
    {
        $request->validate([
            'emp_id' => 'required',
            'department_id' => 'required',
            'program_name' => 'required',
            'inviter_id' => 'required',
            'date_of_program' => 'required',
            'eventPlace' => 'required',
            'doner_id' => 'required',
            'commitee_date' => 'required',
            'participation_id' => 'required',
            'pre_trip_date' => 'required',
            'pre_trip_subject' => 'required',
            'ministry_approval' => 'required',
            'agree_mof' => 'required',
            'order_of_authority' => 'required',
            'participant_grantee' => 'required',
            'participation' => 'required',
            'report_date' => 'required',
            'report_image'=>'',
            'considerations' => 'required',
        ]);
        $filename='';

        if ($request->hasFile('report_image')) {
            $destination='reportImages/'.$foreigntrip->report_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('report_image');
            $filename = $file->getClientOriginalName();
            // Move the file to desired location
            $file->move(public_path('reportImages'), $filename);
        }
        $foreigntrip->update([
            'emp_id'=>$request->input('emp_id'),
            'department_id'=>$request->input('department_id'),
            'program_name'=>$request->input('program_name'),
            'inviter_id'=>$request->input('inviter_id'),
            'date_of_program'=>$request->input('date_of_program'),
            'eventPlace'=>$request->input('eventPlace'),
            'doner_id'=>$request->input('doner_id'),
            'commitee_date'=>$request->input('commitee_date'),
            'participation_id'=>$request->input('participation_id'),
            'pre_trip_date'=>$request->input('pre_trip_date'),
            'pre_trip_subject'=>$request->input('pre_trip_subject'),
            'ministry_approval'=>$request->input('ministry_approval'),
            'agree_mof'=>$request->input('agree_mof'),
            'order_of_authority'=>$request->input('order_of_authority'),
            'participant_grantee'=>$request->input('participant_grantee'),
            'participation'=>$request->input('participation'),
            'report_date'=>$request->input('report_date'),
            'report_image'=> $filename,
            'considerations'=>$request->input('considerations'),
        ]);

//         $newImageName=time().'-'. $request->report_image.'-'.$request->report_image->extension();
//        $test= $request->report_image->move(public_path('images'),$newImageName);
// dd($test);


        // $foreigntrip->update($request->all());

        // if($request->hasFile('report_image')){
        //     $destination_path='/images/reportImages';
        //     $image=$request->file('report_image');
        //     $image_name=$image->getClientOriginalName();
        //     $request->file('report_image')->storeAs($destination_path,$image_name);

        // }

        return redirect()->route('foreigntrip.index')
            ->with('success', 'Employee updated successfully');
    }
    /**

     */
    public function destroy(ForeignTrip $foreigntrip)
    {
        $foreigntrip->delete();

        return redirect()->route('foreigntrip.index')
            ->with('success', 'Employee deleted successfully');
    }




    public function search(Request $request)
    {

        $foreigntrips = ForeignTrip::query();
        if ($request->search != null) {


            $foreigntrips = $foreigntrips->orWhere('foreigntrips.program_name', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('foreigntrips.date_of_program', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('foreigntrips.pre_trip_subject', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('foreigntrips.participant_grantee', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('foreigntrips.ministry_approval', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('foreigntrips.report_date', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('employees.Name', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('departments.Name', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('inviters.Name', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('doners.Name', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('foreigntrips.commitee_date', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('participations.Name', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('foreigntrips.order_of_authority', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('foreigntrips.agree_mof', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('foreigntrips.eventPlace', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('foreigntrips.pre_trip_date', 'LIKE', '%' . $request->search . '%');
            $foreigntrips = $foreigntrips->orWhere('foreigntrips.participation', 'LIKE', '%' . $request->search . '%');

        }


        $foreigntrips = $foreigntrips
            ->select(
                'foreigntrips.*',
                'employees.Name as EmployeeName',
                'departments.Name as departmentName',
                'inviters.Name as inviterName',
                'doners.Name as donerName',
                'participations.Name as participationName'
            )
            ->join('employees', 'employees.id', 'foreigntrips.emp_id')
            ->join('departments', 'departments.id', 'foreigntrips.department_id')
            ->join('inviters', 'inviters.id', 'foreigntrips.inviter_id')
            ->join('doners', 'doners.id', 'foreigntrips.doner_id')
            ->join('participations', 'participations.id', 'foreigntrips.participation_id')

            ->get()->toQuery()->paginate(10);


        return view('foreigntrip.index', ['foreigntrips' => $foreigntrips]);
    }
    // public function generateReport(ForeignTrip $foreigntrip)
    // {
    //     $data = [
    //         'foreigntrip' => $foreigntrip
    //     ];

    //     $pdf = PDF::loadView('foreigntripReport.reportPDF', $data);

    //     return $pdf->download('employee_report.pdf');
    // }
}
