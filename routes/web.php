<?php

use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Route::post('survey-create', SurveyController::class);
Route::post('survey-create', [SurveyController::class, 'store'])->name('create.survey');
Route::get('survey-show', [SurveyController::class, 'show'])->name('show.survey');
Route::get('create-show', [SurveyController::class, 'back'])->name('create.show');
