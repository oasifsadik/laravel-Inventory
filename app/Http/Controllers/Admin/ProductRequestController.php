<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductRequest;
use App\Http\Controllers\Controller;

class ProductRequestController extends Controller
{
    public function index()
    {
        $requestProduct = ProductRequest::with('product','user')->where('status','pending')->get();
        return view('admin.request.requestProduct',compact('requestProduct'));
    }
    public function complate($id)
    {
        $requestProduct = ProductRequest::find($id);
        if (!$requestProduct)
        {
            return redirect()->back()->with('error', 'Product request not found');
        }
        $order = new Order();
        $order->user_id     = $requestProduct->user_id;
        $order->product_id  = $requestProduct->product_id;
        $order->quantity    = $requestProduct->quantity;
        $order->save();

        $requestProduct->status = 'accepted';
        $requestProduct->save();

        return redirect()->back()->with('success', 'Product request completed and added to orders.');
    }

    public function reject($id)
    {
        $requestProduct = ProductRequest::find($id);
        if (!$requestProduct) {
            return redirect()->back()->with('error', 'Product request not found');
        }
        $requestProduct->status = 'reject';
        $requestProduct->save();
        return redirect()->back()->with('warning', 'Product rejected.');
    }
}
