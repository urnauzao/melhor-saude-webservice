<?php

namespace App\Http\Controllers;

use App\Models\Clinica;
use Illuminate\Http\Request;

class DefaultController extends Controller
{

    public function teste(){
        $clinica = new Clinica();
        $clinica->titulo = "Tester";
        $clinica->url_imagem = "http://google.com.br";
        $clinica->url = "https//teste.com.br";
        $clinica->descricao = "descricao pra valer";
        $clinica->local_resumido = "brasileirissimo";
        $clinica->endereco = "rua da silva";
        $clinica->num_endereco = "122";
        $clinica->complemento = "sampapaio";
        $clinica->cep = "83399923";
        $clinica->cidade = "São Paulo";
        $clinica->bairro = "Morumbi";
        $clinica->estado = "SP";
        $clinica->pais = "Brasil";
        $clinica->rating = 54;
        $clinica->save();



        $clinicas = Clinica::all();






        return response()->json(['clinicas' => $clinicas]);



    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinicas = Clinica::all();
        return response()->json(['clinicas' => $clinicas]);
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
}
