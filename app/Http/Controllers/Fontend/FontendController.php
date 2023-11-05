<?php

namespace App\Http\Controllers\Fontend;


use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FontendController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('fontend.dashboard', compact('user'));
    }
    public function profile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('fontend.profile.index', compact('user'));
        } else {
            return redirect('login')->with('error', 'Please login first');
        }
    }
    public function product()
    {
        if(Auth::check())
        {
            $Products =Product::with('stock')->where('status','Active')->paginate(1);

        // dd($Products);
            return view('fontend.product.index',compact('Products'));
        }
    }
}
