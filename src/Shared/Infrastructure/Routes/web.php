<?php

use App\Src\BoundedContext\Pouch\Infrastructure\Controllers\PouchWebController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::resource('pouches', PouchWebController::class);
});
