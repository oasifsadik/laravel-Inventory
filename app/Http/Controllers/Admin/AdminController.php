<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(Auth::check())
        {
           $user = User::where('role_as','0')->count();
           $category = Category::count();
           $product = Product::count();
           $data =[
            'user',
            'category',
            'product',
           ];
              return view('admin.dashboard',compact($data));
        }
         else
        {
             return redirect('login');
        }
    }
}
