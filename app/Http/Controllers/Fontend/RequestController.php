<?php

namespace App\Http\Controllers\Fontend;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function storeRequest(Request $request,$id)
    {
        $product = Product::find($id);

        if (!$product)
        {
            return redirect('all-pro')->with('error', 'Product not found!');
        }
        $user = auth()->user();
        $quantity = $request->input('quantity');

        $productRequest = new ProductRequest([
            'user_id'       => $user->id,
            'product_id'    => $product->id,
            'message'       => $request->input('message'),
            'quantity'      => $quantity,
        ]);
        $productRequest->save();
        $stock = Stock::where('product_id', $product->id)->first();
        if ($stock && $stock->qty > 0 && $stock->qty >= $quantity) {
            $stock->decrement('qty', $quantity);
        }
        return redirect('all-pro')->with('success', 'Product request sent successfully!');

    }
    public function userRequests()
{
    $user = Auth::user();
    $requests = ProductRequest::where('user_id', $user->id)->with('product')->get();
    return view('fontend.product.requestProduct', compact('requests'));
}
}
