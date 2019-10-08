<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * API endpoints for admins
 * responding to all API calls
 * GET, POST, PUT/PATCH, DELETE
 */
Route::apiResource('admins', 'AdminController');


/**
 * API endpoints for courses
 * responding to all API calls
 * GET, POST, PUT/PATCH, DELETE
 */
Route::apiResource('courses', 'CourseController');


/**
 * API endpoints for departments
 * responding to all API calls
 * GET, POST, PUT/PATCH, DELETE
 */
Route::apiResource('departments', 'DepartmentController');


/**
 * API endpoints for faculties
 * responding to all API calls
 * GET, POST, PUT/PATCH, DELETE
 */
Route::apiResource('faculties', 'FacultyController');


/**
 * API endpoints for lecturers
 * responding to all API calls
 * GET, POST, PUT/PATCH, DELETE
 */
Route::apiResource('lecturers', 'LecturerController');


/**
 * API endpoints for levels
 * responding to all API calls
 * GET, POST, PUT/PATCH, DELETE
 */
Route::apiResource('levels', 'LevelController');


/**
 * API endpoints for password_resets
 * responding to all API calls
 * GET, POST, PUT/PATCH, DELETE
 */
Route::apiResource('password_resets', 'PasswordResetController');


/**
 * API endpoints for registers
 * responding to all API calls
 * GET, POST, PUT/PATCH, DELETE
 */
Route::apiResource('registers', 'RegisterController');


/**
 * API endpoints for sections
 * responding to all API calls
 * GET, POST, PUT/PATCH, DELETE
 */
Route::apiResource('sections', 'SectionController');


/**
 * API endpoints for students
 * responding to all API calls
 * GET, POST, PUT/PATCH, DELETE
 */
Route::apiResource('students', 'StudentController');


/**
 * API endpoints for user_types
 * responding to all API calls
 * GET, POST, PUT/PATCH, DELETE
 */
Route::apiResource('user_types', 'UserTypeController');
