<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
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
        if ($request->hasFile('product_img'))
        {
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
            'stock_date'           =>$request->stock_date,
        ]);
        $product->stock()->save($stock);

        return redirect()->back();


    }
    public function show()
    {

        $products = Product::with('stock')->withSum('stock as total_qty', 'qty')->get();
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

    public function single($id)
    {
        $product = Product::find($id);
        return view('admin.product.singleProduct',compact('product'));
    }


    public function addStock(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);

        $stock = new Stock();
        $stock->stock_date = $request->input('stock_date');
        $stock->qty = $request->input('qty');
        $stock->product_id = $product->id;
        $stock->save();
        return redirect()->back()->with('success','Stock Add Successfully!');
    }


    public function deleteStock($product_id, $stock_id)
    {
        $stock = Stock::where('product_id', $product_id)->findOrFail($stock_id);
        $stock->delete();

        return redirect()->back()->with('success', 'Stock deleted successfully');
    }

    public function showUpdateStockForm($product_id, $stock_id)
    {
        $stock = Stock::where('product_id', $product_id)->findOrFail($stock_id);
        return view('your_blade_file', compact('stockToUpdate'));
    }

    public function updateStock(Request $request, $product_id, $stock_id)
    {
        $stock = Stock::where('product_id', $product_id)->findOrFail($stock_id);
        $stock->update([
            'stock_date' => $request->input('stock_date'),
            'qty' => $request->input('qty'),
        ]);

        return redirect()->back()->with('success', 'Stock updated successfully');
    }

}
