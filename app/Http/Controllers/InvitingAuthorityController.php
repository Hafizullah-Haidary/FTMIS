<?php

namespace App\Http\Controllers;

use App\Models\InvitingAuthority;
use Illuminate\Http\Request;

class InvitingAuthorityController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:invitingAuthority-show', ['only' => ['index','show']]);
         $this->middleware('permission:invitingAuthority-create', ['only' => ['create','store']]);
         $this->middleware('permission:invitingAuthority-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:invitingAuthority-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $inviters = InvitingAuthority::latest()->paginate(10);

        return view('inviter.index',compact('inviters'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inviter.create');
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

        InvitingAuthority::create($request->all());

        return redirect()->route('inviter.index')
                        ->with('success','Inviter created successfully.');
    }

    /**
     * Display the specified resource.

     */
    public function show(InvitingAuthority $inviter)
    {
        return view('inviter.show',compact('inviter'));
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit(InvitingAuthority $inviter)
    {
        return view('inviter.edit',compact('inviter'));
    }

    /**
     * Update the specified resource in storage.
     *
     *
     */
    public function update(Request $request, InvitingAuthority $inviter)
    {
        $request->validate([
            'Name' => 'required',

        ]);

        $inviter->update($request->all());

        return redirect()->route('inviter.index')
                        ->with('success','Inviter updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy(InvitingAuthority $inviter)
    {
        $inviter->delete();

        return redirect()->route('inviter.index')
                        ->with('success','Inviter deleted successfully');
    }

            public function search(Request $request){
                $search=$request->search;
                $inviters=InvitingAuthority::where('Name','LIKE',"%{$search}%")->get()->toQuery()->paginate(5);
                return view('inviter.index',compact('inviters'));
            }

}
