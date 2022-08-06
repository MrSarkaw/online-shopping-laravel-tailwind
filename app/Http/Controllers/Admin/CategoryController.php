<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::paginate(10);
        return view('admin.category.index',compact('data'));
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(CategoryRequest $request)
    {

        Category::create($request->only('name'));

        return redirect()->back()->with(['msg'=>'بەسەرکەوتوی دروستکرا']);
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('admin.category.edit', compact('data'));
    }


    public function update(CategoryRequest $request, $id)
    {
       Category::findOrFail($id)->update($request->only('name'));
        return redirect()->back()->with(['msg'=>'بەسەرکەوتوی تازەکرایەوە']);

    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('category.index');
    }
}
