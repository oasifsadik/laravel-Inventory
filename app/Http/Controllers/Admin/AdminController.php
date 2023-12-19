<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
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
           $order = Order::count();
           $data =
           [
            'user',
            'category',
            'product',
            'order',
           ];
              return view('admin.dashboard', compact($data));
        }
         else
        {
             return redirect('login');
        }
    }
}
