<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{ 
    public function __construct()
    {
        header('Access-Control-Allow-Origin:*');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        return $id ? Produto::find($id) : Produto::all();
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $produto = Produto::create($dados);
        if($produto){
            return response()->json(['data' =>$produto, 'status'=>true]);
        } else{
            return response()->json(['data' =>'erro ao criar produto', 'status'=>false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function search($marca)
    {
        $result = Produto::where('marca', 'like', '%'.$marca.'%')->get();
        if(count($result)){
            return $result;
        } else {
            return array('Result', 'No records found');
        }
    
    }

 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $produto = Produto::find($id);
        $produto->update($dados);

        if($produto){
            return response()->json(['data' =>$produto, 'status'=>true]);
        } else{
            return response()->json(['data' =>'erro ao criar produto', 'status'=>false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id)->delete();
        
    }
}
