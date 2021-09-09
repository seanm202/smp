<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CertifcateController;
/////////Branch//////////////////
use App\Http\Controllers\Branch\AdmissionController;
use App\Http\Controllers\Branch\ExamController;
use App\Http\Controllers\Branch\ReportController;
////////////////Admin/////////////////////////////
use App\Http\Controllers\Admin\AuthorizeController;
use App\Http\Controllers\Admin\ABranchController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\AReportController;
use App\Http\Controllers\Admin\AssignRoleController;
use App\Http\Controllers\PDFController;

use App\Http\Controllers\ViewController;
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
//Dashboard
Route::get('/dashboard',[LoginController::class,'roleCheck'])->middleware(['auth'])->name('dashboard');

Route::get('getRoles',[AssignRoleController::class,'getRoles'])->middleware(['auth'])->name('getRoles');
Route::post('assignRole',[AssignRoleController::class,'assignRole'])->middleware(['auth'])->name('assignRole');
/*
Route::get('Admin/adminDashboard', function () {
    return view('Admin/adminDashboard');
})->middleware(['auth'])->name('adminDashboard');

Route::get('/Branch/branchDashboard', function () {
    return view('Branch/branchDashboard');
})->middleware(['auth'])->name('branchDashboard');

Route::get('/Student/studentDashboard', function () {
    return view('Student/studentDashboard');
})->middleware(['auth'])->name('studentDashboard');

*/
/////////View details/////////////////////
Route::get('/appBranches',[ViewController::class,'viewBranch'])->middleware(['auth'])->name('viewBranch');
Route::get('/appCourses',[ViewController::class,'viewCourses'])->middleware(['auth'])->name('viewCourses');
Route::get('/appSubjects',[ViewController::class,'viewSubjects'])->middleware(['auth'])->name('viewSubjects');
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////Admin/////////////////////////

Route::post('deleteApplicant', [AssignRoleController::class,'deleteApplicant'])->middleware(['auth'])->name('deleteApplicant');
Route::post('deleteStudent', [AuthorizeController::class,'deleteStudent'])->middleware(['auth'])->name('deleteStudent');
Route::post('SubmitSelectedRole', [AssignRoleController::class,'getChosenRoles'])->middleware(['auth'])->name('appliedFor');
Route::post('AdminAddStudentCourse', [AuthorizeController::class,'admitStudent'])->middleware(['auth'])->name('admitStudent');
//Route::post('AdminAddCourse', [App\Http\Controllers\Admin\CourseController::class,'addCourse'])->middleware(['auth'])->name('addCourse');
Route::post('AdminDeleteCourse', [App\Http\Controllers\Admin\CourseController::class,'deleteCourse'])->middleware(['auth'])->name('deleteCourse');
Route::post('AddSubjects',[App\Http\Controllers\Admin\SubjectController::class,'addSubject'])->middleware(['auth'])->name('addSubject');
Route::post('DeleteSubjects',[App\Http\Controllers\Admin\SubjectController::class,'deleteSubject'])->middleware(['auth'])->name('deleteSubject');
Route::get('AdminCourse', [App\Http\Controllers\Admin\CourseController::class,'getCourse'])->middleware(['auth'])->name('getCourse');
Route::get('AdminSubject',[App\Http\Controllers\Admin\SubjectController::class,'getSubject'])->middleware(['auth'])->name('getSubject');
Route::get('AdminReport',[App\Http\Controllers\Admin\AReportController::class,'viewReport'])->middleware(['auth'])->name('viewReport');

Route::post('readReport',[App\Http\Controllers\Admin\AReportController::class,'readReport'])->middleware(['auth'])->name('readReport');

Route::get('AdminBranch', [App\Http\Controllers\Admin\ABranchController::class,'getBranch'])->middleware(['auth'])->name('getBranch');
Route::post('AdminProvCertificate',[AuthorizeController::class,'provideProvisionalCertificate'])->middleware(['auth'])->name('provideProvisionalCertificate');
Route::post('AdminMarkCertificate',[AuthorizeController::class,'provideMarkSheetCertificate'])->middleware(['auth'])->name('provideMarkSheetCertificate');

Route::put('AdminImage',[ABranchController::class,'saveImage'])->middleware(['auth'])->name('provideAdminImage');
//////////////////////
///////////////////////
Route::get('authorizeCertificate', [AuthorizeController::class,'makeAuthorizeStudent'])->middleware(['auth'])->name('authorizeCertificate');
// ['uses'=>'LoginController@updatePassword']

Route::post('authorizeBranch',[ABranchController::class,'addBranch'])->middleware(['auth'])->name('addBranch');
Route::post('suspendBranch',[ABranchController::class,'suspendBranch'])->middleware(['auth'])->name('suspendBranch');
Route::post('reactivateBranch',[ABranchController::class,'reactivateBranch'])->middleware(['auth'])->name('reactivateBranch');
Route::post('deleteBranch',[ABranchController::class,'deleteBranch'])->middleware(['auth'])->name('deleteBranch');
//////////////////////////////////////

//////////////Branch////////////////////////

Route::get('branchExamManagement', [ExamController::class,'manageExam'])->middleware(['auth'])->name('manageExam');
Route::post('branchSubjectManagement', [ExamController::class,'getSubjects'])->middleware(['auth'])->name('getSubjects');
Route::post('branchSubjectMarkManagement', [ExamController::class,'addSubjectMark'])->middleware(['auth'])->name('addSubjectMark');
Route::post('calcCourseTotal', [ExamController::class,'calcCourseTotal'])->middleware(['auth'])->name('calcCourseTotal');
Route::post('getCourses', [ExamController::class,'getCourses'])->middleware(['auth'])->name('getCourses');

Route::get('genReport', [ReportController::class,'manageReport'])->middleware(['auth'])->name('manageReport');
Route::post('generateReport', [ReportController::class,'generateReport'])->middleware(['auth'])->name('generateReport');

Route::get('addStudent', [AdmissionController::class,'getCoursesName'])->middleware(['auth'])->name('getAdmission');
Route::post('addCourse', [CourseController::class,'addCourse'])->middleware(['auth'])->name('addCourse');

/**/
Route::put('/fileuploads',[ExamController::class,'addStudentPhoto'])->middleware(['auth'])->name('addStudentPhoto');

/**/


Route::get('getStudentDetails', [AdmissionController::class,'getStudentDetails'])->middleware(['auth'])->name('getStudentDetails');
Route::post('addStudentDetails', [App\Http\Controllers\Branch\AdmissionController::class,'newStudent'])->middleware(['auth'])->name('addStudentDetails');
Route::post('updatePassword', ['uses'=>'LoginController@updatePassword'])->middleware(['auth'])->name('updateBranchPassword');
//////////////////////////////////////

//////////////Student////////////////////

Route::get('viewPro',[CertifcateController::class,'viewPro'])->middleware(['auth'])->name('viewPro');
Route::get('viewMark', [CertifcateController::class,'viewMark'])->middleware(['auth'])->name('viewMark');
//////////////////////////////////////
//////////////Generate PDF////////////
//Route::get('downloadMark', [CertifcateController::class, 'generateMarkPDF'])->name('dMark');
//Route::get('downloadMark', [CertifcateController::class, 'generateMarkPDF'])->name('dMark');
Route::get('downloadMark', [PDFController::class, 'generateMPDF'])->middleware(['auth'])->name('downloadMark');
Route::get('downloadPro', [PDFController::class, 'generatePPDF'])->middleware(['auth'])->name('downloadPro');
//////////////////////////////////////////////////////////

//Route::get('webDestroy',[Auth\AuthenticatedSessionController::class,'destroy']);
Route::get('/logout', [LoginController::class,'logout']);
require __DIR__.'/auth.php';
