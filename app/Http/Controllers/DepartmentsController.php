<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;




class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',Department::class);

        $departments=Department::select([
            'departments.*',
          
           ])
           ->get();
          

        return view('departments.index',[
            'departments' => $departments,
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
        $this->authorize('create',Department::class);
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Department::class);

        $request->validate([
            'title' => 'unique:departments,title'
          ]);
           
           $department=new Department();
           $department->title=$request->post('title');
           $department->save(); 
           
           return redirect()
                  ->route('departments.index')
                  ->with('status','Department Created');//store flash value in the session
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department=Department::findOrFail($id);
        $this->authorize('view',$department);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $department=Department::find($id); //return post model obj
        $this->authorize('update',$department);
        if(!$department){
            return redirect()->route('departments.index');
        }
        return view('departments.edit',[
            'department'=>$department,
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
        $department=Department::find($id); 
        $this->authorize('update',$department);


        $request->validate([
            'title' => 'unique:departments,title'
          ]);
      
        //return post model obj
        $department->title=$request->post('title');
        $department->save(); //update

        return redirect()
              ->route('departments.index')
              ->with('status','Department Updated');//store flash value in the session
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
        $department=Department::findorFail($id);
        $this->authorize('delete',$department);

        Department::destroy($id);
        return redirect()
        ->route('departments.index')
        ->with('status','Department Deleted');//store flash value in the session
    }
}
