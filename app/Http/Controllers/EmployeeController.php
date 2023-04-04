<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::orderBy('id','asc')->get();
        return view('employee.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Department::orderBy('id','asc')->get();

        return view('employee.create',['departments'=>$data]);
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
            'name'=>'required',
            'photo'=>'required|image|mimes:jpg,png,gif',
            'address'=>'required',
            'phone'=>'required',
            'status'=>'required',
        ]);

        $photo = $request->file('photo');
        $renamePhoto = time().'.'.$photo->getClientOriginalExtension();
        $destination = public_path('/images');
        $photo->move($destination,$renamePhoto);

        $data = new Employee();
        $data->department_id=$request->department;
        $data->name=$request->name;
        $data->photo=$renamePhoto;
        $data->address=$request->address;
        $data->phone=$request->phone;
        $data->status=$request->status;
        $data->save();

        return redirect('employee')->with('message','Added Employee ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Employee::find($id);
        return view('employee.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departmentss = Department::orderBy('id','asc')->get();
        $data=Employee::find($id);
        return view('employee.edit',['departmentss'=>$departmentss,'data'=>$data]);
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
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'status'=>'required',
        ]);

        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $renamePhoto = time().'.'.$photo->getClientOriginalExtension();
            $destination = public_path('/images');
            $photo->move($destination,$renamePhoto);

        } else {
            $renamePhoto=$request->previous_photo;
        }


        $data =Employee::find($id);
        $data->department_id=$request->department;
        $data->name=$request->name;
        $data->photo=$renamePhoto;
        $data->address=$request->address;
        $data->phone=$request->phone;
        $data->status=$request->status;
        $data->save();

        return redirect('employee/'.$id.'/edit')->with('message','Employee Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where('id',$id)->delete();
        return redirect('employee');
    }
}
