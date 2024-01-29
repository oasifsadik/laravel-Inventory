<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Models\ProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Repaire;
use Illuminate\Support\Facades\Auth;

class RepaireController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $deliver = ProductRequest::where('user_id', $user->id)
                                    ->where('status','accepted')
                                    ->with('product')->get();
                                    // dd($deliver);
        return view('fontend.repair.index',compact('deliver'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $repair = new Repaire();
        $repair->user_id = $user->id;
        $repair->product_id = $request->product_id;
        $repair->description = $request->description;
        $repair->save();
        return redirect()->route('repair.show')->with('success','Product Repair Request Successfully!');

    }
    public function show()
    {
        $user = Auth::user();
        $repairs = Repaire::where('user_id', $user->id)->with('product')->get();
        return view('fontend.repair.allRepair',compact('repairs'));

    }

    public function delete($id)
    {
        $repair = Repaire::find($id);
        $repair->delete();
        return redirect()->back();
    }


}
