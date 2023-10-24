<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->save();
        return redirect('/allCategory');
    }
    public function show()
    {
        $category = Category::get();
        return view('admin.category.allCategory',compact('category'));
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->update();

        return redirect('/allCategory');
    }
}
