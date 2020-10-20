<?php

namespace App\Http\Controllers\Admin;
use App\http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //listar producots
    public function index()
    {
        $products=Product::paginate(10);
        return view('admin.products.index')->with(compact('products'));// 
    }
    //crear productos formulario
    public function create()
    {   

        return view('admin.products.create');//
    }
    //registra producto en la db
    public function store(Request $request)
    {
      //dd($request->all());

      //validad arreglo asociativo
      $messages=[
           'name.required'=>'En necesario  digitae el nombre el producto.',
           'name.min'=>'El nombre debe tener como minimo 5 caracteres.',
           'description.required'=>'En necesario agregar una descripcion',
           'description.min'=>'La descripcion puede tener hasta 200 caracteres',
           'price.required'=>'Es obligatorio agregar un precio',
           'price.numeric'=>'Debe ingresar un precio valido',
           'price.min'=>'No se admiten precio negativos',
      ];

      $rules= [
           'name'=>'required|min:5',
           'description'=>'required|max:200',
           'price'=>'required|numeric|min:0',
            'long_description'=>'required',
      ];
      $this->validate($request,$rules,$messages);

      $product = new Product();
      $product ->name=$request->input('name');
      $product ->description=$request->input('description');
      $product ->price=$request->input('price');
      $product ->long_description=$request->input('long_description');
      $product->save(); //inset a la bd
      
      return  redirect('admin/products')->with('msj','Se ha registro un nuevo Producto. '); ;
    }

    //muestra el formulario
    public function edit($id)
    {   
        $product=Product::find($id); 
        return view('admin.products.edit')->with(compact('product'));//
    }
    //actualiza los datos
    public function update(Request $request , $id)
    {
      //dd($request->all());
      $messages=[
        'name.required'=>'En necesario  ingresar el nombre del producto.',
        'name.min'=>'El nombre debe tener como minimo 5 caracteres.',
        'description.required'=>'En necesario agregar una descripcion',
        'description.min'=>'La descripcion puede tener hasta 200 caracteres',
        'price.required'=>'Es obligatorio agregar un precio',
        'price.numeric'=>'Debe ingresar un precio valido',
        'price.min'=>'No se admiten precio negativos',
      ];

      $rules= [
        'name'=>'required|min:5',
        'description'=>'required|max:200',
        'price'=>'required|numeric|min:0',
         'long_description'=>'required',
      ];
      $this->validate($request,$rules,$messages);

      $product =  Product::find($id);
      $product ->name=$request->input('name');
      $product ->description=$request->input('description');
      $product ->price=$request->input('price');
      $product ->long_description=$request->input('long_description');
      $product->save(); //update
      
      return  redirect('admin/products');
    }

    //Eliminar  producto
    public function destroy($id)
    {
      //dd($request->all());
      $product =  Product::find($id);
      $product->delete();//delete
      
      return  back();
    }



}
