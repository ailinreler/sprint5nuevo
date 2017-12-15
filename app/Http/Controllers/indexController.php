<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\Tag;

class indexController extends Controller
{
    public function index()
    {
      $categories = Category::all();
      $destacados = Product::paginate(4);
      $products = Product::all();

      return view('home', compact('categories', 'destacados', 'products'));
    }

    public function goToProductos()
    {
      $products = Product::all();
      $categories = Category::all();
      $brands = Brand::all();
      $tags = Tag::all();

      return view('productos', compact('products', 'categories', 'brands', 'tags'));
    }

    public function goToFaq()
    {
      return view('faq');
    }

    public function goToContacto()
    {
      return view('contacto');
    }

    public function goToLogin()
    {
      return view('login');
    }

    public function goToRegister()
    {
      return view('register');
    }
}
