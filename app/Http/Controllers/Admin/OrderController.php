<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::get();
        return view('admin.request.order',compact('order'));
    }
    public function reject()
    {
        $orderReject = ProductRequest::where('status' ,'reject')->get();
        return view('admin.request.reject',compact('orderReject'));
    }
}
