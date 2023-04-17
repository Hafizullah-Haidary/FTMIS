<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:department-show', ['only' => ['index','show']]);
         $this->middleware('permission:department-create', ['only' => ['create','store']]);
         $this->middleware('permission:department-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:department-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $departments = Department::latest()->paginate(5);

        return view('department.index',compact('departments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *

     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
        ]);

        Department::create($request->all());

        return redirect()->route('department.index')
                        ->with('success','department created successfully.');
    }

    /**
     * Display the specified resource.

     */
    public function show(Department $department)
    {
        return view('department.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'Name' => 'required',

        ]);

        $department->update($request->all());

        return redirect()->route('department.index')
                        ->with('success','Department updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('department.index')
                        ->with('success','Department deleted successfully');
    }

            public function search(Request $request){
                $search=$request->search;
                $departments=Department::where('Name','LIKE',"%{$search}%")->get()->toQuery()->paginate(5);

                return view('department.index',compact('departments'));
            }

}
