<?php

//JWT
Route::post('login', 'Auth\AuthController@login');
Route::post('register', 'Auth\AuthController@register');
Route::post('logout', 'Auth\AuthController@logout');
Route::post('refresh', 'Auth\AuthController@refresh');
Route::get('me', 'Auth\AuthController@me');

Route::middleware(['auth:api'])->group(function () {
    Route::apiResources([
        'locacoes' => 'LocacaoController',
        'filmes' => 'FilmeController',
        'clientes' => 'ClienteController',
        'telefones' => 'TelefoneController'
    ]);
    Route::get('clientes/{id}/alugados', 'ClienteController@alugados');
    Route::get('clientes/{id}/telefones', 'ClienteController@telefones');
    Route::get('telefone/{id}/cliente', 'TelefoneController@cliente');
});
