<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ForeignTrip;
use Illuminate\Http\Request;
use App\Models\TempEmployee;

class EmployeeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:employee-show', ['only' => ['index','show']]);
         $this->middleware('permission:employee-create', ['only' => ['create','store']]);
         $this->middleware('permission:employee-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:employee-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
//         $i=1;
//        $tempEmployees= TempEmployee::select('UserID','FirstName','LastName','FatherName','EnglishName','JobTitle','Email','Phone')->get();
//        foreach($tempEmployees as $tempEmployee){

//         $employee= Employee::create([
//             'id' => $tempEmployee->UserID,
//             'Name' => $tempEmployee->FirstName,
//             'LastName' => $tempEmployee->LastName,
//             'FatherName' => $tempEmployee->FatherName,
//             'EnglishName' => $tempEmployee->EnglishName,
//             'JobTitle' => $tempEmployee->JobTitle,
//             'Email' => $tempEmployee->Email,
//             'Phone' => $tempEmployee->Phone
//         ]);
//         echo $i++." -"." emplyee with name: ".$tempEmployee->Name.' is successfully insert into database.'.'<br>';
//        }
// exit;

        // $employees=Employee::all();
        $employees = Employee::orderBy('id', 'desc')->paginate(10);

        return view('employee.index',compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
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
            'Name' => 'required',
            'LastName' => 'required',
            'FatherName' => 'required',
            'EnglishName' => 'required',
            'JobTitle' => 'required',
            'Email' => 'required',
            'Phone' => 'required',

        ]);

        Employee::create($request->all());

        return redirect()->route('employee.index')
                        ->with('success','Employee created successfully.');
    }



    public function show(Employee $employee)
    {
        return view('employee.show',compact('employee'));
    }


    public function edit(Employee $employee)
    {
        return view('employee.edit',compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'Name' => 'required',
            'LastName' => 'required',
            'FatherName' => 'required',
            'EnglishName' => 'required',
            'JobTitle' => 'required',
            'Email' => 'required',
            'Phone' => 'required',
        ]);

        $employee->update($request->all());

        return redirect()->route('employee.index')
                        ->with('success','Employee updated successfully');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')
                        ->with('success','Employee deleted successfully');
    }

            public function search(Request $request){
                $search=$request->search;
                $employees=Employee::where('Name','LIKE',"%{$search}%")
                ->orWhere('FatherName','LIKE',"%{$search}%")
                ->orWhere('JobTitle','LIKE',"%{$search}%")
                ->orWhere('LastName','LIKE',"%{$search}%")->get()->toQuery()->paginate(5);
                return view('employee.index',compact('employees'));
            }






}
