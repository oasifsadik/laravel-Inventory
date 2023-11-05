<?php

namespace App\Http\Controllers\Fontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function request($id)
    {
        $product = Product::find($id);
        return view('fontend.product.request', compact('product'));
    }
    public function storeRequest(Request $request,$id)
    {
        $product = Product::find($id);

    if ($product) {
        $productRequest = new ProductRequest();
        $productRequest->user_id = auth()->user()->id;
        $productRequest->product_id = $product->id;
        $productRequest->message = $request->input('message');
        $productRequest->save();

        return redirect('all-pro')->with('success', 'Product request sent successfully!');
    }

    }
    public function userRequests()
{
    $user = Auth::user();
    $requests = ProductRequest::where('user_id', $user->id)->with('product')->get();
    return view('fontend.product.requestProduct', compact('requests'));
}
}
