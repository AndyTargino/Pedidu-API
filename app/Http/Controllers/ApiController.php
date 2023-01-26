<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Exception;

class ApiController extends Controller
{

    function appError($info) //Tratar mensagens de erro retornadas para na API
    {
        return response()->json(['error' => $info], 403);
    }

    // CRUD Produtos

    public function create(Request $request)
    {

        try {

            if (
                is_null($request->name)  || is_null($request->category)  ||
                is_null($request->status)  || is_null($request->quantity)
            ) //Verificar se algum dos campos de criação está vazio
                return ApiController::appError('Empty parameters are not allowed when creating products');

            if (!$request->status === 'ACTIVE' && !$request->status === 'INACTIVE')
                return ApiController::appError('Product status does not follow API standard (ACTIVE OR INACTIVE)');

            $verifyExist = Product::where('name', '=', $request->name); //Verificar se já existe um produto de mesmo nome salvo.
            if ($verifyExist->exists())
                return ApiController::appError('There is another product with this name');

            $create = Product::create([
                'name' => $request->name,
                'category' => $request->category,
                'status' => $request->status,
                'quantity' => $request->quantity,
            ]);

            return  response()->json(['success' => 'Product was created successfully', 'product' => $create->get()], 200);
        } catch (Exception $e) {
            return ApiController::appError(`An error occurred while creating the product: {$e}`);
        }
    }

    public function show() // Faz a listagem dos produtos existentes no banco
    {

        try {
            $show = Product::get();
            if (count($show) == 0) // Se não existir produtos, retornar mensagem de erro
                return ApiController::appError('There are no products to be listed');
            else
                return  response()->json(['products' => $show], 200);
        } catch (Exception $e) {
            return ApiController::appError(`An error occurred when listing products: {$e}`);
        }
    }

    public function delete(Request $request) //Deleta um produto no banco
    {

        try {

            if (!$request->id)
                return ApiController::appError('The parameter is incorrect, the correct parameter would be { id: product_id }'); //Retornar se a chave passada na API não for um id.

            $delete = Product::where('id', $request->id); //Buscar produto

            if (!$delete->exists())
                return ApiController::appError('This product does not exist or has been deleted'); //Retornar se o produto não existir.
            else
                $delete->delete(); //Se existir, deletar

            return  response()->json(['success' => 'Product deleted successfully'], 200);
        } catch (Exception $e) {

            return ApiController::appError(`An error occurred while deleting product: {$e}`);
        }
    }

    public function update(Request $request)
    {

        try {

            if (!$request->id) return ApiController::appError('The parameter is incorrect, the correct parameter would be { id : product_id }');  //Se a chave passada na API não for um id, retornar erro.

            $update = Product::where('id', '=', $request->id);

            if (!$update->exists()) return  ApiController::appError('This product does not exist'); //Buscar se produto existe no banco com este id.

            $verifyExist = Product::where('id', '!=', $request->id)->where('name', '=', $request->name); //Verificar se já existe um produto de mesmo nome salvo.

            if ($verifyExist->exists())
                return ApiController::appError('There is another product with this name');


            //Filtrar campos que receberão o update
            $array = array();
            $keys = ['name', 'category', 'status', 'quantity'];
            for ($i = 0; $i < count($keys); $i++) {
                if (!is_null($request[$keys[$i]])) {
                    $array[$keys[$i]] = $request[$keys[$i]];
                }
            }

            $update->update($array);

            return  response()->json(['success' => 'The product was updated successfully', 'product' => $update->get()], 200);
        } catch (Exception $e) {
            ApiController::appError(`An error occurred while updating this product: $e`);
        }
    }
}
