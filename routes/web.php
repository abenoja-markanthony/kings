

<?php
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
Auth::routes(); 

Route::get('/tables', function () {
    $tables = DB::select('SHOW TABLES'); // returns an array of stdObjects
dd($tables);
});


Route::get('/rename', 'HomeController@rename')->name('rename');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/change-pass', 'HomeController@changepass')->name('change-pass');
Route::put('/edit-pass', 'HomeController@updatepass')->name('edit-pass');

//EXPENSES
Route::get('/search-expenses', 'ExpensesController@search')->name('search-expenses');
Route::resource('expenses', 'ExpensesController');
Route::post('/expenses', 'ExpensesController@store')->name('expenses.store')->middleware('AddExpenseMiddleware');
 
//EMPLOYEE
Route::resource('employee', 'EmployeeController');
//STAFF
Route::resource('staff', 'StaffsController');
//ITEM
Route::resource('item', 'ItemController');

//PAYROLL
Route::get('/attendance', 'AttendanceController@index')->name('attendance.index');
Route::get('/attendance/create', 'AttendanceController@create')->name('attendance.create');
Route::get('/attendance/report/', 'AttendanceController@report')->name('attendance.report');
Route::get('/attendance/list/', 'AttendanceController@list')->name('attendance.list');
Route::post('/attendance/destroy', 'AttendanceController@destroy')->name('attendance.destroy');
Route::post('/attendance', 'AttendanceController@store')->name('attendance.store');

//DAILY CASH BALANCING
Route::get('/daily-cash-acceptance/{date_encoded}/accept', 'dcbController@accept')->name('daily-cash-acceptance');
Route::post('/dcb', 'dcbController@store')->name('accept-dcb');
Route::get('/dcb/filter', 'dcbController@accept')->name('filter-dcb');

//REPORT 
Route::get('/report/dcb', 'ReportController@DailySales')->name('report-dcb');
Route::get('/report', 'ReportController@index')->name('report');
Route::get('/daily-sales-report/{date_of_sale}', 'ReportController@report')->name('daily-sales-report');
Route::get('/gen-station-expenses-report', 'ReportController@gen_station_expenses')->name('gen-station-expenses-report');
Route::get('/gen-monthly-sales-report', 'ReportController@gen_monthly_sales')->name('gen-monthly-sales-report');
Route::get('/gen-gm-exp', 'ReportController@gm_exp')->name('gen-gm-exp');
Route::get('/monthly-exp-summary', 'ReportController@gen_monthly_exp_sum')->name('monthly-exp-summary');

// Route::get('/gen-monthly-report1', 'ReportController@monthly_report1')->name('gen-monthly-report1');
Route::get('/gen-monthly-report2', 'ReportController@monthly_report2')->name('gen-monthly-report2');
Route::get('/gen-monthly-report4', 'PDFReport@monthly_report4')->name('gen-monthly-report4');

//PDF
Route::get('/pdf', 'PDFReport@generate');
Route::get('/PDF-daily-report', 'PDFReport@PDF_DAILY')->name('PDF-daily-report');
Route::get('/PDF-pre-collect-report', 'PDFReport@pre_collect')->name('PDF-pre-collect-report');
Route::get('/PDF-dcb-report', 'PDFReport@DCB_REPORT')->name('PDF-dcb-report');
Route::get('/PDF-station-expenses', 'PDFReport@station_expenses')->name('PDF-station-expenses');
Route::get('/PDF-monthly-report', 'PDFReport@monthly_report')->name('PDF-monthly-report');
Route::get('/PDF-manager-exp-report', 'PDFReport@manager_exp')->name('PDF-manager-exp-report');
Route::get('/gen-monthly-report4', 'PDFReport@monthly_report4')->name('gen-monthly-report4');

//SALES
Route::get('/daily-sales', 'SalesController@index')->name('daily-sales');
Route::get('/search-daily-sales', 'SalesController@index')->name('search-daily-sales');
Route::post('/add-sales-date', 'SalesController@store')->name('add-sales-date')->middleware('AddSalesDate');
Route::get('/daily-sales/{date_of_sale}/edit', 'SalesController@edit')->name('edit-daily-sales');
Route::put('/daily-sales1/{id}', 'SalesController@update')->name('update-daily-sales');//->middleware('CheckSalesInput');
Route::get('/daily-sales-acceptance/{date_of_sale}/edit', 'SalesController@accept')->name('accept-daily-sales');
Route::post('/accept-daily-report', 'SalesController@AcceptDR')->name('accept-daily-report');

// PCSO REPORTS
Route::get('/PCSO/pre-sales', 'PCSOController@index')->name('pcso-pre-sales');
Route::get('/pcso-search-pre-sales', 'PCSOController@index')->name('pcso-search-pre-sales');
Route::post('/pcso-add-sales-date', 'PCSOController@store')->name('pcso-add-sales-date')->middleware('pcsoAddSales');
Route::get('/pcso-pre-sales/{date_of_sale}/edit', 'PCSOController@edit')->name('edit-daily-sales');
Route::get('/pcso-pre-sales/{date_of_sale}/pcso', 'PCSOController@pcso')->name('pcso-daily-sales');
Route::put('/pcso-pre-sales/{date_of_sale}/update', 'PCSOController@update')->name('pcso-pre-sales-update');
Route::get('/pcso-sales-assump', 'PCSOController@assumption')->name('pcso-sales-assump');
Route::post('/pcso-store-assump', 'PCSOController@assump_store')->name('pcso.assump-store');


//DCB
Route::get('/daily-cash-balance', 'SalesController@dcb')->name('daily-cash-balance');
Route::get('/search-dcb', 'SalesController@dcb')->name('search-dcb');

//ADDITIONAL RECEIPT
Route::post('/store-addtional-receipt', 'AdditionalReceiptController@store')->name('store-addtional-receipt');
Route::get('/addtional-receipt/{id}/{date_of_receipt}/delete', 'AdditionalReceiptController@destroy')->name('delete-addtional-receipt');

//PRESALE
Route::get('/daily-pre-sales/{date_of_sale}/edit', 'PreSaleController@edit')->name('edit-pre-sales');
Route::put('/daily-pre-sales/{date_of_sale}/update', 'PreSaleController@update')->name('update-pre-sales');
Route::get('/daily-pre-sales/{date_of_sale}/report', 'PreSaleController@report')->name('report-pre-sales');

// DB BACKUP / RESTORE
Route::get('/restore-backup', 'BackupController@index')->name('restore-backup');
Route::post('/backup-sql', 'BackupController@backup')->name('backup-sql');
Route::post('/restore-sql', 'BackupController@restore')->name('restore-sql');


// ADMIN AUDIT
Route::get('/admin-audit', 'AuditController@index')->name('admin-audit');
Route::get('/audit-report', 'AuditController@audit_report')->name('audit-report');
 

