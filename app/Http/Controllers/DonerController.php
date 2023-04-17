<?php

namespace App\Http\Controllers;

use App\Models\Doner;
use Illuminate\Http\Request;

class DonerController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:doner-show', ['only' => ['index','show']]);
         $this->middleware('permission:doner-create', ['only' => ['create','store']]);
         $this->middleware('permission:doner-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:doner-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $doners = Doner::latest()->paginate(5);

        return view('doner.index',compact('doners'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doner.create');
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

        Doner::create($request->all());

        return redirect()->route('doner.index')
                        ->with('success','Doner created successfully.');
    }

    /**
     * Display the specified resource.

     */
    public function show(Doner $doner)
    {
        return view('doner.show',compact('doner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Doner $doner)
    {
        return view('doner.edit',compact('doner'));
    }

    /**
     * Update the specified resource in storage.
     *
     *
     */
    public function update(Request $request, Doner $doner)
    {
        $request->validate([
            'Name' => 'required',

        ]);

        $doner->update($request->all());

        return redirect()->route('doner.index')
                        ->with('success','Doner updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy(Doner $doner)
    {
        $doner->delete();

        return redirect()->route('doner.index')
                        ->with('success','Doner deleted successfully');
    }

            public function search(Request $request){
                $search=$request->search;
                $doners=Doner::where('Name','LIKE',"%{$search}%")->get()->toQuery()->paginate(5);
                return view('doner.index',compact('doners'));
            }

}
