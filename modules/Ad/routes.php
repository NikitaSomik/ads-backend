<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Ad\Http\Controllers\Api\AdController;

Route::prefix('ads')->group(function (): void {
    Route::get('/', [AdController::class, 'index']);
    Route::get('/statistics', [AdController::class, 'statistics']);
});
