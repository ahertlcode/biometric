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
Route::get('admins/getFile', 'AdminController@getFile')->name('admins.getFile');
Route::post('admins/upload', 'AdminController@upload')->name('admins.upload');
Route::resource('admins','AdminController');

/**
 * Web routes for courses
 */
Route::get('courses/getFile', 'CourseController@getFile')->name('courses.getFile');
Route::post('courses/upload', 'CourseController@upload')->name('courses.upload');
Route::resource('courses','CourseController');

/**
 * Web routes for departments
 */
Route::get('departments/getFile', 'DepartmentController@getFile')->name('departments.getFile');
Route::post('departments/upload', 'DepartmentController@upload')->name('departments.upload');
Route::resource('departments','DepartmentController');

/**
 * Web routes for faculties
 */
Route::get('faculties/getFile', 'FacultyController@getFile')->name('faculties.getFile');
Route::post('faculties/upload', 'FacultyController@upload')->name('faculties.upload');
Route::resource('faculties','FacultyController');

/**
 * Web routes for lecturers
 */
Route::get('lecturers/getFile', 'LecturerController@getFile')->name('lecturers.getFile');
Route::post('lecturers/upload', 'LecturerController@upload')->name('lecturers.upload');
Route::resource('lecturers','LecturerController');

/**
 * Web routes for levels
 */
Route::get('levels/getFile', 'LevelController@getFile')->name('levels.getFile');
Route::post('levels/upload', 'LevelController@upload')->name('levels.upload');
Route::resource('levels','LevelController');

/**
 * Web routes for password_resets
 */
Route::get('password_resets/getFile', 'PasswordResetController@getFile')->name('password_resets.getFile');
Route::post('password_resets/upload', 'PasswordResetController@upload')->name('password_resets.upload');
Route::resource('password_resets','PasswordResetController');

/**
 * Web routes for registers
 */
Route::get('registers/getFile', 'RegisterController@getFile')->name('registers.getFile');
Route::post('registers/upload', 'RegisterController@upload')->name('registers.upload');
Route::resource('registers','RegisterController');

/**
 * Web routes for sections
 */
Route::get('sections/getFile', 'SectionController@getFile')->name('sections.getFile');
Route::post('sections/upload', 'SectionController@upload')->name('sections.upload');
Route::resource('sections','SectionController');

/**
 * Web routes for students
 */
Route::get('students/getFile', 'StudentController@getFile')->name('students.getFile');
Route::post('students/upload', 'StudentController@upload')->name('students.upload');
Route::resource('students','StudentController');

/**
 * Web routes for user_types
 */
Route::get('user_types/getFile', 'UserTypeController@getFile')->name('user_types.getFile');
Route::post('user_types/upload', 'UserTypeController@upload')->name('user_types.upload');
Route::resource('user_types','UserTypeController');

/**
 * Web routes for users
 */
Route::get('users/getFile', 'UserController@getFile')->name('users.getFile');
Route::post('users/upload', 'UserController@upload')->name('users.upload');
Route::resource('users','UserController');

