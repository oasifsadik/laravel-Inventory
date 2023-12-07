<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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
            'cat_id'                => 'required|integer',
            'name'                  => 'required|string|max:255',
            'product_description'   => 'required|string',
            'product_img'           => 'required',
            'buying_date'           => 'required|date',
            'buying_price'          => 'required|numeric',
            'status'                => 'required',
            'qty'                   => 'required|integer',
        ]);
        $product = Product::create([
            'cat_id'                => $request->cat_id,
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
        ]);
        $product->stock()->save($stock);

        return redirect()->back();


    }
    public function show()
    {

        $products = Product::with('stock')->get();
        return view('admin.product.allProduct',compact('products'));
    }
    public function edit($id)
    {
        $categories = Category::get();
        $product = Product::with('stock')->find($id,);
        return view('admin.product.edit',compact('product','categories'));
    }
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        $product->cat_id                = $request->cat_id;
        $product->product_name          = $request->name;
        $product->product_description   = $request->product_description;
        $product->buying_date           = $request->buying_date;
        $product->buying_price          = $request->buying_price;
        $product->status                = $request->status;
        $deleteOldImage                 ='product/'.$product->product_img;

        if($image = $request->file('product_img'))
        {
            if (file_exists($deleteOldImage))
            {
                unlink($deleteOldImage);
            }
            $customimage = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move("product/" , $customimage);
        }
        else
        {
            $customimage = $product->product_img;
        }
        $product->product_img = $customimage;
        $product->update();
        return redirect('All-product')->with('success','Product Update Successfully');

    }
    public function delete($id)
    {
        $product = Product::with('stock')->find($id);

        if ($product)
        {
            // Delete the product image
            $oldImage = public_path('product/' . $product->product_img);
            if (file_exists($oldImage))
            {
                unlink($oldImage);
            }
            // Delete the product and its associated stock records
            $product->stock()->delete();
            $product->delete();
        }

        return back()->with('error','Product Delete Successfully');
    }


}
