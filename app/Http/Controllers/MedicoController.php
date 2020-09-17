<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Clinica;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Medico";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json(['modelo-medico' => new Medico()]);
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
            if(empty($object->clinica_id)){
                $clinicas = Clinica::select('nome', 'id')->all();
                return response()->json(['erro' => "Id da clinica deve ser informado", 'clinicas' => $clinicas]);
            }

            $clinicas = Clinica::find($object->clinica_id)->first();
            if(empty($clinicas)){
                $clinicas = Clinica::select('nome', 'id')->all();
                return response()->json(['erro' => "Id da clinica inválido, informe um id válido", 'clinicas' => $clinicas]);
            }

            if(empty($object->nome))
                return response()->json(['erro' => "nome Inválido"]);

            if(Medico::where([ 'nome' => $object->nome ])->get())
                return response()->json(['erro' => "Nome do Médico já existe!"]);

            $medico = new Clinica();
            $medico->clinica_id = $object->clinica_id;
            $medico->nome = $object->nome;
            $medico->idade = $object->idade;
            $medico->especializacao = $object->especializacao;
            $medico->preco_consulta = $object->preco_consulta;
            $medico->telefone = $object->telefone;
            $medico->email = $object->email;
            $medico->whatsapp = $object->whatsapp;
            $medico->foto = $object->foto;
            $medico->save();

            $medico = Medico::all();
            return response()->json(['medico' => $medico]);
        } catch (\Throwable $th) {
            return response()->json(['erro' => $th]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        try {
            if(!isset($id))
                return response()->json(['erro' => "Deve ser informado um ID válido"]);

            $medico = Medico::find($id)->first();
            if(empty($medico))
                return response()->json(['erro' => "Nenhum médico foi encontrada"]);

            return response()->json(['clinica' => $medico]);
        } catch (\Throwable $th) {
            return response()->json(['erro' => $th]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medico $medico)
    {
        //
    }
}
