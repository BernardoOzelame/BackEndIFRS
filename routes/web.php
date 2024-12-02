<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CardapioController;
use App\Http\Controllers\CardapioItemController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\NutricionistaController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('api/')->group(function () {
    Route::prefix('usuarios')->group(function () {
        Route::post('/forgotPassword', [UsuarioController::class, 'forgotPassword']);
        Route::post('/login', [UsuarioController::class, 'login']);
        Route::get('/', [UsuarioController::class, 'index']);
        Route::get('/{id}', [UsuarioController::class, 'show']);
        Route::post('/', [UsuarioController::class, 'store']);
        Route::put('/{id}', [UsuarioController::class, 'update']);
        Route::delete('/{id}', [UsuarioController::class, 'destroy']);
        Route::post('/register', [JWTAuthController::class, 'register']);
        Route::post('/login', [JWTAuthController::class, 'login']);
        Route::middleware([JwtMiddleware::class])->get('/logout', [JWTAuthController::class, 'logout']);
      
        Route::get('/', [UsuarioController::class, 'index']);
        Route::get('/{id}', [UsuarioController::class, 'show']);
        Route::post('/', [UsuarioController::class, 'store']);
        Route::put('/{id}', [UsuarioController::class, 'update']);
        Route::delete('/{id}', [UsuarioController::class, 'destroy']);
        Route::post('/logout', [UsuarioController::class, 'logout'])->withoutMiddleware(['isAdm']);
        Route::post('/forgotPassword', [UsuarioController::class, 'forgotPassword']);
        Route::post('/login', [UsuarioController::class, 'login']);
    });

    Route::prefix('cursos')->middleware(['auth:api', 'isAdm'])->group(function () {
        Route::get('/', [CursoController::class, 'index']);
        Route::get('/{id}', [CursoController::class, 'show']);
        Route::post('/', [CursoController::class, 'store']);
        Route::put('/{id}', [CursoController::class, 'update']);
        Route::delete('/{id}', [CursoController::class, 'destroy']);
    });

    Route::prefix('turmas')->middleware(['auth:api', 'isAdm'])->group(function () {
        Route::get('/', [TurmaController::class, 'index']);
        Route::get('/{id}', [TurmaController::class, 'show']);
        Route::post('/', [TurmaController::class, 'store']);
        Route::put('/{id}', [TurmaController::class, 'update']);
        Route::delete('/{id}', [TurmaController::class, 'destroy']);
    });

    Route::prefix('alunos')->middleware(['auth:api', 'isAdm'])->group(function () {
        Route::get('/', [AlunoController::class, 'index']);
        Route::get('/{id}', [AlunoController::class, 'show']);
        Route::post('/', [AlunoController::class, 'store']);
        Route::put('/{id}', [AlunoController::class, 'update']);
        Route::delete('/{id}', [AlunoController::class, 'destroy']);
    });

    Route::prefix('turnos')->middleware(['auth:api', 'isAdm'])->group(function () {
        Route::get('/', [TurnoController::class, 'index']);
        Route::get('/{id}', [TurnoController::class, 'show']);
        Route::post('/', [TurnoController::class, 'store']);
        Route::put('/{id}', [TurnoController::class, 'update']);
        Route::delete('/{id}', [TurnoController::class, 'destroy']);
    });

    Route::prefix('nutricionistas')->middleware(['auth:api', 'isAdm'])->group(function () {
        Route::get('/', [NutricionistaController::class, 'index']);
        Route::get('/{id}', [NutricionistaController::class, 'show']);
        Route::post('/', [NutricionistaController::class, 'store']);
        Route::put('/{id}', [NutricionistaController::class, 'update']);
        Route::delete('/{id}', [NutricionistaController::class, 'destroy']);
    });

    Route::prefix('cardapios')->middleware(['auth:api', 'isAdm'])->group(function () {
        Route::get('/', [CardapioController::class, 'index']);
        Route::get('/{id}', [CardapioController::class, 'show']);
        Route::post('/', [CardapioController::class, 'store']);
        Route::put('/{id}', [CardapioController::class, 'update']);
        Route::delete('/{id}', [CardapioController::class, 'destroy']);
    });

    Route::prefix('itens')->middleware(['auth:api', 'isAdm'])->group(function () {
        Route::get('/', [ItemController::class, 'index']);
        Route::get('/{id}', [ItemController::class, 'show']);
        Route::post('/', [ItemController::class, 'store']);
        Route::put('/{id}', [ItemController::class, 'update']);
        Route::delete('/{id}', [ItemController::class, 'destroy']);
    });

    Route::prefix('cardapio_itens')->middleware(['auth:api', 'isAdm'])->group(function () {
        Route::get('/', [CardapioItemController::class, 'index']);
        Route::get('/{id}', [CardapioItemController::class, 'show']);
        Route::post('/', [CardapioItemController::class, 'store']);
        Route::put('/{id}', [CardapioItemController::class, 'update']);
        Route::delete('/{id}', [CardapioItemController::class, 'destroy']);
    });
});
