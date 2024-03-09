<?php

use App\Src\BoundedContext\Pouch\Infrastructure\Controllers\PouchApiController;
use App\Src\BoundedContext\Pouch\Infrastructure\Controllers\PouchSynchronizeApiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.'], function () {
    Route::apiResource('pouches', PouchApiController::class);
    Route::post('pouches/synchronize', PouchSynchronizeApiController::class)
        ->name('pouches.synchronize');
});
