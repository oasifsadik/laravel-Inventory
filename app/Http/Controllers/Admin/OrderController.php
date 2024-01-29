<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\ProductRequest;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::get();
        return view('admin.request.order', compact('order'));
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

    public function wishlist()
    {
        $category = Category::get();
        $wishlist = Wishlist::where('status','pending')->get();
        return view('admin.wishlist',compact('wishlist','category'));

    }
    public function wishlistStore(Request $request,$wishlistItemId)
    {
        $wishlistItem = Wishlist::findOrFail($wishlistItemId);
        $request->validate([
            'cat_id'                => 'required|integer',
            'name'                  => 'required|string|max:255',
            'product_description'   => 'required|string',
            'product_img'           => 'required',
            'buying_date'           => 'required|date|before:tomorrow',
            'stock_date'           => 'required|date|before:tomorrow',
            'buying_price'          => 'required|numeric',
            'status'                => 'required',
            'qty'                   => 'required|integer',
        ]);
        $uniqueProductId = mt_rand(100000, 999999);
        $product = Product::create([
            'cat_id'                => $request->cat_id,
            'pro_id'                => $uniqueProductId,
            'product_name'          => $request->name,
            'product_description'   => $request->product_description,
            'product_img'           => $request->product_img,
            'buying_date'           => $request->buying_date,
            'buying_price'          => $request->buying_price,
            'status'                => $request->status,
        ]);
        if ($request->hasFile('product_img')) {
            $file = $request->file('product_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('product/', $filename);
            $product->product_img = $filename;
            $product->save();
        }

        $stock = Stock::create([
            'product_id'    => $product->id,
            'qty'           =>$request->qty,
            'stock_date'    =>$request->stock_date,
        ]);
        $wishlistItem->status = 'completed';
         $wishlistItem->save();
        $product->stock()->save($stock);

        return redirect('All-product');
    }


}
