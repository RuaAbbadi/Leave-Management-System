<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;




class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',Employee::class);

        $employees=Employee::orderBy('id','desc')->get();
        return view('employees.index',[
            'employees'=>$employees,
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
        $this->authorize('create',Employee::class);
        $data=Department::orderBy('id','desc')->get();
        return view('employees.create',['departments'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Employee::class);

        $request->validate([
            'email' => 'unique:employees,email'
          ]);

          $employees=new Employee();
          $employees->name=$request->post('name');
          $employees->email=$request->post('email');
          $employees->password=Hash::make($request->post('password'));
          $employees->gender=$request->post('gender');
          $employees->department_id=$request->post('department');
          $employees->phonenumber=$request->post('phonenumber');
          $employees->address=$request->post('address');
          $employees->role=$request->post('role');

          $employees->save(); 
          
          return redirect()
                 ->route('employees.index')
                 ->with('status','Employee Created');//store flash value in the session
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees=Employee::findOrFail($id);
        $this->authorize('view',$employees);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    
          $employees=Employee::find($id);
          $this->authorize('update',$employees);
        $departments=Department::orderBy('id','desc')->get();
        return view('employees.edit',['departments'=>$departments,'employees'=>$employees]);
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
        
        $employees=Employee::find($id);
        $this->authorize('update',$employees);
        $employees->name=$request->post('name');
        $employees->email=$request->post('email');
        $employees->password=Hash::make($request->post('password'));
        $employees->gender=$request->post('gender');
        $employees->department_id=$request->post('department');
        $employees->phonenumber=$request->post('phonenumber');
        $employees->address=$request->post('address');
        $employees->role=$request->post('role');
        $employees->save();

        return redirect()
        ->route('employees.index')
        ->with('status','Employee Updated');//store flash value in the session

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees=Employee::findorFail($id);
        $this->authorize('delete',$employees);

        Employee::destroy($id);
        return redirect()
        ->route('employees.index')
        ->with('status','Employee Deleted');//store flash value in the session
    }
}
