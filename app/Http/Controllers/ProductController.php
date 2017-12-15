<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Category;
use \App\Brand;
use \App\Tag;
use \App\Cart;
use DB;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
      $categories = Category::all();
      $brands = Brand::all();
      $tags = Tag::all();

      return view('addproduct', compact('categories', 'brands', 'tags'));
    }

    public function store(Request $request)
    {

      $this->validate(request(), [
        'name' => 'required',
        'precio' => 'required',

      ]);

      if ($request->imagen !== null) {

        $extensionImagen = $request->file('imagen')->getClientOriginalExtension();
        $imagen = $request->file('imagen')->storeAs('imagenProducto', uniqid() . "." . $extensionImagen, 'public');

      }

      $product = Product::create([
        'name' => request('name'),
        'precio' => request('precio'),
      ]);

      if (isset($imagen)) {
        $product->imagen = $imagen;
      }

      if ($request->category_id !== null) {
        $category = Category::find($request->input('category_id'));
        $product->category()->associate($category);
      }

      if ($request->brand_id !== null) {
        $brand = Brand::find($request->input('brand_id'));
        $product->brand()->associate($brand);
      }

      if ($request->tag !== null) {

        $product->tags()->sync($request->input('tag'));
      }

      $product->save();

      return redirect('/productos');

    }


    public function editproduct()
    {
      $products = Product::all();
      $categories = Category::all();
      $brands = Brand::all();
      $tags = Tag::all();

      return view('editproduct', compact('products', 'categories', 'brands', 'tags'));
    }

    public function update(Request $request, $producto)
    {

      $product = Product::find($producto);

      if ($request->has('name') && $request->name !== null) {
        $product->name = $request->name;
      }

      if ($request->has('precio') && $request->precio !== null) {
        $product->precio = $request->precio;
      }

      if ($request->imagen !== null) {
        $extensionImagen = $request->file('imagen')->getClientOriginalExtension();
        $imagen = $request->file('imagen')->storeAs('imagenProducto', uniqid() . "." . $extensionImagen, 'public');

        $product->imagen = $imagen;
      }

      if ($request->category_id !== null) {
        $product->category_id = $request->category_id;
      }

      if ($request->brand_id !== null) {
        $product->brand_id = $request->brand_id;
      }

      if ($request->tag !== null) {
        $product->tags()->sync([]);
        $product->tags()->sync($request->input('tag'));
      }

      $product->save();

      return redirect('/productos');
    }

    public function delete()
    {
      $products = Product::all();

      return view('deleteproduct', compact('products'));
    }

    public function destroy(Request $request, $producto)
    {
      $product = Product::find($producto);

      $product->tags()->sync([]);

      $product->delete();
      return redirect('/productos');
    }

    public function search(Request $request)
    {
      $products = DB::table('products');
      $categories = Category::all();
      $brands = Brand::all();
      $tags = Tag::all();
      $tags2 = $request->tags;


      if ($request->has('tags') && count($request->tags) > 0) {
        $products = Product::whereHas('tags', function ($query) use ($tags2) {
            $query->whereIn('tags.id', $tags2);
        });
      }

      if ($request->has('brands') && count($request->brands) > 0) {
        $products = $products->whereIn('brand_id', $request->brands);
      }

      if ($request->has('categories') && count($request->categories) > 0) {
        $products = $products->whereIn('category_id', $request->categories);
      }

      $products = $products->get();

      return view('productos')->with(compact('products', 'categories', 'brands', 'tags'));


    }

    public function cart()
    {
      $carrito = Auth::user()->cart;

      return view('cart', compact('carrito'));
    }

    public function agregarCarrito($id)
    {
      $product = \App\Product::find($id);

      $existe = \App\User::whereHas('cart', function($q) use ($id){
        $q->where('product_id', $id);
      })->get();

      if (!$existe->count() > 0) {
        Auth::user()->cart()->toggle($product); //toggle es lo mismo que sync pero agrega uno, no todos
      }

      return redirect('carrito');

    }

    public function eliminarcarrito(Request $request, $producto)
    {
      $product = Product::find($producto);

      $existe = \App\User::whereHas('cart', function($q) use ($producto){
        $q->where('product_id', $producto);
      })->get();

      if ($existe->count() > 0) {
        Auth::user()->cart()->toggle($product); //toggle es lo mismo que sync pero agrega uno, no todos
      }

      return redirect('/carrito');

    }

}
