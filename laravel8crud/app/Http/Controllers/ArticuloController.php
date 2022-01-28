<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// This is to use Articulo list that we created. It's empty at
// the begining, but according we insert data in our db, it will
// show us the articles.

use App\Models\Articulo;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * In this case the resources are going to be
     * from our DB 
     */
    public function index()
    {
        // this will bring us al registers in the specified table
        $articulos = Articulo::all();
        
        // This is to call the index template from the directory
        // we just created called "Articulo"
        return view('articulo.index')->with('articulos', $articulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * Here we're going to create our item
     */
    public function create()
    {
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulos = new Articulo();
        // This 'codigo' comes from view "Create.blade.php" as a class
        // so the rest of the articles come with this too
        $articulos->codigo = $request->get('codigo');
        $articulos->descripcion = $request->get('descripcion');
        $articulos->cantidad = $request->get('cantidad');
        $articulos->precio = $request->get('precio');

        // with this we save the info to store it in our DB
        $articulos->save();

        // redirect to the main View
        return redirect('/articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Here will brind what we made with Views in edi.blade.php
        // we only need to brind one, so we use 'find()'
        $articulo = Articulo::find($id);
        return view('articulo.edit')->with('articulo', $articulo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Here we save the changes we want to make on our $articulo
        // it has the same function than 'public function store()'
        // we only need to brind one, so we use 'find()'
        $articulo = Articulo::find($id);

        $articulo->codigo = $request->get('codigo');
        $articulo->descripcion = $request->get('descripcion');
        $articulo->cantidad = $request->get('cantidad');
        $articulo->precio = $request->get('precio');

        $articulo->save();

        return redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Here we delete our $articulo
        // we only need to brind one, so we use 'find()'
        $articulo = Articulo::find($id);

        $articulo->delete();

        return redirect('/articulos');
    }
}
