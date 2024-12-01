<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TrainerController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::get('trainer', [TrainerController::class, 'listTrainer']);
    Route::get('trainer/{id}', [TrainerController::class, 'listTrainerById']);
    Route::post('trainer/create', [TrainerController::class, 'insertTrainer']);
    Route::put('trainer/update', [TrainerController::class, 'updateTrainer']);
    Route::delete('trainer/delete', [TrainerController::class, 'deleteTrainer']);
});

?>
