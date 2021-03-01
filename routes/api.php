<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function ($router) {
    $router->post('symptoms-predicts/random-forest', 'SymptomsPredictController@RandomForest')->name('symptoms-predicts.random-forest');
    $router->post('symptoms-predicts/naive-bayes', 'SymptomsPredictController@NaiveBayes')->name('symptoms-predicts.naive-bayes');
    $router->post('symptoms-predicts/design-tree', 'SymptomsPredictController@DesignTree')->name('symptoms-predicts.design-tree');
});
