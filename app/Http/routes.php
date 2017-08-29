<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\User;
Route::get('/', function () {
    return view('welcome');
});

//NOtification
Route::get('notification', 'PushNotificationController@sendNotificationToDevice');

//Users
Route::get('/landingpage','UsersController@getLanding');
Route::get('/login','UsersController@getLogin');
Route::post('/login','UsersController@login');
Route::post('/studlogout','UsersController@studLogout');
Route::get('/logout','UsersController@logout');	

// Route::post('/send','UsersController@send');

// Coordinator
Route::get('/coordinator/profile', 'CoordinatorController@getCoordinatorProfile');
Route::get('/viewregister','CoordinatorController@getCoordinatorRegister');
Route::post('/coordinator/register', 'CoordinatorController@insertCoordinator');
Route::get('/coordinator/companies','CoordinatorController@getCompanies');
Route::get('/coordinator/viewcompanydetails/{userid}','CoordinatorController@getCompanyDetails');
Route::post('/editcoorprofile','CoordinatorController@editCoordinatorProfile');
Route::get('/coordinator/class', 'CoordinatorController@getCoordinatorClass');
Route::get('/coordinator/studentlists', 'CoordinatorController@getCoordinatorStudentlist');
Route::get('/coordinator/studentinfo/{userid}','CoordinatorController@studentInfo');
Route::get('/coordinator/viewcompanyintern/{userid}','CoordinatorController@getViewCompanyIntern');
Route::get('/coordinator/companyevaluation/{userid}','CoordinatorController@getCompanyEvaluation');
Route::get('/coordinator/journalcontent/{journalid}','CoordinatorController@getJournalContent');

//Student
Route::get('/viewinternregister','StudentController@getInternRegister');
Route::post('/student/register','StudentController@insertStudent');
Route::post('/searchstudent','StudentController@searchStudent');
Route::get('/student/profile','StudentController@getStudentProfile');
Route::get('/student/productivitystatus','StudentController@getProductivityStatus');
Route::get('/student/evaluatecompanyform','StudentController@getEvaluation');
Route::post('/student/evaluatecomp','StudentController@insertEvaluation');
Route::get('/student/insight','StudentController@getInsight');
Route::post('/student/insertinsight','StudentController@insertInsight');
Route::post('/editinsight','StudentController@editInsight');
Route::get('/student/practicumpolicy','StudentController@getPracticumPolicy');

//Task
Route::get('/student/tasks','TaskController@getStudentTasks');
Route::post('/student/inserttask','TaskController@insertTask');
Route::get('/student/taskdone/{taskid}','TaskController@taskDone');
Route::post('/student/taskdone','TaskController@taskDone');
Route::post('/company/inserttaskforintern','TaskController@insertTaskForIntern');

//Journal
Route::get('/student/journal','JournalController@getStudentJournal');
Route::post('/student/addjournal','JournalController@addJournal');
Route::get('/student/journalcontent/{journalid}','JournalController@getJournalContent');






// Company
Route::get('/company/profile','CompanyController@getCompanyProfile');
Route::get('/company/practicumpolicy','CompanyController@getPracticumPolicy');
Route::get('/viewcompanyregister','CompanyController@getCompanyRegister');
Route::post('/company/register','CompanyController@insertCompany');
Route::get('/company/interns','CompanyController@getInterns');
Route::post('/editcomprofile','CompanyController@editCompanyProfile');
Route::get('/company/interninfo/{userid}','CompanyController@getInternInfo');
Route::post('/company/insertappraisal','CompanyController@insertAppraisal');
Route::get('/company/managesites','CompanyController@manageSites');
Route::post('/company/addsites','CompanyController@addSites');
Route::get('/company/updatesite/{catsitesid}','CompanyController@updateSite');
Route::get('/company/deletesite/{catsitesid}','CompanyController@deleteSite');
Route::get('/company/journalcontent/{journalid}','CompanyController@getJournalContent');
Route::get('/company/approvejournal/{journalid}','CompanyController@approveJournal');
Route::get('/company/disapprovejournal/{journalid}','CompanyController@disapproveJournal');
Route::post('/company/addcomment','CompanyController@addComment');
Route::post('/company/editcomment','CompanyController@editComment');

//Subject
Route::post('/addclassschedule','SubjectController@insertSubject');
