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

    public function graficos()
    {
        $sectores = Sectores::all();
       /* $carga = Carga::groupBy('sector_id') 
               ->selectRaw('sum(total) as sum')
               ->pluck('sum');*/

              /* $carga = Carga::groupBy('sector_id') 
               ->selectRaw('MAX(id) FROM carga GROUP BY sector_id')

               ->pluck('sum');*/

               $carga = DB::table('carga')
                        ->whereIn('id', function($query)
                        {
                            $query->select(DB::raw('MAX(id) as sum'))
                                  ->from('carga')
                                  ->groupBy('sector_id');
                        })->get(['total','sector_id']);
                        //->pluck('total','sector_id');

                       
                        foreach ($carga as $s) {
                          $d[] = Sectores::where('id',$s->sector_id)->first();
                        }

                        $union = $carga->union($d);

                       // $ar = array_push($d,'manzana');

                       /* $f = $carga->pluck('secstor_id')->each(function ($item, $key) {
                                      return Sectores::where('id',$item)->pluck('nombre_sector');
                                  });*/
                       
                       for ($i=0; $i < count($d) ; $i++) { 
                         $a[] = $d[$i]->nombre_sector;
                       }

                       $suma = array_sum($carga->pluck('total')->toarray());

//dd($a);
               

           /*    DB::table('carga')
                     ->select(DB::raw('count(*) as user_count, status'))
                     ->where('status', '<>', 1)
                     ->groupBy('status')
                     ->get();*/



              // SELECT * FROM carga WHERE id IN ( SELECT MAX(id) FROM carga GROUP BY sector_id )


       
        return view('carga.graficos',['sectores'=>$a,'carga' => $carga->pluck('total')->toarray(),'suma'=>$suma]);
    }
}
