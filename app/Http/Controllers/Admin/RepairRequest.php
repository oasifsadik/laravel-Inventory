<?php

namespace App\Http\Controllers\admin;

use App\Models\Repaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RepairRequest extends Controller
{
    public function requestRepairProduct()
    {
        $repairs = Repaire::where('status','pending')->with('product')->get();
        // dd($repairs);
        return view('admin.repair.index',compact('repairs'));
    }

    public function updateStatus(Request $request, $id)
    {
        $repair = Repaire::findOrFail($id);
        $validatedData = $request->validate([
            'status' => 'required|in:completed,working,pending',
        ]);
        $repair->status = $validatedData['status'];
        $repair->save();
        return redirect('admin-repair')->with('success', 'Status updated successfully!');
    }

    public function filterByStatus($status)
    {
        $repairs = Repaire::where('status', $status)->get();
        return view('admin.repair.index', compact('repairs'));
    }
}
