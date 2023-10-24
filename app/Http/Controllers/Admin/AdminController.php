<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(Auth::check())
        {
           $user = User::where('role_as','0')->count();
           $category = Category::count();
              return view('admin.dashboard',compact('user','category'));
        }
         else
        {
             return redirect('login');
        }
    }
}
