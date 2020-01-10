<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::paginate(10);

        $vac = compact("peliculas");

        return view ("peliculas.index", $vac);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $id)
    {
      return view ('peliculas.show')->with('Pelicula',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function topFive (){
      $peliculas = Pelicula:: where("rating", ">", 9)
      ->orderBy("rating")
      ->limit(5)
      ->get();

      $vac= compact("peliculas");

      return view ("peliculas.topFive", $vac);
    }

    public function RottenFive (){
      $peliculas = Pelicula:: where("rating", "<", 6)
      ->orderBy("rating")
      ->limit(10)
      ->get();

      $vac= compact("peliculas");

      return view ("peliculas.rottenFive", $vac);
    }
}
