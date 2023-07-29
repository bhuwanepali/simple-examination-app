<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\StudentController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [LoginController::class, 'login']);

Route::group(['middleware' => 'api'], function () {
    Route::post('logout', [LoginController::class, 'logout']);
    Route::post('refresh', [LoginController::class, 'refresh']);
    Route::post('me', [LoginController::class, 'me']);

    Route::post('get_form', [QuestionnaireController::class, 'get_form']);
    Route::post('store_question', [QuestionnaireController::class, 'store_question']);
    Route::post('edit_question', [QuestionnaireController::class, 'edit_question']);
    Route::post('destroy', [QuestionnaireController::class, 'delete']);
    Route::get('get_questionnaire', [QuestionnaireController::class, 'get_questionnaire']);

    Route::post('get_student_form', [StudentController::class, 'get_student_form']);
    Route::post('store_student_info', [StudentController::class, 'store_student_info']);
    Route::post('edit_student_info', [StudentController::class, 'edit_student_info']);
    Route::post('delete', [StudentController::class, 'delete']);
    Route::get('get_student', [StudentController::class, 'get_student']);
});

Route::post('save_question_answer', [StudentController::class, 'save_question_answer']);
Route::post('objective_question', [StudentController::class, 'objective_question']);
Route::post('send_mail', [StudentController::class, 'send_mail'])->name('send_mail');