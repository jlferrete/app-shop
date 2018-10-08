<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index ()
    {
    	$products = Product::all();
    	return view('admin.products.index')->with(compact('products')); //listado de productos
    }

     public function create ()
    {
    	return view('admin.products.create'); //formulario de registro
    }

     public function store ()
    {
    	//registrar el producto en la base de datos
    }
}
