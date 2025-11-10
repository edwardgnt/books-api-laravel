<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

Route::apiResource('books', BooksController::class);
