<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Nova API Routes
|--------------------------------------------------------------------------
|
| This file is where you may override any of the routes that are included
| with NovaReplaceKeyword.
|
*/

Route::group(['as' => 'joy-nova-replace-keyword.'], function () {
    // event(new Routing()); @deprecated

    $namespacePrefix = '\\' . config('joy-nova-replace-keyword.controllers.namespace') . '\\';

    // event(new RoutingAfter()); @deprecated
});
