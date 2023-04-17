<?php

namespace App\Http\Controllers;

use App\Models\NatureOfParticipation;
use Illuminate\Http\Request;

class NatureOfParticipationController extends Controller
{
    public function index()
    {
        $participations = NatureOfParticipation::latest()->paginate(5);

        return view('participation.index',compact('participations'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('participation.create');
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

        NatureOfParticipation::create($request->all());

        return redirect()->route('participation.index')
                        ->with('success','Participation type has been created successfully.');
    }

    /**
     * Display the specified resource.

     */
    public function show(NatureOfParticipation $participation)
    {
        return view('participation.show',compact('participation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(NatureOfParticipation $participation)
    {
        return view('participation.edit',compact('participation'));
    }

    /**
     * Update the specified resource in storage.
     *
     *
     */
    public function update(Request $request, NatureOfParticipation $participation)
    {
        $request->validate([
            'Name' => 'required',

        ]);

        $participation->update($request->all());

        return redirect()->route('participation.index')
                        ->with('success','Participation type has been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy(NatureOfParticipation $participation)
    {
        $participation->delete();

        return redirect()->route('participation.index')
                        ->with('success','Doner deleted successfully');
    }

            public function search(Request $request){
                $search=$request->search;
                $participation=NatureOfParticipation::where('Name','LIKE',"%{$search}%")->get();
                return view('participation.search',compact('participations'));
            }
}
