<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $datas = Category::paginate();
        return view('admin.category.index', ['datas' => $datas]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->only('name'));
        return redirect()->back()->with(['msg' => 'بەسەرکەوتوی زیادکرا']);
    }

    public function edit(string $id)
    {
        $datas = Category::findOrFail($id);
        return view('admin.category.edit', compact('datas'));
    }

    public function update(CategoryRequest $request, string $id)
    {
        Category::findOrFail($id)->update($request->only('name'));
        return redirect()->back()->with(['msg' => 'بەسەرکەوتوی تازەکرایەوە']);
    }

    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('category.index');
    }
}
