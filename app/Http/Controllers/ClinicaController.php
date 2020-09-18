<?php

namespace App\Http\Controllers;

use App\Models\Clinica;
use Illuminate\Http\Request;

class ClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return "Clinicas";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelo = Clinica::all()->limit(1)->get();
        return response()->json(['modelo-clinica' => $modelo]);
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

            $check = Clinica::where([ 'nome' => $object['nome'] ])->get();
            if(count($check))
                return response()->json(['erro' => "Nome da clinica já existe!", 'clinica' => $check, 'nome' => $object['nome'] ]);

            $clinica = new Clinica();
            $clinica->nome = $object['nome'];
            $clinica->url_imagem = $object['url_imagem'];
            $clinica->url = $object['url'];
            $clinica->whatsapp = $object['whatsapp'];
            $clinica->descricao = $object['descricao'];
            $clinica->local_resumido = $object['local_resumido'];
            $clinica->logradouro = $object['logradouro'];
            $clinica->num_endereco = $object['num_endereco'];
            $clinica->complemento = $object['complemento'];
            $clinica->cep = $object['cep'];
            $clinica->cidade = $object['cidade'];
            $clinica->bairro = $object['bairro'];
            $clinica->estado = $object['estado'];
            $clinica->pais = $object['pais'];
            $clinica->rating = $object['rating'];
            $clinica->save();

            return response()->json(['clinica' => $clinica]);
        } catch (\Throwable $th) {
            return response()->json(['erro' => $th]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        try {
            if(!$id)
                return response()->json(['erro' => "Deve ser informado um ID válido"]);

            $clinica = Clinica::find($id)->first();
            if(!$clinica)
                return response()->json(['erro' => "Nenhuma clinica foi encontrada"]);

            return response()->json(['clinica' => $clinica, 'id' => $id]);
        } catch (\Throwable $th) {
            return response()->json(['erro' => $th]);
        }
    }

    public function all(){
        try {
            $clinicas = Clinica::all();
            return response()->json(['clinicas' => $clinicas]);
        } catch (\Throwable $th) {
            return response()->json(['erro' => $th]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinica $clinica)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clinica $clinica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinica $clinica)
    {
        //
    }
}
