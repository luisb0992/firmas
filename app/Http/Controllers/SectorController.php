<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("municipios.index", ["muni" => Sector::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'municipio' => 'required|unique:sectores,municipio'
        ]);

        $muni = new Sector($request->all());

        if($muni->save()){
            return redirect("sectores")->with([
              'flash_message' => 'Municipio agregado correctamente.',
              'flash_class'   => 'alert-success'
            ]);
        }else{
            return redirect("sectores")->with([
              'flash_message'   => 'Ha ocurrido un error.',
              'flash_class'     => 'alert-danger'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit(Sector $sector)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector $sector)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector)
    {
        //
    }
}
