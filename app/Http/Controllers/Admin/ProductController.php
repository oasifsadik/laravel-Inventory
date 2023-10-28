<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $category = Category::get();
        return view('admin.product.index',compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'Category' => 'required|integer',
            'name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_img' => 'required',
            'buying_date' => 'required|date',
            'buying_price' => 'required|numeric',
            'status' => 'required',
            'qty' => 'required|integer',
        ]);
        $product = Product::create([
            'cat_id' => $request->cat_id,
            'product_name' => $request->name,
            'product_description' => $request->product_description,
            'product_img' => $request->product_img,
            'buying_date' => $request->buying_date,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
            'status' => $request->status,
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
            'product_id' => $product->id,
            'qty' =>$request->qty,
        ]);
        $product->stock()->save($stock);

        return redirect()->back();


    }
    public function show()
    {

        $products = Product::with('Stock')->get();
        return view('admin.product.allProduct',compact('products'));
    }
}
