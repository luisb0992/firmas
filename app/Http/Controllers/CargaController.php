<?php

namespace App\Http\Controllers;

use App\Carga;
use Illuminate\Http\Request;
use App\Tabulacion;
use Barryvdh\DomPDF\Facade as PDF;

class CargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tabulacion = Tabulacion::all(['id','municipio']);
        return view('carga.create',['municipios' => $tabulacion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
        //dd($request->all());
        try {

            $carga = new Carga;
            $carga->fill($request->all());

              $validation = Carga::where('sector_id',$request->sector_id)->where('hora_reporte',$request->hora_reporte)->exists();

              if ($validation) {
                  return redirect("cargas/create")->with([
                      'flash_message' => 'Ya existe este reporte de esta hora, verifique.',
                      'flash_class' => 'alert-warning'
                      ]);
              }else{

                if($carga->save()){
                return redirect("cargas")->with([
                  'flash_message' => 'Carga agregada correctamente.',
                  'flash_class' => 'alert-success'
                  ]);
                  }else{
                    return redirect("cargas")->with([
                      'flash_message' => 'Ha ocurrido un error.',
                      'flash_class' => 'alert-danger',
                      'flash_important' => true
                      ]);
                  }
              }

        }catch (Exception $e) {

             return redirect("carga/create")->with([
                  'flash_message' => 'Ha ocurrido un error intente de nuevo.',
                  'flash_class' => 'alert-danger'
                  ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function show(Carga $carga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function edit(Carga $carga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carga $carga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carga $carga)
    {
        //
    }
}
