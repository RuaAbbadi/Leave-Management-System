<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\LeaveType;
use Illuminate\Support\Facades\Auth;


class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',Leave::class);

        $query=Leave::select([
            'leaves.*',
            'employees.name',
            'employees.role',
           ])
           ->join('employees','employees.id','=','leaves.emp_id')
           ->orderBy('leaves.created_at','DESC')
           ->orderBy('employees.name','ASC');

          
        if (Auth::user()->role =='employee') {
            
            $query->where('employees.id', '=', Auth::id());
        }
        
        $leaves=$query->paginate(10);
      
          
           
            return view('leaves.index',[
            'leaves'=>$leaves,
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
        $this->authorize('create',Leave::class);
        $leavestype=LeaveType::orderBy('id','desc')->get();
        return view('leaves.create',['leavestype'=>$leavestype]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Leave::class);

        $leaves=new Leave();
        $leaves->emp_id =Auth::id();
        $leaves->leavetype_id=$request->post('leavetype');
        $leaves->start_date=$request->post('start_date');
        $leaves->end_date=$request->post('end_date');
        $leaves->description=$request->post('description');
        $leaves->leavestatus=1;


        $leaves->save(); 
        
        return redirect()
               ->route('leaves.index')
               ->with('status','Leave Created');//store flash value in the session
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leaves=Leave::findOrFail($id);
        $this->authorize('view',$leaves);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leaves=Leave::find($id);
        $this->authorize('update',$leaves); 
        if(!$leaves){
            return redirect()->route('leaves.index');
        }
        return view('leaves.edit',[
            'leaves'=>$leaves,
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
    
        $leaves=Leave::find($id); 
        $this->authorize('update',$leaves); 
        $leaves->leavestatus=$request->post('leavestatus');
        $leaves->save(); //update

        return redirect()
              ->route('leaves.index')
              ->with('status','Leave Updated');//store flash value in the session
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
        $leaves=Leave::findorFail($id);
        $this->authorize('delete',$leaves);

        Leave::destroy($id);
        return redirect()
        ->route('leaves.index')
        ->with('status','Leave Deleted');//store flash value in the session
    }
}
