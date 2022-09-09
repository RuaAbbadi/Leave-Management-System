<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveType;


class LeavesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',LeaveType::class);
        $leavestype=LeaveType::all();
          
        return view('leavestype.index',[
            'leavestype' => $leavestype,
            'status' => session('status')
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',LeaveType::class);

        return view('leavestype.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',LeaveType::class);

        $request->validate([
            'name' => 'unique:leavestype,name'
          ]);
           
           $leavestype=new LeaveType();
           $leavestype->name=$request->post('name');
           $leavestype->description=$request->post('description');

           $leavestype->save(); 
           
           return redirect()
                  ->route('leavestype.index')
                  ->with('status','Leave Type Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leavestype=LeaveType::findOrFail($id);
        $this->authorize('view',$leavestype);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leavestype=LeaveType::find($id); //return post model obj
        $this->authorize('update',$leavestype);

        if(!$leavestype){
            return redirect()->route('leavestype.index');
        }
        return view('leavestype.edit',[
            'leavestype'=>$leavestype,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $leavestype=LeaveType::find($id); 
        $this->authorize('update',$leavestype);


        $request->validate([
            'name' => 'unique:leavestype,name'
          ]);
          
        $leavestype=LeaveType::find($id); //return post model obj
        $leavestype->name=$request->post('name');
        $leavestype->description=$request->post('description');

        $leavestype->save(); //update

        return redirect()
              ->route('leavestype.index')
              ->with('status','Leave Type Updated');//store flash value in the session
              ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leavestype=LeaveType::findorFail($id);
        $this->authorize('delete',$leavestype);
        
        LeaveType::destroy($id);
        return redirect()
        ->route('leavestype.index')
        ->with('status','Leave Type Deleted');
    }
}
