<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function index()
    {
      $categories = Category::all();

      return view('addcategory', compact('categories'));
    }

    public function store(Request $request)
    {
      $category = Category::create([
        'name' => request('name')
      ]);

      return redirect('/addcategory');
    }

    public function edit()
    {
      $categories = Category::all();

      return view('editcategory', compact('categories'));
    }

    public function update(Request $request, $categoria)
    {
      $category = Category::find($categoria);


      if ($request->has('name') && $request->name !== null) {
          $category->name = $request->name;
      }

      $category->save();

      return redirect('/productos');
    }

    public function removeCategory()
    {
      $categories = Category::all();

      return view('removeCategory', compact('categories'));
    }

    public function destroy(Request $request, $categoria)
    {
      $category = Category::find($categoria);

      foreach ($category->product as $producto) {
        $producto->category_id = null;
        $producto->save();
      }

      $category->delete();

      return redirect('/removeCategory');
    }
}
