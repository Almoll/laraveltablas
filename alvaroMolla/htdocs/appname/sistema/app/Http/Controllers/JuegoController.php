<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\categoria;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;


class JuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
       /* $categorias = Categoria::all();
        $datos = array("lista_categoria" => $categorias);
        return response()->view("juego/index",$datos , 200);*/
        //$datos1['categorias']=Categoria::join("juegos","categorias.id","=","juegos.categoria_id")->get();
        //$datos2['categorias']=Categoria::all();
        //return view ('juego.index',$datos1, $datos2);

        //
        $datos['juegos']=Juego::paginate(30);
        return view('juego.index',$datos );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // $datos1['categorias']=Categoria::join("juegos","categorias.id","=","juegos.categoria_id")->get();//array 'categorias':esto saca las tablas juegos y categroias porque haces un join
       $datosC['categorias']=categoria::all();
       return view('juego.create', $datosC);
       $datosS['categorias']=categoria::all();
       return view('juego.create', $datosS);
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
        //$datos1['categorias']=Persona::join("categorias","categorias.id","=","categorias_id")->get();
        
        $campos=[
            'Nombre' =>'required|string|max:100',
            'NumJugadores' =>'required|string|max:100',
            'Genero' =>'required|string|max:100',
            'categoria_id' =>'required|string|max:100',
            'subcategoria_id' =>'required|string|max:100',
            'EdadRecomendada' =>'required|string|max:100',
            'Foto' =>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto requerida'
        ];

        $this->validate($request,$campos,$mensaje);

        //$Juego = request()->all();
        $datosJuego = request()->except('_token');

        if ($request->hasFile('Foto')) {
          //  $juego=Juego::findOrFail($id);
            $datosJuego['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Juego::insert($datosJuego);

        // return response()->json($datosJuego);
        return redirect('juego')->with('mensaje','Juego agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juego  $Juego
     * @return \Illuminate\Http\Response
     */
    public function show(Juego $juego)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juego  $Juego
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $juego=Juego::findOrFail($id);
        return view('juego.edit', compact('juego'));


        //$datos1['categorias']=Juego::join("categorias","categorias.id","=","categorias_id")->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $campos=[
            'Nombre' =>'required|string|max:100',
            'NumJugadores' =>'required|string|max:100',
            'Genero' =>'required|string|max:100',
            'categoria_id' =>'required|string|max:100',
            'subcategoria_id' =>'required|string|max:100',
            'EdadRecomendada' =>'required|string|max:100',
            

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
        $datosJuego = request()->except(['_token','_method']);


        if ($request->hasFile('Foto')) {
            $juego=Juego::findOrFail($id);

            Storage::delete('public/'.$juego->Foto);

            $datosJuego['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Juego::where('id','=',$id)->update($datosJuego);
        $juego=Juego::findOrFail($id);
        //return view('juego.edit', compact('juego') );

        return redirect('juego')->with('mensaje','Juego Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juego  $Juego
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $juego=Juego::findOrFail($id);

        if(Storage::delete('public/'.$juego->Foto)){

            Juego::destroy($id);

        }
        Juego::destroy($id);
        return redirect('juego')->with('mensaje','Juego Borrado');
    }
}
