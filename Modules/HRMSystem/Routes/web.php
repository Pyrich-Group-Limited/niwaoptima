<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Modules\HRMSystem\Http\Controllers\SetSalaryController;
use Modules\HRMSystem\Http\Controllers\AllowanceController;
use Modules\HRMSystem\Http\Controllers\PayslipTypeController;
use Modules\HRMSystem\Http\Controllers\LeaveController;
use Modules\HRMSystem\Http\Controllers\AttendanceEmployeeController;
use Modules\HRMSystem\Http\Controllers\PaySlipController;
use Modules\HRMSystem\Http\Controllers\CommissionController;
use Modules\HRMSystem\Http\Controllers\LoanController;
use Modules\HRMSystem\Http\Controllers\SaturationDeductionController;
use Modules\HRMSystem\Http\Controllers\OtherPaymentController;
use Modules\HRMSystem\Http\Controllers\OvertimeController;
use Modules\HRMSystem\Http\Controllers\DesignationController;
use Modules\HRMSystem\Http\Controllers\GoalTypeController;
use Modules\HRMSystem\Http\Controllers\TrainingTypeController;
use Modules\HRMSystem\Http\Controllers\AwardTypeController;
use Modules\HRMSystem\Http\Controllers\TerminationTypeController;
use Modules\HRMSystem\Http\Controllers\JobCategoryController;
use Modules\HRMSystem\Http\Controllers\JobStageController;
use Modules\HRMSystem\Http\Controllers\PerformanceTypeController;
use Modules\HRMSystem\Http\Controllers\CompetenciesController;
use Modules\HRMSystem\Http\Controllers\CompanyPolicyController;
use Modules\HRMSystem\Http\Controllers\AssetController;
use Modules\HRMSystem\Http\Controllers\MeetingController;
use Modules\HRMSystem\Http\Controllers\TrainingController;
use Modules\HRMSystem\Http\Controllers\TrainerController;
use Modules\HRMSystem\Http\Controllers\IndicatorController;
use Modules\HRMSystem\Http\Controllers\AppraisalController;
use Modules\HRMSystem\Http\Controllers\GoalTrackingController;
use Modules\HRMSystem\Http\Controllers\AwardController;
use Modules\HRMSystem\Http\Controllers\TransferController;
use Modules\HRMSystem\Http\Controllers\ResignationController;
use Modules\HRMSystem\Http\Controllers\TravelController;
use Modules\HRMSystem\Http\Controllers\PromotionController;
use Modules\HRMSystem\Http\Controllers\ComplaintController;
use Modules\HRMSystem\Http\Controllers\WarningController;
use Modules\HRMSystem\Http\Controllers\TerminationController;
use Modules\HRMSystem\Http\Controllers\AnnouncementController;
use Modules\HRMSystem\Http\Controllers\HolidayController;
use Modules\HRMSystem\Http\Controllers\JobController;
use Modules\HRMSystem\Http\Controllers\JobApplicationController;
use Modules\HRMSystem\Http\Controllers\CustomQuestionController;
use Modules\HRMSystem\Http\Controllers\InterviewScheduleController;
use App\Http\Controllers\UserController;


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


/* Route::prefix('hr')->group(function() {
    Route::get('/', 'HRController@index');
}); */

Route::resource('setsalary', SetSalaryController::class)->middleware(['auth']);
Route::get('employee/salary/{eid}', [SetSalaryController::class, 'employeeBasicSalary'])->name('employee.basic.salary')->middleware(['auth']);
Route::post('employee/update/sallary/{id}', [SetSalaryController::class, 'employeeUpdateSalary'])->name('employee.salary.update')->middleware(['auth']);
Route::get('salary/employeeSalary', [SetSalaryController::class, 'employeeSalary'])->name('employeesalary')->middleware(['auth']);
Route::post('branch/employee/json', [UserController::class, 'employeeJson'])->name('branch.employee.json')->middleware(['auth']);

Route::resource('allowance', AllowanceController::class)->middleware(['auth']);
Route::get('allowances/create/{eid}', [AllowanceController::class, 'allowanceCreate'])->name('allowances.create')->middleware(['auth']);

//payslip

Route::resource('paysliptype', PayslipTypeController::class)->middleware(['auth']);
Route::resource('commission', CommissionController::class)->middleware(['auth']);
Route::resource('allowanceoption', AllowanceOptionController::class)->middleware(['auth']);
Route::resource('loanoption', LoanOptionController::class)->middleware(['auth']);
Route::resource('deductionoption', DeductionOptionController::class)->middleware(['auth']);
Route::resource('loan', LoanController::class)->middleware(['auth']);
Route::resource('saturationdeduction', SaturationDeductionController::class)->middleware(['auth']);
Route::resource('otherpayment', OtherPaymentController::class)->middleware(['auth']);
Route::resource('overtime', OvertimeController::class)->middleware(['auth']);


Route::get('commissions/create/{eid}', [CommissionController::class, 'commissionCreate'])->name('commissions.create')->middleware(['auth']);
Route::get('loans/create/{eid}', [LoanController::class, 'loanCreate'])->name('loans.create')->middleware(['auth']);
Route::get('saturationdeductions/create/{eid}', [SaturationDeductionController::class, 'saturationdeductionCreate'])->name('saturationdeductions.create')->middleware(['auth']);
Route::get('otherpayments/create/{eid}', [OtherPaymentController::class, 'otherpaymentCreate'])->name('otherpayments.create')->middleware(['auth']);
Route::get('overtimes/create/{eid}', [OvertimeController::class, 'overtimeCreate'])->name('overtimes.create')->middleware(['auth']);
Route::get('payslip/paysalary/{id}/{date}', [PaySlipController::class, 'paysalary'])->name('payslip.paysalary')->middleware(['auth']);
Route::get('payslip/bulk_pay_create/{date}', [PaySlipController::class, 'bulk_pay_create'])->name('payslip.bulk_pay_create')->middleware(['auth']);
Route::post('payslip/bulkpayment/{date}', [PaySlipController::class, 'bulkpayment'])->name('payslip.bulkpayment')->middleware(['auth']);
Route::post('payslip/search_json', [PaySlipController::class, 'search_json'])->name('payslip.search_json')->middleware(['auth']);
Route::get('payslip/employeepayslip', [PaySlipController::class, 'employeepayslip'])->name('payslip.employeepayslip')->middleware(['auth']);
Route::get('payslip/showemployee/{id}', [PaySlipController::class, 'showemployee'])->name('payslip.showemployee')->middleware(['auth']);
Route::get('payslip/editemployee/{id}', [PaySlipController::class, 'editemployee'])->name('payslip.editemployee')->middleware(['auth']);
Route::post('payslip/editemployee/{id}', [PaySlipController::class, 'updateEmployee'])->name('payslip.updateemployee')->middleware(['auth']);
Route::get('payslip/pdf/{id}/{m}', [PaySlipController::class, 'pdf'])->name('payslip.pdf')->middleware(['auth']);
Route::get('payslip/payslipPdf/{id}', [PaySlipController::class, 'payslipPdf'])->name('payslip.payslipPdf')->middleware(['auth']);
Route::get('payslip/send/{id}/{m}', [PaySlipController::class, 'send'])->name('payslip.send')->middleware(['auth']);
Route::get('payslip/delete/{id}', [PaySlipController::class, 'destroy'])->name('payslip.delete')->middleware(['auth']);
Route::resource('payslip', PaySlipController::class)->middleware(['auth']);
Route::post('export/payslip', [PaySlipController::class,'export'])->name('payslip.export');


Route::get('leave/{id}/action', [LeaveController::class, 'action'])->name('leave.action')->middleware(['auth']);
Route::post('leave/changeaction', [LeaveController::class, 'changeaction'])->name('leave.changeaction')->middleware(['auth']);
Route::post('leave/jsoncount', [LeaveController::class, 'jsoncount'])->name('leave.jsoncount')->middleware(['auth']);

Route::resource('leave', LeaveController::class)->middleware(['auth']);

Route::get('attendanceemployee/bulkattendance', [AttendanceEmployeeController::class, 'bulkAttendance'])->name('attendanceemployee.bulkattendance')->middleware(['auth']);
Route::post('attendanceemployee/bulkattendance', [AttendanceEmployeeController::class, 'bulkAttendanceData'])->name('attendanceemployee.bulkattendance')->middleware(['auth']);
Route::post('attendanceemployee/attendance', [AttendanceEmployeeController::class, 'attendance'])->name('attendanceemployee.attendance')->middleware(['auth']);
Route::resource('attendanceemployee', AttendanceEmployeeController::class)->middleware(['auth']);
Route::get('import/attendance/file', [AttendanceEmployeeController::class, 'importFile'])->name('attendance.file.import');
Route::post('import/attendance', [AttendanceEmployeeController::class, 'import'])->name('attendance.import');

Route::resource('designation', DesignationController::class)->middleware(['auth']);
Route::resource('goaltype', GoalTypeController::class)->middleware(['auth']);
Route::resource('trainingtype', TrainingTypeController::class)->middleware(['auth']);
Route::resource('awardtype', AwardTypeController::class)->middleware(['auth']);
Route::resource('terminationtype', TerminationTypeController::class)->middleware(['auth']);
Route::resource('job-category', JobCategoryController::class)->middleware(['auth']);

Route::resource('job-stage', JobStageController::class)->middleware(['auth']);
Route::post('job-stage/order', [JobStageController::class, 'order'])->name('job.stage.order');

Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ], function (){
    Route::resource('performanceType', PerformanceTypeController::class);
    
}
);
Route::resource('competencies', CompetenciesController::class)->middleware(['auth']);
Route::resource('company-policy', CompanyPolicyController::class)->middleware(['auth']);
Route::resource('account-assets', AssetController::class)->middleware(['auth']);

Route::post('meeting/getdepartment', [MeetingController::class, 'getdepartment'])->name('meeting.getdepartment')->middleware(['auth']);
Route::post('meeting/getemployee', [MeetingController::class, 'getemployee'])->name('meeting.getemployee')->middleware(['auth']);
Route::resource('meeting', MeetingController::class)->middleware(['auth']);
Route::any('meeting/get_meeting_data', [MeetingController::class, 'get_meeting_data'])->name('meeting.get_meeting_data')->middleware(['auth']);
Route::get('meeting-calender', [MeetingController::class, 'calender'])->name('meeting.calender')->middleware(['auth']);

Route::resource('trainer', TrainerController::class)->middleware(['auth']);
Route::post('training/status', [TrainingController::class, 'updateStatus'])->name('training.status')->middleware(['auth']);
Route::resource('training', TrainingController::class)->middleware(['auth']);
Route::get('show-employee-profile/{id}', [TrainingController::class, 'profileShow'])->name('employee.show')->middleware(['auth']);

Route::resource('indicator', IndicatorController::class)->middleware(['auth']);
Route::resource('appraisal_index', AppraisalController::class)->middleware(['auth']);
Route::resource('goaltracking', GoalTrackingController::class)->middleware(['auth']);
Route::post('employee/json', [UserController::class, 'json'])->name('employee.json')->middleware(['auth']);
Route::post('/appraisals', [AppraisalController::class, 'empByStar'])->name('empByStar')->middleware(['auth']);
Route::post('/appraisals1', [AppraisalController::class, 'empByStar1'])->name('empByStar1')->middleware(['auth']);
Route::post('/getemployee', [AppraisalController::class, 'getemployee'])->name('getemployee');

Route::resource('award', AwardController::class)->middleware(['auth']);
Route::resource('transfer', TransferController::class)->middleware(['auth']);
Route::resource('resignation', ResignationController::class)->middleware(['auth']);
Route::resource('travel', TravelController::class)->middleware(['auth']);
Route::resource('promotion', PromotionController::class)->middleware(['auth']);
Route::resource('complaint', ComplaintController::class)->middleware(['auth']);
Route::resource('warning', WarningController::class)->middleware(['auth']);
Route::resource('termination', TerminationController::class)->middleware(['auth']);
Route::get('termination/{id}/description', [TerminationController::class, 'description'])->name('termination.description');
Route::post('announcement/getdepartment', [AnnouncementController::class, 'getdepartment'])->name('announcement.getdepartment');
Route::post('announcement/getemployee', [AnnouncementController::class, 'getemployee'])->name('announcement.getemployee');
Route::resource('announcement', AnnouncementController::class)->middleware(['auth',]);
Route::resource('holiday', HolidayController::class)->middleware(['auth']);
Route::get('holiday-calender', [HolidayController::class, 'calender'])->name('holiday.calender');

Route::resource('job', JobController::class)->middleware(['auth']);
Route::get('career/{id}/{lang}', [JobController::class, 'career'])->name('career')->middleware(['auth']);
Route::get('job/requirement/{code}/{lang}', [JobController::class, 'jobRequirement'])->name('job.requirement')->middleware(['auth']);
Route::get('job/apply/{code}/{lang}', [JobController::class, 'jobApply'])->name('job.apply')->middleware(['auth']);
Route::post('job/apply/data/{code}', [JobController::class, 'jobApplyData'])->name('job.apply.data')->middleware(['auth']);

Route::resource('job-application', JobApplicationController::class)->middleware(['auth']);
Route::post('job-application/order', [JobApplicationController::class, 'order'])->name('job.application.order')->middleware(['auth']);
Route::post('job-application/{id}/rating', [JobApplicationController::class, 'rating'])->name('job.application.rating')->middleware(['auth']);
Route::delete('job-application/{id}/archive', [JobApplicationController::class, 'archive'])->name('job.application.archive')->middleware(['auth']);
Route::post('job-application/{id}/skill/store', [JobApplicationController::class, 'addSkill'])->name('job.application.skill.store')->middleware(['auth']);
Route::post('job-application/{id}/note/store', [JobApplicationController::class, 'addNote'])->name('job.application.note.store')->middleware(['auth']);
Route::delete('job-application/{id}/note/destroy', [JobApplicationController::class, 'destroyNote'])->name('job.application.note.destroy')->middleware(['auth']);
Route::post('job-application/getByJob', [JobApplicationController::class, 'getByJob'])->name('get.job.application')->middleware(['auth']);
Route::get('job-onboard', [JobApplicationController::class, 'jobOnBoard'])->name('job.on.board')->middleware(['auth']);
Route::get('job-onboard/create/{id}', [JobApplicationController::class, 'jobBoardCreate'])->name('job.on.board.create')->middleware(['auth']);
Route::post('job-onboard/store/{id}', [JobApplicationController::class, 'jobBoardStore'])->name('job.on.board.store')->middleware(['auth']);
Route::get('job-onboard/edit/{id}', [JobApplicationController::class, 'jobBoardEdit'])->name('job.on.board.edit')->middleware(['auth']);
Route::post('job-onboard/update/{id}', [JobApplicationController::class, 'jobBoardUpdate'])->name('job.on.board.update')->middleware(['auth']);
Route::delete('job-onboard/delete/{id}', [JobApplicationController::class, 'jobBoardDelete'])->name('job.on.board.delete')->middleware(['auth']);
Route::get('job-onboard/convert/{id}', [JobApplicationController::class, 'jobBoardConvert'])->name('job.on.board.convert')->middleware(['auth']);
Route::post('job-onboard/convert/{id}', [JobApplicationController::class, 'jobBoardConvertData'])->name('job.on.board.convert')->middleware(['auth']);
Route::post('job-application/stage/change', [JobApplicationController::class, 'stageChange'])->name('job.application.stage.change')->middleware(['auth']);
Route::get('candidates-job-applications', [JobApplicationController::class, 'candidate'])->name('job.application.candidate')->middleware(['auth']);

Route::resource('custom-question', CustomQuestionController::class)->middleware(['auth']);
Route::resource('interview-schedule', InterviewScheduleController::class)->middleware(['auth']);

