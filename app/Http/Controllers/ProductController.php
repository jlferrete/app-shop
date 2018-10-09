<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index ()
    {
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products')); //listado de productos
    }

     public function create ()
    {
    	return view('admin.products.create'); //formulario de registro
    }

     public function store (Request $request)
    {
    	//registrar el producto en la base de datos
    	// dd($request->all());
    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
    	$product->save(); //INSERT

    	return redirect('/admin/products');

    }

         public function edit ($id)
    {
    	// return "Mostrar aquí el form de edición para el producto con id $id";
    	$product = Product::find($id);
    	return view('admin.products.edit')->with(compact('product')); //formulario de edicion
    }

     public function update (Request $request, $id)
    {
    	//registrar el producto en la base de datos
    	// dd($request->all());
    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
    	$product->save(); //UPDATE

    	return redirect('/admin/products');

    }
}
