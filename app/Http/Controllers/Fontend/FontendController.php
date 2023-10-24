<?php

namespace App\Http\Controllers\Fontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FontendController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('fontend.home');
        }else{
            return redirect('/login');
        }
    }
}
