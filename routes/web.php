<?php

use App\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'PageController@index');
Route::get('/contact', 'PageController@contact');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/student', 'StudentController@index')->name('student')->middleware('student');
Route::get('/teacher', 'TeacherController@index')->name('teacher')->middleware('teacher');
Route::get('/parent', 'ParentController@index')->name('parent')->middleware('parent');
Route::get('/librarian', 'LibrarianController@index')->name('librarian')->middleware('librarian');
Route::get('/accountant', 'AccountantController@index')->name('accountant')->middleware('accountant');

Route::group(['middleware' => ['auth', 'superadmin']], function () {

    Route::get('/superadmin', 'SuperAdminController@index');
    Route::get('/adminrole-register', 'SuperAdminController@addAdmin');
    Route::get('/adminrole-edit/{id}', 'SuperAdminController@editAdmin');
    Route::put('/adminrole-update/{id}', 'SuperAdminController@updateAdmin');
    Route::put('/adminrole-active/{id}', 'SuperAdminController@activeAdmin');
    Route::delete('/adminrole-delete/{id}', 'SuperAdminController@deleteAdmin');
    Route::put('/addadminrole', 'SuperAdminController@superaddsadmin');
    Route::get('/addadminpage', function () {
        return view('superadmin.addnewadmin');
    });
});

Route::group(['middleware' => ['auth', 'admin']], function () {

    //index
    Route::get('/admin', 'AdminController@index');

    //roles
    Route::get('/teacher-page', 'AdminController@teacherPage');
    Route::get('/addteacherpage', 'AdminController@addTeacherPage');
    Route::put('/addteacherrole', 'AdminController@addTeacher');
    Route::get('/teacherrole-edit/{id}', 'AdminController@editTeacherPage');
    Route::put('/teacherrole-update/{id}', 'AdminController@updateTeacher');
    Route::delete('/teacherrole-delete/{id}', 'AdminController@deleteTeacher');

    Route::get('/student-page', 'AdminController@studentPage');
    Route::get('/addstudentpage', 'AdminController@addStudentPage');
    Route::post('/addstudentrole', 'AdminController@addStudent');
    Route::get('/studentrole-edit/{id}', 'AdminController@editStudentPage');
    Route::put('/studentrole-update/{id}', 'AdminController@updateStudent');
    Route::delete('/studentrole-delete/{id}', 'AdminController@deleteStudent');

    Route::get('/accountant-page', 'AdminController@accountantPage');
    Route::get('/addaccountantpage', 'AdminController@addAccountantPage');
    Route::put('/addaccountantrole', 'AdminController@addAccountant');
    Route::get('/accountantrole-edit/{id}', 'AdminController@editAccountantPage');
    Route::put('/accountantrole-update/{id}', 'AdminController@updateAccountant');
    Route::delete('/accountantrole-delete/{id}', 'AdminController@deleteAccountant');

    Route::get('/librarian-page', 'AdminController@librarianPage');
    Route::get('/addlibrarianpage', 'AdminController@addLibrarianPage');
    Route::put('/addlibrarianrole', 'AdminController@addLibrarian');
    Route::get('/librarianrole-edit/{id}', 'AdminController@editLibrarianPage');
    Route::put('/librarianrole-update/{id}', 'AdminController@updateLibrarian');
    Route::delete('/librarianrole-delete/{id}', 'AdminController@deleteLibrarian');

    Route::get('/parent-page', 'AdminController@parentPage');
    Route::get('/addparentpage', 'AdminController@addParentPage');
    Route::put('/addparentrole', 'AdminController@addParent');
    Route::get('/parentrole-edit/{id}', 'AdminController@editParentPage');
    Route::put('/parentrole-update/{id}', 'AdminController@updateParent');
    Route::delete('/parentrole-delete/{id}', 'AdminController@deleteParent');

    //subject
//    Route::get('/subject-page', 'AdminController@subjectPage');
//    Route::post('/addsubject', 'AdminController@addSubject');
//    Route::delete('/subject-delete/{id}', 'AdminController@deleteSubject');

    //class
    Route::get('/level-page', 'AdminController@levelPage');
    Route::post('/addlevel', 'AdminController@addLevel');
    Route::delete('/level-delete/{id}', 'AdminController@deleteLevel');

    //accounts
    Route::get('/account-student-page', 'AdminController@accountStudentPage');
    Route::get('/class-account', 'AdminController@accountStudentClassPage');
    Route::get('/add-fee-page', 'AdminController@addFeePage');
    Route::put('/add-fee', 'AdminController@addFee');
    Route::delete('/feeaddition-delete/{id}', 'AdminController@addFeeDelete');

    //Schedule
    Route::get('/schedule-page', 'AdminController@schedulePage');
    Route::post('/addschedule', 'AdminController@addSchedule');
    Route::delete('/schedule-delete/{id}', 'AdminController@deleteSchedule');

    //Routine
    Route::get('/routine', 'AdminController@routine');
    Route::post('/addroutine', 'AdminController@addRoutine');
    Route::delete('/schedule-delete/{id}', 'AdminController@deleteSchedule');

});


Route::group(['middleware' => ['auth', 'teacher']], function () {

    //index
    Route::get('/teacher', 'TeacherController@index');


});

//calendar
Route::get('/fullcalendar', 'EventController@index');
Route::post('/fullcalendar/create', 'EventController@create');
Route::post('/fullcalendar/update', 'EventController@update');
Route::post('/fullcalendar/delete', 'EventController@destroy');
