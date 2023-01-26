<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipalities;
use Exception;

class ApiIbgeController extends Controller
{


    function appError($info) //Tratar mensagens de erro retornadas para na API
    {
        return response()->json(['error' => $info], 403);
    }

    function get_ibge()
    {
        try {
            $url = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/33/municipios";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $resp = curl_exec($curl);
            curl_close($curl);
            return $resp;
        } catch (Exception $e) {
            return ApiIbgeController::appError(`An error occurred to get the IBGE API: {$e}`);
        }
    }


    public function show(Request $request) // Faz a listagem dos produtos existentes no banco
    {

        try {
            // OBS: O ibge_id não é obrigatório, mas torna o filtro mais preciso
            if (is_null($request->ibge_id) && is_null($request->ibge_name)) return ApiIbgeController::appError('You must search by ibge_id or ibge_name');

            // Filtro de busca por ID ou por NOME

            $findExist = Municipalities::orderBy('ibge_name', 'desc');
            if (!is_null($request->ibge_id))
                $findExist->where('ibge_id', '=', $request->ibge_id);
            if (!is_null($request->ibge_name))
                $findExist->where('ibge_name', '=', $request->ibge_name);

            if ($findExist->exists()) return response()->json(['municipio' =>  $findExist->get()], 200); // Se já existir salvo no banco, buscar dele.

            $ibge_api = ApiIbgeController::get_ibge(); // Se não existir, fazer busca na API do IBGE

            foreach (json_decode($ibge_api) as $key) {

                if ($key->id === $request->ibge_id || str_contains(strtolower($key->nome), strtolower($request->ibge_name))) {

                    $query = Municipalities::where('ibge_name', '=', $key->nome); // Verificando se o nome não existe no banco para cria-lo.
                    if (!$query->exists())
                        $query->create(['ibge_id' => $key->id, 'ibge_name' => $key->nome]);

                    return  response()->json(['municipio' =>  $query->get()], 200);
                }
            }
        } catch (Exception $e) {
            return ApiIbgeController::appError(`An error occurred when generating municipality: {$e}`);
        }
    }
}
