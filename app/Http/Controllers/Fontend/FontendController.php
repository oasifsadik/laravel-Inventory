<?php

namespace App\Http\Controllers\Fontend;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FontendController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('fontend.dashboard', compact('user'));
    }

    public function profile()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            return view('fontend.profile.index', compact('user'));
        }
        else
        {
            return redirect('login')->with('error', 'Please login first');
        }
    }
    public function product()
    {
        if(Auth::check())
        {
            $Products =Product::with('stock')->where('status','Active')->paginate(10);
            return view('fontend.product.index',compact('Products'));
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->update();

            return redirect()->back()->with('success', 'Password changed successfully.');
        } else {
            return back()->withErrors(['current_password' => 'The provided current password does not match our records.']);
        }
    }

    public function profileEdit(Request $request,$id)
    {
        $update = User::find($id);
        return view('fontend.profile.edit',compact('update'));
    }

    public function profileUpdate(Request $request,$id)
    {
        $update = User::find($id);
        $update->name         = $request->input('name');
        $update->email        = $request->input('email');
        $update->address      = $request->input('address');
        $update->phone        = $request->input('phone');
        $deleteOldImage       ='employee/'.$update->photo;

        if($image = $request->file('photo'))
        {
            if (file_exists($deleteOldImage))
            {
                unlink($deleteOldImage);
            }
            $customimage = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move("employee/" , $customimage);
        }
        else
        {
            $customimage = $update->photo;
        }
        $update->photo = $customimage;
        $update->update();
        return redirect()->back();
    }
}
