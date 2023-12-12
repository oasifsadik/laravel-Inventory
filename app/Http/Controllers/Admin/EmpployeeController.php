<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmpployeeController extends Controller
{
    public function index()
    {
        $branches = Branch::get();
        return view('admin.employee.index',compact('branches'));
    }
    public function store(Request $request)
    {
        $employee = new User();
        $employee->branch_id    = $request->branch_id;
        $employee->name         = $request->input('name');
        $employee->email        = $request->input('email');
        $employee->address      = $request->input('address');
        $employee->sallery      = $request->input('sallery');
        $employee->joining_date = $request->input('joining_date');
        $employee->nid          = $request->input('nid');
        $employee->phone        = $request->input('phone');
        $employee->password     = Hash::make($request['password']);
        $employee->photo        = $request->input('photo');
        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $extansion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extansion;
            $file->move('employee/',$filename);
            $employee->photo =$filename;
        }

        $emp = $employee->save();

        if($emp) {
            Mail::send('email.user-register', ['data' => $employee, 'password' => $request['password']],
            function ($message) use ($employee)
            {
                $message->from('info@example.com')->to($employee->email)->subject('Register Info');
            });
        }


        return redirect('dashboard/allemployees');
    }
    public function show()
    {
        $employees = User::with('branch')->get()->where('role_as', 0);
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

    public function approved($id)
    {
        $approved = User::find($id);
        $approved->is_approved = '1';
        $approved->save();
        return redirect()->back();
    }

    public function reject($id)
    {
        $approved = User::find($id);
        $approved->is_approved = '0';
        $approved->save();
        return redirect()->back();
    }
}
