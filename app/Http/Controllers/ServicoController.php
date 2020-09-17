<?php

namespace App\Http\Controllers;

use App\Models\Clinica;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Servico";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json(['modelo-servico' => new Servico()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $object = $request->all();
            if(empty($object['nome']))
                return response()->json(['erro' => "nome Inválido"]);
            
            $servico = Servico::where(['nome' => $object['nome']])->first();   
            if(!$servico){
                $servico = new Servico;
                $servico->nome = $object['nome'];
                $servico->lista_clinicas = [];
                $servico->save();
            }
            

            if(count($object['lista_clinicas'])){
                $arrayClinicaIds = is_array($servico->lista_clinicas) ? $servico->lista_clinicas : json_encode($servico->lista_clinicas);
                
                foreach($object['lista_clinicas'] as $clinicaId){
                    $id = intval($clinicaId);
                    $clinica = Clinica::find($id)->first();
                    if($clinica && !in_array($clinica->id, $arrayClinicaIds))
                        $arrayClinicaIds[] = $id;
                }
                $servico->lista_clinicas = $arrayClinicaIds;
                $servico->save();
            }

            // $servico = Servico::all();
            return response()->json(['servico' => $servico]);
        } catch (\Throwable $th) {
            return response()->json(['erro' => $th]);
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try {
            $servicos = Servico::all();
            $resultado = [];
            foreach($servicos as $value){
                $resultado[] = [
                    "nome" => $value->nome,
                    "total" => count($value->lista_clinicas),
                    "clinicas" => $value->lista_clinicas
                ];
            }
            return response()->json(['servicos' => $resultado]);
        } catch (\Throwable $th) {
            return response()->json(['erro' => $th]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function edit(Servico $servico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servico $servico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servico $servico)
    {
        //
    }
}
