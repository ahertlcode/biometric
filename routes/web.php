<?php
    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Web routes for admins
 */
Route::resource('admins','AdminController');
/**
 * Web routes for courses
 */
Route::resource('courses','CourseController');
/**
 * Web routes for departments
 */
Route::resource('departments','DepartmentController');
/**
 * Web routes for faculties
 */
Route::resource('faculties','FacultyController');
/**
 * Web routes for lecturers
 */
Route::resource('lecturers','LecturerController');
/**
 * Web routes for levels
 */
Route::resource('levels','LevelController');
/**
 * Web routes for password_resets
 */
Route::resource('password_resets','PasswordResetController');
/**
 * Web routes for registers
 */
Route::resource('registers','RegisterController');
/**
 * Web routes for sections
 */
Route::resource('sections','SectionController');
/**
 * Web routes for students
 */
Route::resource('students','StudentController');
/**
 * Web routes for user_types
 */
Route::resource('user_types','UserTypeController');
/**
 * Web routes for users
 */
Route::resource('users','UserController');
