<?php

use Illuminate\Support\Facades\Route;

//rotas autenticadas
Route::group(['middleware' => 'auth'], function () {

});


Route::get('pessoas', "PessoaController@index")->name('index');
Route::get('pessoas/cadastrar', 'PessoaController@create')->name('pessoa.create');
Route::post('pessoas/novo', 'PessoaController@store')->name('pessoa.store');
Route::get('pessoas/editar/{pessoa}', 'PessoaController@edit')->name('pessoa.edit');
Route::patch('pessoas/atualizar/{id}', 'PessoaController@update')->name('pessoa.update');
Route::get('pessoas/apagar/{user}', 'PessoaController@destroy')->name('pessoa.destroy');
Route::get('pessoas/visualizar/{user}', 'PessoaController@show')->name('pessoa.show');
