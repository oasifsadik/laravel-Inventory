<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EmpployeeController extends Controller
{
    public function index()
    {
        return view('admin.employee.index');
    }
    public function store(Request $request)
    {
        $employee = new User();
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->address = $request->input('address');
        $employee->sallery = $request->input('sallery');
        $employee->joining_date = $request->input('joining_date');
        $employee->nid = $request->input('nid');
        $employee->phone = $request->input('phone');
        $employee->password = Hash::make($request['password']);
        $employee->photo = $request->input('photo');
        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $extansion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extansion;
            $file->move('employee/',$filename);
            $employee->photo =$filename;
        }
        $employee->save();
        return redirect('dashboard/allemployees');
    }
    public function show()
    {
        $employees = User::get()->where('role_as', 0);
        return view('admin.employee.allEmployee',compact('employees'));
    }

    public function delete($id){
        $employee = User::find($id);
        $deleteOldImage = 'employee/'.$employee->photo;
        if (file_exists($deleteOldImage)) {
            unlink($deleteOldImage);
        }
        $employee->delete();
        return back();

    }
}