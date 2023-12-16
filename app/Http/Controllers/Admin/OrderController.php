<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\ProductRequest;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

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
    public function returnProduct()
    {
        $returnProduct = ProductRequest::where('status' ,'return')->get();
        return view('admin.request.return_product',compact('returnProduct'));
    }

    public function report(Request $request)
    {
        $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
    $endDate = Carbon::parse($request->input('end_date'))->endOfDay();

    $report = Order::whereBetween('created_at', [$startDate, $endDate])
        ->get();
        return view('admin.report.generateReport', compact('report'));
    }
}
