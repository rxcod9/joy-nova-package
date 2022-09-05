<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Nova Routes
|--------------------------------------------------------------------------
|
| This file is where you may override any of the routes that are included
| with Nova.
|
*/

Route::group(['prefix' => config('joy-nova-replace-keyword.admin_prefix', 'admin')], function () {
    Route::group(['as' => 'nova.'], function () {

        $namespacePrefix = '\\'.config('joy-nova-replace-keyword.controllers.namespace').'\\';

        Route::group(['middleware' => 'admin.user'], function () use ($namespacePrefix) {

            $breadController = $namespacePrefix.'NovaBaseController';

            // Route::get('replace_keyword', $breadController.'@replace-keywordAll')->name('replaceKeyword-all');

        });

    });
});
