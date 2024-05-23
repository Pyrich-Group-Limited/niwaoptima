<?php

use App\Models\User;
use App\Http\Controllers\Brand;
use App\Http\Controllers\Minister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
//use App\Http\Controllers\EmailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\AllowanceController;
use App\Http\Controllers\BugStatusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SetSalaryController;
use App\Http\Controllers\TaskStageController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ESSPPaymentController;
use App\Http\Controllers\ProjectTaskController;
use App\Http\Controllers\TimeTrackerController;
use App\Http\Controllers\ZoomMeetingController;
use App\Http\Controllers\ProjectReportController;
use App\Http\Controllers\EmployerDocumentController;
use App\Http\Controllers\DocumentsCategoryController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\ServiceApplicationController;
use Modules\Accounting\Http\Controllers\ReportController;
use Modules\Accounting\Http\Controllers\ExpenseController;
use Modules\Accounting\Http\Controllers\PaymentController;
use Modules\EmployerManager\Http\Controllers\EmployerController;


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

//LARAVEL DEFAULT Auth::routes();
Auth::routes();
Route::group(['middleware' => ['auth']], function () {


    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/home/clock-in', [HomeController::class, 'clockIn'])->name('clock-in');
    Route::post('/home/clock-out', [HomeController::class, 'clockOut'])->name('clock-out');
    Route::get('/document/index', 'App\Http\Controllers\EmployerDocumentController@index')->name('document.index');
    Route::patch('/approve-document/{id}', [EmployerDocumentController::class, 'approveDocument'])
        ->name('approveDocument');
    Route::get('/inspection-notice/{id}', [EmployerDocumentController::class, 'inspectionNotice'])
        ->name('inspection.notice');
    Route::post('/inspection-send', [EmployerDocumentController::class, 'sendInspectionNotice'])
        ->name('inspection.send');

    // Start Document Manager
    Route::delete('/documents-category/{id}', 'App\Http\Controllers\DocumentsCategoryController@ajaxDestroy')->name('documents_category.ajax_destroy');
    Route::resource('documents_category', App\Http\Controllers\DocumentsCategoryController::class);
    Route::resource('documents_manager', App\Http\Controllers\DocumentsController::class);
    Route::get('documents_manager/assigned/to/users', [App\Http\Controllers\DocumentsController::class, 'documentsByUsers'])->name('documents_manager.documentsByUsers');
    Route::get('documents_manager/documents/audits/', [App\Http\Controllers\DocumentsController::class, 'documentsByAudits'])->name('documents_manager.audits');
    Route::get('documents_manager/documentVersions/{id}', [App\Http\Controllers\DocumentsController::class, 'documentVersions'])->name('documents.documentVersions.index');
    //Route::get('documents_manager/assignedToUser/index', [App\Http\Controllers\DocumentsController::class, 'viewDocumentsAssignedToUser'])->name('documents.assignedToUser');
    Route::post('documents_manager/assignToUsers', [App\Http\Controllers\DocumentsController::class, 'assignToUsers'])->name('documents.assignToUsers');
    Route::post('documents_manager/assignToRoles', [App\Http\Controllers\DocumentsController::class, 'assignToDepartments'])->name('documents.assignToRoles');
    Route::get('documents_manager/assignedUsers/{id}', [App\Http\Controllers\DocumentsController::class, 'assignedUsers'])->name('documents.assignedUsers');
    Route::get('documents_manager/assignedRoles/{id}', [App\Http\Controllers\DocumentsController::class, 'assignedDepartments'])->name('documents.assignedRoles');
    Route::delete('documents_manager/assignedUsers/delete/{user_id}/{document_id}', [App\Http\Controllers\DocumentsController::class, 'deleteAssignedUser'])->name('documents.assignedUsers.destroy');
    Route::delete('documents_manager/assignedRoles/delete/{role_id}/{document_id}', [App\Http\Controllers\DocumentsController::class, 'deleteAssignedRole'])->name('documents.assignedRoles.destroy');
    Route::get('documents_manager/delete/{id}', [App\Http\Controllers\DocumentsController::class, 'delete'])->name('documents_manager.delete');
    Route::post('documents_manager/add', [App\Http\Controllers\DocumentsController::class, 'add'])->name('documents_manager.add');
    Route::get('/documents_manager/version/{id}', 'App\Http\Controllers\DocumentsController@documentsVersion')->name('documents_manager.version');
    Route::get('/documents_manager/comment/{id}', 'App\Http\Controllers\DocumentsController@documentsComment')->name('documents_manager.comment');
    Route::post('documents_manager/add_comment', [App\Http\Controllers\DocumentsController::class, 'addComment'])->name('documents_manager.add_comment');
    Route::post('documents_manager/send_email', [App\Http\Controllers\DocumentsController::class, 'sendEmail'])->name('documents_manager.send_email');
    Route::get('/documents_manager/share/{id}', 'App\Http\Controllers\DocumentsController@shareDocument')->name('documents_manager.share');
    Route::post('documents_manager/shareuser', [App\Http\Controllers\DocumentsController::class, 'shareUser'])->name('documents_manager.shareuser');
    Route::post('documents_manager/sharerole', [App\Http\Controllers\DocumentsController::class, 'shareRole'])->name('documents_manager.sharerole');
    Route::get('/documents_manager/shared/user', 'App\Http\Controllers\DocumentsController@sharedUser')->name('documents_manager.shareduser');
    Route::get('/documents_manager/shared/role', 'App\Http\Controllers\DocumentsController@sharedRole')->name('documents_manager.sharedrole');

    Route::post('/generate-file-no', 'App\Http\Controllers\DocumentsCategoryController@generateFileNo');

    Route::get('/documents_manager/shared/user/file', 'App\Http\Controllers\DocumentsController@sharedUserFile')->name('documents_manager.shareduserfile');
    Route::post('documents_manager/shareuserfile', [App\Http\Controllers\DocumentsController::class, 'shareUserFile'])->name('documents_manager.shareuserfile');

    Route::post('/store-clicked-link', 'App\Http\Controllers\DocumentsController@storeClickedLink')->name('store_clicked_link');
    Route::get('/fetch-clicked-links', 'App\Http\Controllers\DocumentsController@fetchClickedLinks')->name('fetch_clicked_links');

    //End of document manager

    //Start of incoming documents
    Route::get('incoming_document_dashboard', [App\Http\Controllers\IncomingDocumentsController::class, 'dashboard'])->name('incoming_document_dashboard');
    Route::resource('incoming_documents_category', App\Http\Controllers\IncomingDocumentsCategoryController::class);
    Route::post('/generate-incoming-file-no', 'App\Http\Controllers\IncomingDocumentsCategoryController@generateFileNo');

    Route::resource('incoming_documents_manager', App\Http\Controllers\IncomingDocumentsController::class);
    Route::get('incoming_documents_manager/assigned/to/users', [App\Http\Controllers\IncomingDocumentsController::class, 'documentsByUsers'])->name('incoming_documents_manager.documentsByUsers');
    Route::get('incoming_documents_manager/documents/audits/', [App\Http\Controllers\IncomingDocumentsController::class, 'documentsByAudits'])->name('incoming_documents_manager.audits');
    Route::get('incoming_documents_manager/documentVersions/{id}', [App\Http\Controllers\IncomingDocumentsController::class, 'documentVersions'])->name('incoming_documents.documentVersions.index');
    //Route::get('incoming_documents_manager/assignedToUser/index', [App\Http\Controllers\IncomingDocumentsController::class, 'viewDocumentsAssignedToUser'])->name('incoming_documents.assignedToUser');
    Route::post('incoming_documents_manager/assignToUsers', [App\Http\Controllers\IncomingDocumentsController::class, 'assignToUsers'])->name('incoming_documents.assignToUsers');
    Route::post('incoming_documents_manager/assignToRoles', [App\Http\Controllers\IncomingDocumentsController::class, 'assignToDepartments'])->name('incoming_documents.assignToRoles');
    Route::get('incoming_documents_manager/assignedUsers/{id}', [App\Http\Controllers\IncomingDocumentsController::class, 'assignedUsers'])->name('incoming_documents.assignedUsers');
    Route::get('incoming_documents_manager/assignedRoles/{id}', [App\Http\Controllers\IncomingDocumentsController::class, 'assignedDepartments'])->name('incoming_documents.assignedRoles');
    Route::delete('incoming_documents_manager/assignedUsers/delete/{user_id}/{document_id}', [App\Http\Controllers\IncomingDocumentsController::class, 'deleteAssignedUser'])->name('incoming_documents.assignedUsers.destroy');
    Route::delete('incoming_documents_manager/assignedRoles/delete/{role_id}/{document_id}', [App\Http\Controllers\IncomingDocumentsController::class, 'deleteAssignedRole'])->name('incoming_documents.assignedRoles.destroy');
    Route::get('incoming_documents_manager/delete/{id}', [App\Http\Controllers\IncomingDocumentsController::class, 'delete'])->name('incoming_documents_manager.delete');
    Route::post('incoming_documents_manager/add', [App\Http\Controllers\IncomingDocumentsController::class, 'add'])->name('incoming_documents_manager.add');
    Route::get('/incoming_documents_manager/version/{id}', 'App\Http\Controllers\IncomingDocumentsController@documentsVersion')->name('incoming_documents_manager.version');
    Route::get('/incoming_documents_manager/comment/{id}', 'App\Http\Controllers\IncomingDocumentsController@documentsComment')->name('incoming_documents_manager.comment');
    Route::post('incoming_documents_manager/add_comment', [App\Http\Controllers\IncomingDocumentsController::class, 'addComment'])->name('incoming_documents_manager.add_comment');
    Route::post('incoming_documents_manager/send_email', [App\Http\Controllers\IncomingDocumentsController::class, 'sendEmail'])->name('incoming_documents_manager.send_email');
    Route::get('/incoming_documents_manager/share/{id}', 'App\Http\Controllers\IncomingDocumentsController@shareDocument')->name('incoming_documents_manager.share');
    Route::post('incoming_documents_manager/shareuser', [App\Http\Controllers\IncomingDocumentsController::class, 'shareUser'])->name('incoming_documents_manager.shareuser');
    Route::post('incoming_documents_manager/sharerole', [App\Http\Controllers\IncomingDocumentsController::class, 'shareRole'])->name('incoming_documents_manager.sharerole');
    Route::get('/incoming_documents_manager/shared/user', 'App\Http\Controllers\IncomingDocumentsController@sharedUser')->name('incoming_documents_manager.shareduser');
    Route::get('/incoming_documents_manager/shared/role', 'App\Http\Controllers\IncomingDocumentsController@sharedRole')->name('incoming_documents_manager.sharedrole');
    Route::get('/incoming_documents_manager/all_documents/secretary', 'App\Http\Controllers\IncomingDocumentsController@secretary')->name('incoming_documents_manager.all_documents.secretary');
    //Route::get('incoming_documents_manager/create', 'App\Http\Controllers\IncomingDocumentsController@create')->name('incoming_documents_manager.create');
    Route::get('/incoming_documents_manager/shared/user/file', 'App\Http\Controllers\IncomingDocumentsController@sharedUserFile')->name('incoming_documents_manager.shareduserfile');
    Route::post('incoming_documents_manager/shareuserfile', [App\Http\Controllers\IncomingDocumentsController::class, 'shareUserFile'])->name('incoming_documents_manager.shareuserfile');


    Route::resource('roles', RoleController::class);
    // demo admin role
    Route::get('demo_roles/{id}', 'App\Http\Controllers\RoleController@demo_edit')->name('demo_roles');
    Route::post('demo_update/{id}', 'App\Http\Controllers\RoleController@demo_update')->name('demo_update');

    Route::post('incoming_documents_manager/share_secretary', [App\Http\Controllers\IncomingDocumentsController::class, 'shareSecretary'])->name('incoming_documents_manager.share_secretary');

});

Route::get('/new/incoming', 'App\Http\Controllers\IncomingDocumentsController@add_document')->name('add.new.incoming.document');
Route::get('/area/office/incoming', 'App\Http\Controllers\IncomingDocumentsController@area_office_document')->name('area.office.incoming.document');

Route::post('/add/new/incoming/store/', 'App\Http\Controllers\IncomingDocumentsController@store')->name('incoming_store');

Route::get('/showDepartementalDocuments/{id}', 'App\Http\Controllers\DocumentsController@showDepartementalDocuments');
Route::get('/showIncomingDepartementalDocuments/{id}', 'App\Http\Controllers\IncomingDocumentsController@showIncomingDepartementalDocuments');

Route::get('/showDepartementalDocumentsAndBranch/{id}', 'App\Http\Controllers\DocumentsController@showDepartementalDocumentsAndBranch');
//Route::get('/showIncomingDepartementalDocumentsAndBranch/{id}', 'App\Http\Controllers\IncomingDocumentsController@showIncomingDepartementalDocumentsAndBranch');

Route::get('/showDepartementalDocumentsByUser/{id}', 'App\Http\Controllers\DocumentsController@showDepartementalDocumentsByUser');

//show all dta request for md
Route::get('/showDTAForMD/{did}/{bid}', 'Modules\DTARequests\Http\Controllers\DTARequestsController@showDTAForMD');

// Start of asset manager


// Route::get('thedocumentuser/{deptid}/{branchid}','App\Http\Controllers\DocumentsController@getusersbydept');
Route::get('thedocumentuser/', 'App\Http\Controllers\DocumentsController@getusersbydept');
Route::middleware(['auth'])->group(function () {
    Route::get('/asset/home', 'App\Http\Controllers\Home@index');
    Route::get('/brandlist', 'App\Http\Controllers\Brand@index');
    Route::get('/departmentlist', 'App\Http\Controllers\Department@index');
    Route::get('/assettypelist', 'App\Http\Controllers\AssetType@index');
    Route::get('/locationlist', 'App\Http\Controllers\Location@index');
    Route::get('/employeeslist', 'App\Http\Controllers\Employees@index');
    Route::get('/supplierlist', 'App\Http\Controllers\Supplier@index');
    Route::get('/userlist', 'App\Http\Controllers\User@index');
    Route::get('/settinglist', 'App\Http\Controllers\Settings@index');
    Route::get('/assetlist', 'App\Http\Controllers\Asset@index');
    Route::get('/assetlist/detail/{id}', 'App\Http\Controllers\Asset@detail');
    Route::get('/assetlist/generatelabel/{id}', 'App\Http\Controllers\Asset@generatelabel');
    Route::get('/componentlist', 'App\Http\Controllers\Component@index');
    Route::get('/componentlist/detail/{componentid}', 'App\Http\Controllers\Component@detail');
    Route::get('/maintenancelist', 'App\Http\Controllers\Maintenance@index');


    //report
    Route::get('/reports/assetactivity', 'App\Http\Controllers\Reports@assetactivity');
    Route::get('/reports/componentactivity', 'App\Http\Controllers\Reports@componentactivity');
    Route::get('/reports/maintenance', 'App\Http\Controllers\Reports@maintenance');
    Route::get('/reports/bytype', 'App\Http\Controllers\Reports@bytype');
    Route::get('/reports/bystatus', 'App\Http\Controllers\Reports@bystatus');
    Route::get('/reports/bylocation', 'App\Http\Controllers\Reports@bylocation');
    Route::get('/reports/bysupplier', 'App\Http\Controllers\Reports@bysupplier');
    Route::get('/reports/allreports', 'App\Http\Controllers\Reports@allreports');

    //Home API
    Route::get('home/totalbalance', 'App\Http\Controllers\Home@totalbalance');
    Route::get('home/assetbytype', 'App\Http\Controllers\Home@assetbytype');
    Route::get('home/assetbystatus', 'App\Http\Controllers\Home@assetbystatus');
    Route::get('home/recentassetactivity', 'App\Http\Controllers\Home@recentassetactivity');
    Route::get('home/recentcomponentactivity', 'App\Http\Controllers\Home@recentcomponentactivity');

    //Brand API
    Route::get('brand', 'App\Http\Controllers\Brand@getdata');
    Route::get('listbrand', 'App\Http\Controllers\Brand@getrows');
    Route::post('savebrand', 'App\Http\Controllers\Brand@save');
    Route::post('updatebrand', 'App\Http\Controllers\Brand@update');
    Route::post('deletebrand', 'App\Http\Controllers\Brand@delete');
    Route::post('brandbyid', 'App\Http\Controllers\Brand@byid');

    //Department API
    /* Route::get('department','App\Http\Controllers\Department@getdata');
Route::get('listdepartment','App\Http\Controllers\Department@getrows');
Route::post('savedepartment','App\Http\Controllers\Department@save');
Route::post('updatedepartment','App\Http\Controllers\Department@update');
Route::post('deletedepartment','App\Http\Controllers\Department@delete');
Route::post('departmentbyid','App\Http\Controllers\Department@byid'); */

    //Asset Type API
    Route::get('assettype', 'App\Http\Controllers\AssetType@getdata');
    Route::get('listassettype', 'App\Http\Controllers\AssetType@getrows');
    Route::post('saveassettype', 'App\Http\Controllers\AssetType@save');
    Route::post('updateassettype', 'App\Http\Controllers\AssetType@update');
    Route::post('deleteassettype', 'App\Http\Controllers\AssetType@delete');
    Route::post('assettypebyid', 'App\Http\Controllers\AssetType@byid');

    //Location API
    Route::get('location', 'App\Http\Controllers\Location@getdata');
    Route::get('listlocation', 'App\Http\Controllers\Location@getrows');
    Route::post('savelocation', 'App\Http\Controllers\Location@save');
    Route::post('updatelocation', 'App\Http\Controllers\Location@update');
    Route::post('deletelocation', 'App\Http\Controllers\Location@delete');
    Route::post('locationbyid', 'App\Http\Controllers\Location@byid');

    //Employees API
    Route::get('listemployees', 'App\Http\Controllers\UserController@getrows');
    /* Route::get('employees','App\Http\Controllers\Employees@getdata');
Route::get('listemployees','App\Http\Controllers\Employees@getrows');
Route::post('saveemployees','App\Http\Controllers\Employees@save');
Route::post('updateemployees','App\Http\Controllers\Employees@update');
Route::post('deleteemployees','App\Http\Controllers\Employees@delete');
Route::post('employeesbyid','App\Http\Controllers\Employees@byid'); */

    //Supplier API
    Route::get('supplier', 'App\Http\Controllers\Supplier@getdata');
    Route::get('listsupplier', 'App\Http\Controllers\Supplier@getrows');
    Route::post('savesupplier', 'App\Http\Controllers\Supplier@save');
    Route::post('updatesupplier', 'App\Http\Controllers\Supplier@update');
    Route::post('deletesupplier', 'App\Http\Controllers\Supplier@delete');
    Route::post('supplierbyid', 'App\Http\Controllers\Supplier@byid');



    //User API
    /* Route::get('user','App\Http\Controllers\User@getdata');
Route::get('listuser','App\Http\Controllers\User@getrows');
Route::post('saveuser','App\Http\Controllers\User@save');
Route::post('updateuser','App\Http\Controllers\User@update');
Route::post('deleteuser','App\Http\Controllers\User@delete');
Route::post('userbyid','App\Http\Controllers\User@byid'); */

    //Settings API
    /* Route::get('settings','App\Http\Controllers\Settings@getdata');
Route::post('updatesettings','App\Http\Controllers\Settings@update');
 */
    //Asset API
    Route::get('asset/data', 'App\Http\Controllers\Asset@getdata');
    Route::get('listasset', 'App\Http\Controllers\Asset@getrows');
    Route::post('saveasset', 'App\Http\Controllers\Asset@save');
    Route::post('updateasset', 'App\Http\Controllers\Asset@update');
    Route::post('deleteasset', 'App\Http\Controllers\Asset@delete');
    Route::post('assetbyid', 'App\Http\Controllers\Asset@byid');
    Route::post('savecheckout', 'App\Http\Controllers\Asset@savecheckout');
    Route::post('savecheckin', 'App\Http\Controllers\Asset@savecheckin');
    Route::post('historyassetbyid', 'App\Http\Controllers\Asset@historyassetbyid');
    Route::get('asset/generateproductcode', 'App\Http\Controllers\Asset@generateproductcode');


    //Component API
    Route::get('component', 'App\Http\Controllers\Component@getdata');
    Route::get('listcomponent', 'App\Http\Controllers\Component@getrows');
    Route::post('savecomponent', 'App\Http\Controllers\Component@save');
    Route::post('updatecomponent', 'App\Http\Controllers\Component@update');
    Route::post('deletecomponent', 'App\Http\Controllers\Component@delete');
    Route::post('savecheckoutcomponent', 'App\Http\Controllers\Component@savecheckout');
    Route::post('savecheckincomponent', 'App\Http\Controllers\Component@savecheckin');
    Route::post('componentbyid', 'App\Http\Controllers\Component@byid');
    Route::post('singlehistorycomponentbyid', 'App\Http\Controllers\Component@singlehistorycomponentbyid');
    Route::get('component/generateproductcode', 'App\Http\Controllers\Component@generateproductcode');
    Route::post('componentassetbyid', 'App\Http\Controllers\Component@assetsbyid');
    Route::post('historycomponentbyid', 'App\Http\Controllers\Component@historycomponentbyid');

    //Maintenance API
    Route::get('maintenance', 'App\Http\Controllers\Maintenance@getdata');
    Route::get('listmaintenance', 'App\Http\Controllers\Maintenance@getrows');
    Route::post('savemaintenance', 'App\Http\Controllers\Maintenance@save');
    Route::post('updatemaintenance', 'App\Http\Controllers\Maintenance@update');
    Route::post('deletemaintenance', 'App\Http\Controllers\Maintenance@delete');
    Route::post('maintenancebyid', 'App\Http\Controllers\Maintenance@byid');
    Route::post('maintenanceassetsbyid', 'App\Http\Controllers\Maintenance@assetsbyid');

    // Route::view('reminder','dms.reminder');
    // Route::view('createreminder','dms.createreminder');

    Route::resource('reminder', ReminderController::class);
    // Route::view('dash','dms.dashboard');
    Route::get('documentloginaudit', [ReminderController::class, 'loginaudit'])->name('loginaudit');


    Route::get('dash', [ReminderController::class, 'dashboard'])->name('dash');
    Route::get('full-calender', [EventController::class, 'index'])->name('get-calender');
    Route::post('full-calender/action', [EventController::class, 'action'])->name('save-caleder');
    //Report API
    Route::get('listassetactivityreport', 'App\Http\Controllers\Reports@getassetactivityreport');
    Route::get('listcomponentactivityreport', 'App\Http\Controllers\Reports@getcomponentactivityreport');
    Route::get('getdatabytypereport', 'App\Http\Controllers\Reports@getdatabytypereport');
    Route::get('getdatabystatusreport', 'App\Http\Controllers\Reports@getdatabystatusreport');
    Route::get('getdatabysupplierreport', 'App\Http\Controllers\Reports@getdatabysupplierreport');
    Route::get('getdatabylocationreport', 'App\Http\Controllers\Reports@getdatabylocationreport');
});
// End asset manager



Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')
    ->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')
    ->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')
    ->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')
    ->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')
    ->name('io_generator_builder_rollback');
Route::post('generator_builder/generate-from-file', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile')
    ->name('io_generator_builder_generate_from_file');

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/html_email', [UserController::class, 'html_email'])->name('html_email');

//Route::get('/webmail', [EmailController::class, 'index']);


Route::group(['middleware' => ['auth']], function () {

    Route::get('/financeadmin', [HomeController::class, 'financeadmin'])->name('financeadmin');
    Route::get('/claimsadmin', [HomeController::class, 'claimsadmin'])->name('claimsadmin');
    Route::get('/aocadmin', [HomeController::class, 'aoc'])->name('aocadmin');
    Route::get('/superadmin', [HomeController::class, 'superdash'])->name('superadmin');
    Route::resource('services', App\Http\Controllers\ServiceController::class);
    Route::resource('sub-services', App\Http\Controllers\SubServiceController::class);

    //area manager dashboard
    Route::get('/get-for-area-manager/{id}', 'App\Http\Controllers\HomeController@getForAreaManager')->name('getForAreaManager');
    Route::get('/get-for-md/{id}', 'App\Http\Controllers\HomeController@getForMD')->name('getForMD');
    Route::get('/get-services', 'App\Http\Controllers\ServiceController@getServices')->name('get.services');



    Route::get('thelist', [HomeController::class, 'getbranch']);

    // multiple deletion
    Route::delete('/delete-selected-application-fees', 'App\Http\Controllers\ApplicationFormFeeController@deleteSelectedItems')->name('delete.selected.application.fees');
    Route::delete('/delete-selected-document-uploads', 'App\Http\Controllers\DocumentUploadController@deleteSelectedItems')->name('delete.selected.document.uploads');
    Route::delete('/delete-selected-processing-types', 'App\Http\Controllers\ProcessingTypeController@deleteSelectedItems')->name('delete.selected.processing.types');
    Route::delete('/delete-selected-processing-fees', 'App\Http\Controllers\ProcessingFeeController@deleteSelectedItems')->name('delete.selected.processing.fees');
    Route::delete('/delete-selected-inspection-fees', 'App\Http\Controllers\InspectionFeeController@deleteSelectedItems')->name('delete.selected.inspection.fees');
    Route::delete('/delete-selected-monitoring-fees', 'App\Http\Controllers\MonitoringFeeController@deleteSelectedItems')->name('delete.selected.monitoring.fees');


    //Express setup
    Route::resource('application_form_fee', App\Http\Controllers\ApplicationFormFeeController::class);
    Route::resource('document_upload', App\Http\Controllers\DocumentUploadController::class);
    Route::resource('processing_type', App\Http\Controllers\ProcessingTypeController::class);
    Route::resource('processing_fee', App\Http\Controllers\ProcessingFeeController::class);
    Route::resource('inspection_fee', App\Http\Controllers\InspectionFeeController::class);
	Route::resource('monitoring_fee', App\Http\Controllers\MonitoringFeeController::class);
    Route::get('/services/{branch}/processing-types', 'App\Http\Controllers\ProcessingFeeController@getProcessingTypes');
    Route::get('/services/{branch}/get-services', 'App\Http\Controllers\ProcessingFeeController@getServices');
    Route::get('/subservice/{subservice}/subservice-types', 'App\Http\Controllers\EquipmentAndFeeController@getSubServiceTypes');
    Route::resource('registration_fee', App\Http\Controllers\RegistrationFeeController::class);
});

// Route::middleware(['auth', 'authuserbyrole'])->group(function(){
//     Route::get('/home', [HomeController::class, 'index'])->name('home');

// });
Route::middleware(['auth'])->group(function () {
    //Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/default_home', [HomeController::class, 'index'])->name('default_home');
    Route::get('/niwa/payments', [ESSPPaymentController::class, 'index'])->name('niwa.payments');
    Route::patch('/approve-payment/{id}', [ESSPPaymentController::class, 'approvePayment'])
        ->name('approvePayment');
    Route::patch('/reject-payment/{id}', [ESSPPaymentController::class, 'rejectPayment'])
        ->name('rejectPayment');
});

Route::get('totalrevenue', [HomeController::class, 'totalrevenue']);


Route::get('/roundcube-login', [HomeController::class, 'roundcubeLogin']);

Route::get('fiadmin', [HomeController::class, 'auditadmin'])->name('auditadmin');
Route::get('ictadmin', [HomeController::class, 'ictadmin'])->name('ict');
// Route::get('/hradmin', [HomeController::class, 'hradmin'])->name('hradmin');
Route::get('/financeadmin', [HomeController::class, 'financeadmin'])->name('financeadmin');
Route::get('/claimsadmin', [HomeController::class, 'claimsadmin'])->name('claimsadmin');
Route::get('/itmadmin', [HomeController::class, 'itmadmin'])->name('itmadmin');
Route::get('/complianceadmin', [HomeController::class, 'complianceadmin'])->name('complianceadmin');
Route::get('/hseadmin', [HomeController::class, 'hseadmin'])->name('hseadmin');
Route::get('/permsec', [HomeController::class, 'pamsec'])->name('permsec');
Route::get('/am', [HomeController::class, 'branch'])->name('bm');
Route::get('/region', [HomeController::class, 'regional'])->name('region');
Route::get('/ed_md', [HomeController::class, 'edfinance'])->name('ed_md');
Route::get('/ed_admin', [HomeController::class, 'edadmin'])->name('ed_admin');
Route::get('/engineering', [HomeController::class, 'engineering'])->name('engineering');
Route::get('/marineadmin', [HomeController::class, 'marineadmin'])->name('marineadmin');

Route::get('/riskadmin', [HomeController::class, 'riskadmin']);

Route::get('/aprd', [HomeController::class, 'aprd']);
Route::get('/fre', [HomeController::class, 'fre']);
Route::get('/copaffairs', [HomeController::class, 'copaffairs'])->name('copaffairs');
Route::get('legaladmin', [HomeController::class, 'legaladmin']);
Route::get('procurementadmin', [HomeController::class, 'procurementadmin']);

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/view-profile', [ProfileController::class, 'showProfile'])->name('view-profile');
Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile-update');


//Route::resource('users', UserController::class)->middleware('auth');
//Route::resource('roles', RoleController::class)->middleware('auth');
Route::post('api/fetch-locals', [DropdownController::class, 'fetchLocal']);


// Demo Mail UI Route
Route::get('/composemail', [HomeController::class, 'composeMail'])->name('compose_mail');
Route::get('/mailinbox', [HomeController::class, 'mailInbox'])->name('mail_inbox');
Route::get('/viewreplymail', [HomeController::class, 'viewReplyMail'])->name('view_reply_mail');


Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('myedit/{id}', [UserController::class, 'myedit'])->name('myedit');
    Route::put('myedit/{id}', [UserController::class, 'myupdate'])->name('myupdate');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('/minister', [HomeController::class, 'minister'])->name('minister');

    Route::get('users/{id}', 'UserController@show')->name('users.show');
    Route::get('certicate', [CertificateController::class, 'index'])->name('certicate');

    Route::get('/active', [UserController::class, 'getactive'])->name('active');
    Route::get('/pending', [UserController::class, 'getpending'])->name('pending');
    Route::post('/bulk_upload_now', [UserController::class, 'upload'])->name('bulk_upload_now');
    Route::get('/bulkUpload', [UserController::class, 'bulkUpload'])->name('bulkUpload');
    Route::get('change-email-password', [UserController::class, 'showChangePasswordForm'])->name('change.email.password.form');
    Route::post('change-email-password', [UserController::class, 'changePassword'])->name('change.email.password');
    Route::post('/save-signature', [UserController::class, 'saveSignature']);
    Route::get('/change-signature', [UserController::class, 'changeSignature'])->name('change.signature');
    Route::get('/assign_role', [UserController::class, 'assignRole'])->name('assign_role');

    // Ranks and levels added to user details
    Route::post('/rank_upload_now', [RankController::class, 'upload'])->name('rank_upload_now');
    Route::get('/rankUpload', [RankController::class, 'rankUpload'])->name('rankUpload');
    Route::get('/get-ranks', 'App\Http\Controllers\RankController@getRanks')->name('get.ranks');
});

// Route::get('/account', function () {
//     return view('accountdashboard');
// });
// Route::view('/md','md');
// Route::view('am','am');

Route::get('md_user', [HomeController::class, 'md'])->name('md_user');
Route::get('ta_dashboard', [HomeController::class, 'taDashboard'])->name('ta_dashboard');


Route::get('areamanager', [HomeController::class, 'areamanager'])->name('am');
Route::get('areamanager', [HomeController::class, 'areamanager'])->name('areamanager');
Route::get('s_dashboard', [HomeController::class, 'sDashboard'])->name('s_dashboard');
Route::get('gm_dashboard', [HomeController::class, 'gmDashboard'])->name('gm_dashboard');
Route::get('range_dashboard', [HomeController::class, 'rangeDashboard'])->name('range_dashboard');


//=================================== Zoom Meeting ======================================================================
Route::get('zoom', function () {
    return view('zoom-meeting.index');
})->name('zoom');
// // Route::resource('zoom-meeting', ZoomMeetingController::class)->middleware(['auth']);
// Route::any('/zoom-meeting/projects/select/{bid}', [ZoomMeetingController::class, 'projectwiseuser'])->name('zoom-meeting.projects.select');
// Route::get('zoom-meeting-calender', [ZoomMeetingController::class, 'calender'])->name('zoom-meeting.calender')->middleware(['auth']);

//=================================== Zoom Meeting ======================================================================
Route::resource('zoom-meeting', ZoomMeetingController::class)->middleware(['auth']);
Route::any('/zoom-meeting/projects/select/{bid}', [ZoomMeetingController::class, 'projectwiseuser'])->name('zoom-meeting.projects.select');
Route::get('zoom-meeting-calender', [ZoomMeetingController::class, 'calender'])->name('zoom-meeting.calender')->middleware(['auth']);




Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ],
    function () {
        Route::get('support/{id}/reply', [SupportController::class, 'reply'])->name('support.reply');
        Route::post('support/{id}/reply', [SupportController::class, 'replyAnswer'])->name('support.reply.answer');
        Route::get('support/grid', [SupportController::class, 'grid'])->name('support.grid');
        Route::resource('support', SupportController::class);
    }
);

Route::resource('setsalary', SetSalaryController::class)->middleware(['auth']);
Route::get('employee/salary/{eid}', [SetSalaryController::class, 'employeeBasicSalary'])->name('employee.basic.salary')->middleware(['auth']);
Route::post('employee/update/sallary/{id}', [SetSalaryController::class, 'employeeUpdateSalary'])->name('employee.salary.update')->middleware(['auth']);
Route::get('salary/employeeSalary', [SetSalaryController::class, 'employeeSalary'])->name('employeesalary')->middleware(['auth']);
Route::post('branch/employee/json', [UserController::class, 'employeeJson'])->name('branch.employee.json')->middleware(['auth']);

Route::resource('allowance', AllowanceController::class)->middleware(['auth']);
Route::get('allowances/create/{eid}', [AllowanceController::class, 'allowanceCreate'])->name('allowances.create')->middleware(['auth']);


Route::post('newuserstore', [UserController::class, 'store'])->name('newuser')->middleware(['auth']);
// Route::post('newuserstore',[UserController::class,'store'])->name('newuser')->middleware(['auth']);
//payslip

/* Route::resource('paysliptype', PayslipTypeController::class)->middleware(['auth']);
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
Route::resource('payslip', PaySlipController::class)->middleware(['auth']); */

Route::get('report/income-summary', [ReportController::class, 'incomeSummary'])->name('report.income.summary');
Route::get('report/expense-summary', [ReportController::class, 'expenseSummary'])->name('report.expense.summary');
Route::get('report/income-vs-expense-summary', [ReportController::class, 'incomeVsExpenseSummary'])->name('report.income.vs.expense.summary');
Route::get('report/tax-summary', [ReportController::class, 'taxSummary'])->name('report.tax.summary');
//    Route::get('report/profit-loss-summary', [ReportController::class, 'profitLossSummary'])->name('report.profit.loss.summary');
Route::get('report/invoice-summary', [ReportController::class, 'invoiceSummary'])->name('report.invoice.summary');
Route::get('report/bill-summary', [ReportController::class, 'billSummary'])->name('report.bill.summary');
Route::get('report/product-stock-report', [ReportController::class, 'productStock'])->name('report.product.stock.report');
Route::get('report/invoice-report', [ReportController::class, 'invoiceReport'])->name('report.invoice');
Route::get('report/account-statement-report', [ReportController::class, 'accountStatement'])->name('report.account.statement');
Route::get('report/balance-sheet', [ReportController::class, 'balanceSheet'])->name('report.balance.sheet');
Route::get('report/ledger', [ReportController::class, 'ledgerSummary'])->name('report.ledger');
Route::get('report/trial-balance', [ReportController::class, 'trialBalanceSummary'])->name('trial.balance');
Route::get('report/profit-loss', [ReportController::class, 'profitLoss'])->name('report.profit.loss');
Route::get('reports-monthly-cashflow', [ReportController::class, 'monthlyCashflow'])->name('report.monthly.cashflow');
Route::get('reports-quarterly-cashflow', [ReportController::class, 'quarterlyCashflow'])->name('report.quarterly.cashflow');
Route::post('export/trial-balance', [ReportController::class, 'trialBalanceExport'])->name('trial.balance.export');
Route::post('export/balance-sheet', [ReportController::class, 'balanceSheetExport'])->name('balance.sheet.export');
Route::post('print/balance-sheet', [ReportController::class, 'balanceSheetPrint'])->name('balance.sheet.print');
Route::post('print/trial-balance', [ReportController::class, 'trialBalancePrint'])->name('trial.balance.print');

// Email Templates
Route::get('email_template_lang/{id}/{lang?}', [EmailTemplateController::class, 'manageEmailLang'])->name('manage.email.language')->middleware(['auth']);
Route::any('email_template_store/{pid}', [EmailTemplateController::class, 'storeEmailLang'])->name('store.email.language')->middleware(['auth']);
Route::any('email_template_store', [EmailTemplateController::class, 'updateStatus'])->name('status.email.language')->middleware(['auth']);
Route::resource('email_template', EmailTemplateController::class)->middleware(['auth']);

// End Email Templates

//Botman side that i do match route
Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\BotmanController@handle')->name('botman');

Route::resource('equipmentAndFees', App\Http\Controllers\EquipmentAndFeeController::class)->middleware(['auth']);

Route::resource('serviceApplications', App\Http\Controllers\ServiceApplicationController::class);
Route::post('approve-document/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'approveOrDeclineDocument'])->name('application.approve.document');
Route::post('final-documents-approval/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'approveDocuments'])->name('application.final.documents.approval');
Route::post('application-fee-payment-approval/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'approveApplicationFee'])->name('application.fee.approval');
Route::post('processing-fee-payment-approval/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'approveProcessingFee'])->name('application.processingfee.approval');
Route::post('inspection-fee-payment-approval/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'approveInspectionFee'])->name('application.inspectionfee.approval');
Route::post('set-inspection-status/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'setInspectionStatus'])->name('application.inspection.status');
Route::post('application-equipment-invoice/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'generateEquipmentInvoice'])->name('application.equipmemt.invoice');
Route::post('equipment-fee-payment-approval/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'approveEquipmentFee'])->name('application.equipmentfee.approval');
Route::post('area-officer-approval/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'areaOfficerApproval'])->name('application.areaofficer.approval');
Route::post('hod-marine-approval/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'hodMarineApproval'])->name('application.hodmarine.approval');
Route::get('/map/{id}', 'App\Http\Controllers\ServiceApplicationController@showMap')->name('map.show');
Route::post('assign-permissions', [App\Http\Controllers\ServiceApplicationController::class, 'assignPermissions'])->name('assign.permissions');


//Area manager approve equipment and fees created for a client
Route::get('/service-application/{id}/approve', 'App\Http\Controllers\ServiceApplicationController@approveDemandNotice')->name('approve_demand_notice');


//Data tables
Route::post('/services-data-tables', 'App\Http\Controllers\ServiceController@servicesDataTable');


Route::resource('vendors', VendorController::class)->middleware(['auth']);
Route::group(['middleware' => 'auth'], function () {


    Route::get('createdocument', [DocumentController::class, 'ldmsCreate'])->name('document.create');
    Route::get('document/updateprofile', [DocumentController::class, 'ldmsUpdateProfile'])->name('document.updateprofile');



    Route::get('language-switch/{locale}', [HomeController::class, 'languageSwitch']);

    Route::post('/document/import', [DocumentController::class, 'import'])->name('document.import');

    Route::get('/document/ldms_create', [DocumentController::class, 'ldmsCreate'])->name('create.document');

    Route::post('/document/ldms_store', [DocumentController::class, 'ldmsStore'])->name('documents.stores');
    // Route::get('/document/ldms_edit/{id}', array("uses"=>'DocumentController@ldmsEdit'));
    Route::get('/document/ldms_edit/{id}', [DocumentController::class, 'ldmsEdit']);

    Route::post('/document/ldms_edit/ldms_update/{id}', [DocumentController::class, 'ldmsUpdate']);
    Route::get('/document/ldms_delete/{id}/{fileName}', [DocumentController::class, 'ldmsDelete']);
    Route::get('/document/ldms_alarm_date/{id}', [DocumentController::class, 'ldmsAlarmDate']);
    Route::post('/document/ldms_alarm_date/ldms_alarm_add', [DocumentController::class, 'ldmsAlarmAdd']);
    Route::get('/document/ldms_alarm_date/ldms_alarm_delete/{alarm}/{id}/{alarmList}', [DocumentController::class, 'ldmsAlarmDelete']);
    Route::get('/document/ldms_updateProfile', [DocumentController::class, 'ldmsUpdateProfile']);
    Route::post('/document/ldms_manageProfileUpdate', [DocumentController::class, 'ldmsManageProfileUpdate']);
    Route::post('/document/ldms_changePassword', [DocumentController::class, 'ldmsChangePassword']);
    Route::get('/document/ldms_expired_documents', [DocumentController::class, 'ldmsExpiredDocuments'])->name('expireddocument');
    Route::get('/document/ldms_close_to_be_expired_documents', [DocumentController::class, 'ldmsCloseToBeExpiredDocuments'])->name('closetobe');
    Route::get('/document/ldms_search', [DocumentController::class, 'ldmsSearch']);
    Route::get('/document/ldms_email_send', [DocumentController::class, 'ldmsEmailSend']);
    Route::get('general-settings', [HomeController::class, 'generalSetting'])->name('setting.general');
    Route::post('general-settingStore', [HomeController::class, 'generalSettingStore'])->name('setting.generalStore');
    Route::get('mail-settings', [HomeController::class, 'mailSetting'])->name('setting.mail');
    Route::post('mail-settingStore', [HomeController::class, 'mailSettingStore'])->name('setting.mailStore');
    Route::get('sms-settings', [HomeController::class, 'smsSetting'])->name('setting.sms');
    Route::post('sms-settingStore', [HomeController::class, 'smsSettingStore'])->name('setting.smsStore');
});

Route::group(['middleware' => ['auth',]], function () {

    Route::get('/role/ldms_role_search', [RoleController::class, 'ldmsRoleSearch']);
    Route::get('/user/ldms_user_search', [UserController::class, 'ldmsUserSearch']);
    Route::resource('role', RoleController::class);
    Route::get('/user/password', [UserController::class, 'userPass']);
    // Route::get('user/demo','UserController@demo');
    // Route::get('user/demo',[UserController::class,'demo']);
    Route::resource('user', UserController::class);

    // Route::get('user/create',[UserController::class,'create'])->name('user.create');
});


Route::middleware(['auth', 'twofactor'])->group(function () {
    Route::get('verify/resend', [App\Http\Controllers\TwoFactorController::class, 'resend'])->name('verify.resend');
    Route::resource('verify', App\Http\Controllers\TwoFactorController::class)->only(['index', 'store']);
});



// Client Module
Route::resource('clients', ClientController::class)->middleware(['auth']);

Route::any('client-reset-password/{id}', [ClientController::class, 'clientPassword'])->name('clients.reset');
Route::post('client-reset-password/{id}', [ClientController::class, 'clientPasswordReset'])->name('client.password.update');



// Milestone Module
Route::get('projects/{id}/milestone', [ProjectController::class, 'milestone'])->name('project.milestone')->middleware(['auth']);

//Route::delete(
//    '/projects/{id}/users/{uid}' [
//                                    'as' => 'projects.users.destroy',
//                                    'uses' => 'ProjectController@userDestroy',
//                                ]
//)->middleware(
//    [
//        'auth',
//        ,
//    ]
//);
Route::get('projects-view', [ProjectController::class, 'filterProjectView'])->name('filter.project.view')->middleware(['auth']);
Route::get('/project/copy/{id}', [ProjectController::class, 'copyproject'])->name('project.copy')->middleware(['auth']);
Route::post('/project/copy/store/{id}', [ProjectController::class, 'copyprojectstore'])->name('project.copy.store')->middleware(['auth']);

Route::post('projects/{id}/milestone', [ProjectController::class, 'milestoneStore'])->name('project.milestone.store')->middleware(['auth',]);
Route::get('projects/milestone/{id}/edit', [ProjectController::class, 'milestoneEdit'])->name('project.milestone.edit')->middleware(['auth',]);
Route::post('projects/milestone/{id}', [ProjectController::class, 'milestoneUpdate'])->name('project.milestone.update')->middleware(['auth',]);
Route::delete('projects/milestone/{id}', [ProjectController::class, 'milestoneDestroy'])->name('project.milestone.destroy')->middleware(['auth',]);
Route::get('projects/milestone/{id}/show', [ProjectController::class, 'milestoneShow'])->name('project.milestone.show')->middleware(['auth',]);

// End Milestone

// Project Module

Route::get('invite-project-member/{id}', [ProjectController::class, 'inviteMemberView'])->name('invite.project.member.view')->middleware(['auth']);
Route::post('invite-project-user-member', [ProjectController::class, 'inviteProjectUserMember'])->name('invite.project.user.member')->middleware(['auth',]);

Route::delete('projects/{id}/users/{uid}', [ProjectController::class, 'destroyProjectUser'])->name('projects.user.destroy')->middleware(['auth',]);
Route::get('project/{view?}', [ProjectController::class, 'index'])->name('projects.list')->middleware(['auth',]);
Route::get('projects-view', [ProjectController::class, 'filterProjectView'])->name('filter.project.view')->middleware(['auth',]);
Route::post('projects/{id}/store-stages/{slug}', [ProjectController::class, 'storeProjectTaskStages'])->name('project.stages.store')->middleware(['auth',]);


Route::patch('remove-user-from-project/{project_id}/{user_id}', [ProjectController::class, 'removeUserFromProject'])->name('remove.user.from.project')->middleware(['auth',]);
Route::get('projects-users', [ProjectController::class, 'loadUser'])->name('project.user')->middleware(['auth',]);
Route::get('projects/{id}/gantt/{duration?}', [ProjectController::class, 'gantt'])->name('projects.gantt')->middleware(['auth',]);
Route::post('projects/{id}/gantt', [ProjectController::class, 'ganttPost'])->name('projects.gantt.post')->middleware(['auth',]);


Route::resource('projects', ProjectController::class)->middleware(['auth',]);

// User Permission
Route::get('projects/{id}/user/{uid}/permission', [ProjectController::class, 'userPermission'])->name('projects.user.permission')->middleware(['auth',]);
Route::post('projects/{id}/user/{uid}/permission', [ProjectController::class, 'userPermissionStore'])->name('projects.user.permission.store')->middleware(['auth',]);

// End Project Module

// Task Module
Route::get('stage/{id}/tasks', [ProjectTaskController::class, 'getStageTasks'])->name('stage.tasks')->middleware(['auth',]);


Route::get('taskboard/{view?}', [ProjectTaskController::class, 'taskBoard'])->name('taskBoard.view')->middleware(['auth']);
Route::get('taskboard-view', [ProjectTaskController::class, 'taskboardView'])->name('project.taskboard.view')->middleware(['auth']);
// Project Task Module
Route::get('projects/time-tracker/{id}', [ProjectController::class, 'tracker'])->name('projecttime.tracker')->middleware(['auth']);
Route::get('/projects/{id}/task', [ProjectTaskController::class, 'index'])->name('projects.tasks.index')->middleware(['auth',]);
Route::get('/projects/{pid}/task/{sid}', [ProjectTaskController::class, 'create'])->name('projects.tasks.create')->middleware(['auth',]);
Route::post('/projects/{pid}/task/{sid}', [ProjectTaskController::class, 'store'])->name('projects.tasks.store')->middleware(['auth',]);
Route::get('/projects/{id}/task/{tid}/show', [ProjectTaskController::class, 'show'])->name('projects.tasks.show')->middleware(['auth',]);
Route::get('/projects/{id}/task/{tid}/edit', [ProjectTaskController::class, 'edit'])->name('projects.tasks.edit')->middleware(['auth',]);
Route::post('/projects/{id}/task/update/{tid}', [ProjectTaskController::class, 'update'])->name('projects.tasks.update')->middleware(['auth',]);
Route::delete('/projects/{id}/task/{tid}', [ProjectTaskController::class, 'destroy'])->name('projects.tasks.destroy')->middleware(['auth',]);
Route::patch('/projects/{id}/task/order', [ProjectTaskController::class, 'taskOrderUpdate'])->name('tasks.update.order')->middleware(['auth',]);
Route::patch('update-task-priority-color', [ProjectTaskController::class, 'updateTaskPriorityColor'])->name('update.task.priority.color')->middleware(['auth',]);


Route::post('/projects/{id}/comment/{tid}/file', [ProjectTaskController::class, 'commentStoreFile'])->name('comment.store.file')->middleware(['auth',]);
Route::delete('/projects/{id}/comment/{tid}/file/{fid}', [ProjectTaskController::class, 'commentDestroyFile'])->name('comment.destroy.file');
Route::post('/projects/{id}/comment/{tid}', [ProjectTaskController::class, 'commentStore'])->name('task.comment.store');
Route::delete('/projects/{id}/comment/{tid}/{cid}', [ProjectTaskController::class, 'commentDestroy'])->name('comment.destroy');
Route::post('/projects/{id}/checklist/{tid}', [ProjectTaskController::class, 'checklistStore'])->name('checklist.store');
Route::post('/projects/{id}/checklist/update/{cid}', [ProjectTaskController::class, 'checklistUpdate'])->name('checklist.update');
Route::delete('/projects/{id}/checklist/{cid}', [ProjectTaskController::class, 'checklistDestroy'])->name('checklist.destroy');
Route::post('/projects/{id}/change/{tid}/fav', [ProjectTaskController::class, 'changeFav'])->name('change.fav');
Route::post('/projects/{id}/change/{tid}/complete', [ProjectTaskController::class, 'changeCom'])->name('change.complete');
Route::post('/projects/{id}/change/{tid}/progress', [ProjectTaskController::class, 'changeProg'])->name('change.progress');
Route::get('/projects/task/{id}/get', [ProjectTaskController::class, 'taskGet'])->name('projects.tasks.get')->middleware(['auth']);
Route::get('/calendar/{id}/show', [ProjectTaskController::class, 'calendarShow'])->name('task.calendar.show')->middleware(['auth']);
Route::post('/calendar/{id}/drag', [ProjectTaskController::class, 'calendarDrag'])->name('task.calendar.drag');
Route::get('calendar/{task}/{pid?}', [ProjectTaskController::class, 'calendarView'])->name('task.calendar')->middleware(['auth']);

Route::resource('project-task-stages', TaskStageController::class)->middleware(['auth']);
Route::post('/project-task-stages/order', [TaskStageController::class, 'order'])->name('project-task-stages.order');

Route::post('project-task-new-stage', [TaskStageController::class, 'storingValue'])->name('new-task-stage')->middleware(['auth']);
// End Task Module

// Project Expense Module

// Project Expense Module
Route::get('/projects/{id}/expense', [ExpenseController::class, 'index'])->name('projects.expenses.index')->middleware(['auth']);
Route::get('/projects/{pid}/expense/create', [ExpenseController::class, 'create'])->name('projects.expenses.create')->middleware(['auth']);
Route::post('/projects/{pid}/expense/store', [ExpenseController::class, 'store'])->name('projects.expenses.store')->middleware(['auth']);
Route::get('/projects/{id}/expense/{eid}/edit', [ExpenseController::class, 'edit'])->name('projects.expenses.edit')->middleware(['auth']);
Route::post('/projects/{id}/expense/{eid}', [ExpenseController::class, 'update'])->name('projects.expenses.update')->middleware(['auth']);
Route::delete('/projects/{eid}/expense/', [ExpenseController::class, 'destroy'])->name('projects.expenses.destroy')->middleware(['auth']);
Route::get('/expense-list', [ExpenseController::class, 'expenseList'])->name('expense.list')->middleware(['auth']);




//=================================== Time-Tracker======================================================================
Route::post('stop-tracker', [DashboardController::class, 'stopTracker'])->name('stop.tracker')->middleware(['auth']);
Route::get('time-tracker', [TimeTrackerController::class, 'index'])->name('time.tracker')->middleware(['auth']);
Route::delete('tracker/{tid}/destroy', [TimeTrackerController::class, 'Destroy'])->name('tracker.destroy');
Route::post('tracker/image-view', [TimeTrackerController::class, 'getTrackerImages'])->name('tracker.image.view');
Route::delete('tracker/image-remove', [TimeTrackerController::class, 'removeTrackerImages'])->name('tracker.image.remove');
Route::get('projects/time-tracker/{id}', [ProjectController::class, 'tracker'])->name('projecttime.tracker')->middleware(['auth']);



Route::resource('/project_report', ProjectReportController::class)->middleware(['auth',]);
Route::post('/project_report_data', [ProjectReportController::class, 'ajax_data'])->name('projects.ajax')->middleware(['auth']);
Route::post('/project_report/tasks/{id}', [ProjectReportController::class, 'ajax_tasks_report'])->name('tasks.report.ajaxdata')->middleware(['auth']);
Route::get('export/task_report/{id}', [ProjectReportController::class, 'export'])->name('project_report.export');

Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ],
    function () {
        Route::resource('contractType', ContractTypeController::class);
    }
);

// Project Timesheet
Route::get('append-timesheet-task-html', [TimesheetController::class, 'appendTimesheetTaskHTML'])->name('append.timesheet.task.html')->middleware(['auth']);
Route::get('timesheet-table-view', [TimesheetController::class, 'filterTimesheetTableView'])->name('filter.timesheet.table.view')->middleware(['auth']);
Route::get('timesheet-view', [TimesheetController::class, 'filterTimesheetView'])->name('filter.timesheet.view')->middleware(['auth']);
Route::get('timesheet-list', [TimesheetController::class, 'timesheetList'])->name('timesheet.list')->middleware(['auth']);
Route::get('timesheet-list-get', [TimesheetController::class, 'timesheetListGet'])->name('timesheet.list.get')->middleware(['auth']);
Route::get('/project/{id}/timesheet', [TimesheetController::class, 'timesheetView'])->name('timesheet.index')->middleware(['auth']);
Route::get('/project/{id}/timesheet/create', [TimesheetController::class, 'timesheetCreate'])->name('timesheet.create')->middleware(['auth']);
Route::post('/project/timesheet', [TimesheetController::class, 'timesheetStore'])->name('timesheet.store')->middleware(['auth']);
Route::get('/project/timesheet/{project_id}/edit/{timesheet_id}', [TimesheetController::class, 'timesheetEdit'])->name('timesheet.edit')->middleware(['auth']);
Route::any('/project/timesheet/update/{timesheet_id}', [TimesheetController::class, 'timesheetUpdate'])->name('timesheet.update')->middleware(['auth']);

Route::delete('/project/timesheet/{timesheet_id}', [TimesheetController::class, 'timesheetDestroy'])->name('timesheet.destroy')->middleware(['auth']);




Route::group(
    [
        'middleware' => [
            'auth',

        ],
    ],
    function () {
        Route::resource('projectstages', ProjectstagesController::class);
        Route::post('/projectstages/order', [ProjectstagesController::class, 'order'])->name('projectstages.order')->middleware(['auth']);
        Route::post('projects/bug/kanban/order', [ProjectController::class, 'bugKanbanOrder'])->name('bug.kanban.order');
        Route::get('projects/{id}/bug/kanban', [ProjectController::class, 'bugKanban'])->name('task.bug.kanban');
        Route::get('projects/{id}/bug', [ProjectController::class, 'bug'])->name('task.bug');
        Route::get('projects/{id}/bug/create', [ProjectController::class, 'bugCreate'])->name('task.bug.create');
        Route::post('projects/{id}/bug/store', [ProjectController::class, 'bugStore'])->name('task.bug.store');
        Route::get('projects/{id}/bug/{bid}/edit', [ProjectController::class, 'bugEdit'])->name('task.bug.edit');
        Route::post('projects/{id}/bug/{bid}/update', [ProjectController::class, 'bugUpdate'])->name('task.bug.update');
        Route::delete('projects/{id}/bug/{bid}/destroy', [ProjectController::class, 'bugDestroy'])->name('task.bug.destroy');
        Route::get('projects/{id}/bug/{bid}/show', [ProjectController::class, 'bugShow'])->name('task.bug.show');
        Route::post('projects/{id}/bug/{bid}/comment', [ProjectController::class, 'bugCommentStore'])->name('bug.comment.store');
        Route::post('projects/bug/{bid}/file', [ProjectController::class, 'bugCommentStoreFile'])->name('bug.comment.file.store');
        Route::delete('projects/bug/comment/{id}', [ProjectController::class, 'bugCommentDestroy'])->name('bug.comment.destroy');
        Route::delete('projects/bug/file/{id}', [ProjectController::class, 'bugCommentDestroyFile'])->name('bug.comment.file.destroy');

        Route::resource('bugstatus', BugStatusController::class);
        Route::post('/bugstatus/order', [BugStatusController::class, 'order'])->name('bugstatus.order');
        Route::get('bugs-report/{view?}', [ProjectTaskController::class, 'allBugList'])->name('bugs.view')->middleware(['auth']);
    }
);



// Project Timesheet
Route::get('append-timesheet-task-html', [TimesheetController::class, 'appendTimesheetTaskHTML'])->name('append.timesheet.task.html')->middleware(['auth']);
Route::get('timesheet-table-view', [TimesheetController::class, 'filterTimesheetTableView'])->name('filter.timesheet.table.view')->middleware(['auth']);
Route::get('timesheet-view', [TimesheetController::class, 'filterTimesheetView'])->name('filter.timesheet.view')->middleware(['auth']);
Route::get('timesheet-list', [TimesheetController::class, 'timesheetList'])->name('timesheet.list')->middleware(['auth']);
Route::get('timesheet-list-get', [TimesheetController::class, 'timesheetListGet'])->name('timesheet.list.get')->middleware(['auth']);
Route::get('/project/{id}/timesheet', [TimesheetController::class, 'timesheetView'])->name('timesheet.index')->middleware(['auth']);
Route::get('/project/{id}/timesheet/create', [TimesheetController::class, 'timesheetCreate'])->name('timesheet.create')->middleware(['auth']);
Route::post('/project/timesheet', [TimesheetController::class, 'timesheetStore'])->name('timesheet.store')->middleware(['auth']);
Route::get('/project/timesheet/{project_id}/edit/{timesheet_id}', [TimesheetController::class, 'timesheetEdit'])->name('timesheet.edit')->middleware(['auth']);
Route::any('/project/timesheet/update/{timesheet_id}', [TimesheetController::class, 'timesheetUpdate'])->name('timesheet.update')->middleware(['auth']);

Route::delete('/project/timesheet/{timesheet_id}', [TimesheetController::class, 'timesheetDestroy'])->name('timesheet.destroy')->middleware(['auth']);

Route::get('showarea', [HomeController::class, 'showareaoffice'])->name('showarea');


Route::group(
    [
        'middleware' => [
            'auth',

        ],
    ],
    function () {
        Route::resource('projectstages', ProjectstagesController::class);
        Route::post('/projectstages/order', [ProjectstagesController::class, 'order'])->name('projectstages.order')->middleware(['auth']);
        Route::post('projects/bug/kanban/order', [ProjectController::class, 'bugKanbanOrder'])->name('bug.kanban.order');
        Route::get('projects/{id}/bug/kanban', [ProjectController::class, 'bugKanban'])->name('task.bug.kanban');
        Route::get('projects/{id}/bug', [ProjectController::class, 'bug'])->name('task.bug');
        Route::get('projects/{id}/bug/create', [ProjectController::class, 'bugCreate'])->name('task.bug.create');
        Route::post('projects/{id}/bug/store', [ProjectController::class, 'bugStore'])->name('task.bug.store');
        Route::get('projects/{id}/bug/{bid}/edit', [ProjectController::class, 'bugEdit'])->name('task.bug.edit');
        Route::post('projects/{id}/bug/{bid}/update', [ProjectController::class, 'bugUpdate'])->name('task.bug.update');
        Route::delete('projects/{id}/bug/{bid}/destroy', [ProjectController::class, 'bugDestroy'])->name('task.bug.destroy');
        Route::get('projects/{id}/bug/{bid}/show', [ProjectController::class, 'bugShow'])->name('task.bug.show');
        Route::post('projects/{id}/bug/{bid}/comment', [ProjectController::class, 'bugCommentStore'])->name('bug.comment.store');
        Route::post('projects/bug/{bid}/file', [ProjectController::class, 'bugCommentStoreFile'])->name('bug.comment.file.store');
        Route::delete('projects/bug/comment/{id}', [ProjectController::class, 'bugCommentDestroy'])->name('bug.comment.destroy');
        Route::delete('projects/bug/file/{id}', [ProjectController::class, 'bugCommentDestroyFile'])->name('bug.comment.file.destroy');

        Route::resource('bugstatus', BugStatusController::class);
        Route::post('/bugstatus/order', [BugStatusController::class, 'order'])->name('bugstatus.order');
        Route::get('bugs-report/{view?}', [ProjectTaskController::class, 'allBugList'])->name('bugs.view')->middleware(['auth']);
    }
);

// User_Todo Module

Route::post('/todo/create', [UserController::class, 'todo_store'])->name('todo.store')->middleware(['auth']);
Route::post('/todo/{id}/update', [UserController::class, 'todo_update'])->name('todo.update')->middleware(['auth']);
Route::delete('/todo/{id}', [UserController::class, 'todo_destroy'])->name('todo.destroy')->middleware(['auth']);
Route::get('/change/mode', [UserController::class, 'changeMode'])->name('change.mode')->middleware(['auth']);
Route::get('dashboard-view', [DashboardController::class, 'filterView'])->name('dashboard.view')->middleware(['auth']);
Route::get('dashboard', [DashboardController::class, 'clientView'])->name('client.dashboard.view')->middleware(['auth']);

Route::resource('bookings', App\Http\Controllers\BookingController::class);
Route::controller(BookingController::class)->group(function () {

    Route::post('uploadpayment', 'paymentupload')->name('uploadpay');

    Route::get('paymenthistory', 'paymenthistoryform')->name('payhistoryform')->middleware(['auth']);
});


Route::controller(PaymentController::class)->group(function () {
    Route::get('payhistory', 'paymenthistory')->middleware('auth')->name('payhistory');
    Route::get('payhistoryedit/{id}/theupda', 'paymenthistoryedit')->middleware('auth')->name('payhistoryedit');
    Route::post('payhistoryedit/{id}/', 'paymenthistoryupdate')->middleware('auth')->name('paymentupdate');

});


Route::get('serviceappupload', [ServiceApplicationController::class, 'uploadpage'])->middleware('auth')->name('serviceupload');
Route::get('servicemassuploadrecord', [ServiceApplicationController::class, 'showserviceupload'])->middleware('auth')->name('serviceappdata');
Route::post('saveupload', [ServiceApplicationController::class, 'serviceupload'])->middleware('auth')->name('servicestore');


Route::get('serviceapprecoredit/{id}', [ServiceApplicationController::class, 'modifymassuploadpage'])->middleware('auth')->name('serviceedit');
Route::post('serviceiapprecoreupdate/{id}', [ServiceApplicationController::class, 'updatemassservices'])->middleware('auth')->name('serviceeditiupdate');

Route::get('amplhistlist', [EmployerController::class, 'displayform'])->name('emplist')->middleware('auth');
Route::get('applicantlistmassrecord', [EmployerController::class, 'showmassemployers'])->name('showemplist')->middleware('auth');
Route::get('applicantrecordedit/{id}',[EmployerController::class,'editmassemployersrecord'])->name('editappli')->middleware('auth');
Route::post('applicantmassrecordupdate{id}',[EmployerController::class,'updatemassaplicantrecord'])->name('updateapp')->middleware('auth');

Route::post('amplhistsa', [EmployerController::class, 'storemass'])->name('emplistsa')->middleware('auth');

//download sample
Route::get('downloademployers', [EmployerController::class, 'downloademployersample'])->name('empldownload');
Route::get('downloadservice', [EmployerController::class, 'downloadservicesamples'])->name('savapdownload');
Route::get('downloadpay', [EmployerController::class, 'downloadpaymentsample'])->name('paydownload');

Route::get('viewapplicantrecord/{id}',[EmployerController::class,'viewapplicant'])->name('viewapplicant');

Route::post('saveapplicantrecord/{id}',[EmployerController::class,'saveapplicate'])->name('apsav');



Route::get('p2e',[HomeController::class,'p2e'])->name('p2e')->middleware(['auth']);
