<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/obter-resposta', function (Request $request) {
	$resposta = file_get_contents('https://vidadeprogramador.com.br');

	preg_match_all(
		'/.*class\=\"post(\s|\").*\n.*\"\>(.*)\<.*(\n.*){11}.*class\=\"entry\".*\n.*src\=\"(.*)\"\salt.*/',
		$resposta,
		$resultados,
		PREG_SET_ORDER
	);

	$resultadoFinal = array_map(function($resultado) {
		return ['titulo'=> $resultado[2], 'imagemURL'=> $resultado[4]];
	}, $resultados);

    return ['dados'=> $resultadoFinal];
});
