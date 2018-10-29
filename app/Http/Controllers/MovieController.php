<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // guardar nuevos usuarios GET
        // echo "hello from INDEX";
        $movie = Movie::get();
		echo json_encode($movie);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // guardar nuevos usuarios POST
        // echo "Hello from Store";
        // print_r($request);
        // print_r( $request->all() );
        // GUARDAMOS EN LA BASE DE DATOS
        $movie = new Movie();
        $movie->name = $request->input( 'name' );
        $movie->description = $request->input( 'description' );
        $movie->year = $request->input( 'year' );
        $movie->genre = $request->input( 'genre' );
        $movie->duration = $request->input( 'duration' );
        $movie->save();
        echo json_encode($movie);
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $movie_id)
    {
        // modificar elementos de movies
        // echo "hello from UPDATE";
        $movie = Movie::find($movie_id);   // encontrar la pelicula
        $movie->name = $request->input( 'name' );
        $movie->description = $request->input( 'description' );
        $movie->year = $request->input( 'year' );
        $movie->genre = $request->input( 'genre' );
        $movie->duration = $request->input( 'duration' );
        $movie->save();
        echo json_encode($movie);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($movie_id)
    {
        // destruir elementos de movies
        // echo "Hello from DESTROY";
        $movie = Movie::find($movie_id);
        $movie->delete();
    }
}
/*********** BORRAMOS POR QUE NO LO NECESITAMOS****************/
/*
// es mostrar como un formulario de registros
public function create()
{
    
}
// mostrar los registros tal cual en una pagina
public function show(Movie $movie)
{
        
}
// editar
public function edit(Movie $movie)
{

}
*/
