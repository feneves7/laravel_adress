<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AdressCollection;
use App\Adress;

class AdressController extends Controller
{
    public function store(Request $request)
    {
      $adress = new Adress([
        'cep' => $request->get('cep'),
        'logradouro' => $request->get('logradouro'),
        'numero' => $request->get('numero'),
        'complemento' => $request->get('complemento'),
        'bairro' => $request->get('bairro'),
        'localidade' => $request->get('localidade'),
        'uf' => $request->get('uf'),
      ]);

      $adress->save();

      return response()->json('successfully added');
    }

    public function index()
    {
      return new AdressCollection(Adress::all());
    }

    public function edit($id)
    {
      $adress = Adress::find($id);
      return response()->json($adress);
    }

    public function update($id, Request $request)
    {
      $adress = Adress::find($id);

      $adress->update($request->all());

      return response()->json('successfully updated');
    }

    public function delete($id)
    {
      $adress = Adress::find($id);

      $adress->delete();

      return response()->json('successfully deleted');
    }
}
