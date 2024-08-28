<?php

use App\Http\Controllers\UsuarioController;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// post: cadastrar algo novo
Route::post('/usuario', [UsuarioController::class, 'store']); // chamar a função store, mas precisa de um construtor (UsuarioController)

//tudo oq for busca usamos get (buscar por id)
Route::get('/usuario/{id}/find', [UsuarioController::class, 'findById']);

//index: todos os cadastros da tabela
Route::get('/usuario', [UsuarioController::class, 'index']);

Route::get('/usuario/search', [UsuarioController::class, 'searchByName']);

Route::get('/usuario/search/Email', [UsuarioController::class, 'searchByEmail']);

//excluir um usuario
Route::delete('/usuario/{id}/delete', [UsuarioController::class, 'delete']);

Route::put('/usuario', [UsuarioController::class, 'update']);