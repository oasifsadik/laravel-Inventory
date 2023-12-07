<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        return view('admin.branch.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
        ]);

        $branch = new Branch();
        $branch->branch_name    = $request->name;
        $branch->branch_address = $request->address;
        $branch->save();
        return redirect()->back()->with('success','Branch Adding Successfully');


    }
    public function show()
    {
        $branches = Branch::get();
        return view('admin.branch.allBranch',compact('branches'));
    }

    public function edit($id)
    {
        $branch = Branch::find($id);
        return view('admin.branch.edit',compact('branch'));
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);
        $branch->branch_name    = $request->name;
        $branch->branch_address = $request->address;
        $branch->update();
        return redirect('/all-branch');
    }
    public function delete($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        return redirect()->back()->with('error','Branch Delete Successfully');
    }
}
