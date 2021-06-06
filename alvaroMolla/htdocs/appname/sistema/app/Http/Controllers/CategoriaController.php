<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        //
        $datos['categorias']=Categoria::paginate(30);
        return view('categoria.index',$datos );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $campos=[
            'Categoria' =>'required|string|max:100',
            'Subcategoria' =>'required|string|max:100',
            'genero' =>'required|string|max:100',
            'ejemplos' =>'required|string|max:100',
            'Foto' =>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto requerida'
        ];

        $this->validate($request,$campos,$mensaje);

        //$categoria = request()->all();
        $datosCategoria = request()->except('_token');

        if ($request->hasFile('Foto')) {
          //  $categoria=categoria::findOrFail($id);
            $datosCategoria['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Categoria::insert($datosCategoria);

        // return response()->json($datoscategoria);
        return redirect('categoria')->with('mensaje','Categoria agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categoria=Categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $campos=[
            'Categoria' =>'required|string|max:100',
            'Subcategoria' =>'required|string|max:100',
            'genero' =>'required|string|max:100',
            'ejemplos' =>'required|string|max:100',
            'Foto' =>'required|max:10000|mimes:jpeg,png,jpg',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            
        ];

        if ($request->hasFile('Foto')) {
          $campos =['Foto' =>'required|max:10000|mimes:jpeg,png,jpg',];
         // $mensaje=['Foto.required'=>'La foto es requerida'];
        }

        $this->validate( $request, $campos, $mensaje );
        //
        $datosCategoria = request()->except(['_token','_method']);


        if ($request->hasFile('Foto')) {
            $categoria=Categoria::findOrFail($id);

            Storage::delete('public/'.$categoria->Foto);

            $datosCategoria['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Categoria::where('id','=',$id)->update($datosCategoria);
        $categoria=Categoria::findOrFail($id);
        //return view('categoria.edit', compact('categoria') );

        return redirect('categoria')->with('mensaje','Categoria Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $categoria=Categoria::findOrFail($id);

        if(Storage::delete('public/'.$categoria->Foto)){

            Categoria::destroy($id);

        }
        Categoria::destroy($id);
        return redirect('categoria')->with('mensaje','Categoria Borrado');
    }
}
