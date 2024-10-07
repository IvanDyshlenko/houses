<?php

use App\Http\Controllers\HouseController;
use App\Http\Middleware\ForceJsonResponse;
use Illuminate\Support\Facades\Route;

Route::apiResource("/houses", HouseController::class)->
    only(["index", "store", "show", "update"])->
    names(["houses.index", "houses.store", "houses.show", "houses.update"])->
    middleware(ForceJsonResponse::class);
