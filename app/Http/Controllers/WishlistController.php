<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::get();
        return view('fontend.wishlist.index',compact('wishlist'));
    }

    public function add()
    {
        return view('fontend.wishlist.addWistlist');
    }

    public function store(Request $request)
    {
        $user =Auth::user();
        $wishlist = new Wishlist();
        $wishlist->user_id = $user->id;
        $wishlist->wname = $request->wname;
        $wishlist->quantity = $request->quantity;
        $wishlist->save();

        return redirect('/wishlist')->with('success',"wishlist add Successfully!");
    }
    public function delete($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return redirect()->back()->with('success','delete successfully!');
    }


}
