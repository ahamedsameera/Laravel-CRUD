<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees= Employee::orderBy('id','asc')->paginate(5);
        return view('index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required',
        'email'=>'required|unique:employees,email|email',
        'joining_date'=>'required',
        'salary'=>'required']);
        $data = $request->except('_token');
        //Mass Assignment
        Employee::create($data);
      /* single row insert
        $employee=new EmployeeModel;
        $employee->name=$data['name'];
        $employee->email=$data['email'];
        $employee->joining_date=$data['joining_date'];
        $employee->salary=$data['salary'];
        $employee->is_active=$data['is_active'];
        */

       return redirect()
       ->route('employees.index')
       ->withMessage('Employee created Successfully');






    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
       return view('show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
       // $employee= Employee::find($id);
        return view('edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate(['name'=>'required',
        'email'=>'required|unique:employees,email,'.$employee->id.'|email',
        'joining_date'=>'required',
        'salary'=>'required']);
        $data=$request->all();
        $employee->update($data);
        return redirect()
       ->route('employees.edit',$employee->id)
       ->withSuccess('Employee updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {

        $employee->delete();
        return redirect()->route('employees.index')
        ->withSuccess('Employee Deleted Successfully');

    }
}
