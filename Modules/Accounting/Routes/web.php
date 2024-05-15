<?php
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Modules\FormBuilder\Http\Controllers\FormBuilderController;
use Modules\Accounting\Http\Controllers\ChartOfAccountController;
use Modules\Accounting\Http\Controllers\ChartOfAccountTypeController;
use Modules\Accounting\Http\Controllers\ChartOfAccountSubTypeController;
use Modules\Accounting\Http\Controllers\BankAccountController;
use Modules\Accounting\Http\Controllers\BankTransferController;
use Modules\Accounting\Http\Controllers\ProposalController;
use Modules\Accounting\Http\Controllers\ProductServiceController;
use Modules\Accounting\Http\Controllers\ProductServiceCategoryController;
use Modules\Accounting\Http\Controllers\CustomFieldController;
use Modules\Accounting\Http\Controllers\TaxController;
use Modules\Accounting\Http\Controllers\InvoiceController;
use Modules\Accounting\Http\Controllers\RevenueController;
use Modules\Accounting\Http\Controllers\CreditNoteController;
use Modules\Accounting\Http\Controllers\BillController;
use Modules\Accounting\Http\Controllers\ExpenseController;
use Modules\Accounting\Http\Controllers\PaymentController;
use Modules\Accounting\Http\Controllers\DebitNoteController;
use Modules\Accounting\Http\Controllers\BudgetController;
use Modules\Accounting\Http\Controllers\GoalController;
use Modules\Accounting\Http\Controllers\JournalEntryController;
use Modules\Accounting\Http\Controllers\ReportController;
use Modules\Accounting\Http\Controllers\SystemController;
use Modules\Accounting\Http\Controllers\EmailTemplateController;


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

/* Route::prefix('accounting')->group(function() {
    Route::get('/', 'AccountingController@index');
}); */




Route::get('/accountadmin', [DashboardController::class, 'account_dashboard_index'])->name('dashboard')->middleware(['auth']);


Route::group(
    [
        'middleware' => [
            'auth',
            /* 'XSS',
            'revalidate', */
        ],
    ], function ()
{
    Route::resource('bank-account', BankAccountController::class);
}
);
Route::group(
    [
        'middleware' => [
            'auth',
           /*  'XSS',
            'revalidate', */
        ],
    ], function ()
{
    //Route::get('bank-transfer/index', [BankTransferController::class, 'index'])->name('bank-transfer.index');
    Route::resource('bank-transfer', BankTransferController::class);
}
);

Route::resource('custom-field', CustomFieldController::class)->middleware(['auth']);

Route::post('chart-of-account/subtype', [ChartOfAccountController::class, 'getSubType'])->name('charofAccount.subType')->middleware(['auth']);
//Route::post('chart-of-account/store', [ChartOfAccountController::class, 'getSubType'])->name('charofAccount.subType')->middleware(['auth']);


Route::resource('chart-of-account', ChartOfAccountController::class)->middleware(['auth']);
Route::resource('chart-of-account-type', ChartOfAccountTypeController::class)->middleware(['auth']);
Route::resource('chart-of-account-subtype', ChartOfAccountSubTypeController::class)->middleware(['auth']);

Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ], function (){
    Route::get('proposal/{id}/status/change', [ProposalController::class, 'statusChange'])->name('proposal.status.change');
    Route::get('proposal/{id}/convert', [ProposalController::class, 'convert'])->name('proposal.convert');
    Route::get('proposal/{id}/duplicate', [ProposalController::class, 'duplicate'])->name('proposal.duplicate');
    Route::post('proposal/product/destroy', [ProposalController::class, 'productDestroy'])->name('proposal.product.destroy');
    Route::post('proposal/customer', [ProposalController::class, 'customer'])->name('proposal.customer');
    Route::post('proposal/product', [ProposalController::class, 'product'])->name('proposal.product');
    Route::get('proposal/items', [ProposalController::class, 'items'])->name('proposal.items');
    Route::get('proposal/{id}/sent', [ProposalController::class, 'sent'])->name('proposal.sent');
    Route::get('proposal/{id}/resent', [ProposalController::class, 'resent'])->name('proposal.resent');
    Route::resource('proposal', ProposalController::class);
    // Route::get('proposal/create/{cid}', [ProposalController::class, 'create'])->name('proposal.create');

}
);



Route::get('/proposal/preview/{template}/{color}', [ProposalController::class, 'previewProposal'])->name('proposal.preview');

Route::post('/proposal/template/setting', [ProposalController::class, 'saveProposalTemplateSettings'])->name('proposal.template.setting');
Route::get('/customer/proposal/{id}/', [ProposalController::class, 'invoiceLink'])->name('proposal.link.copy');
Route::get('proposal/pdf/{id}', [ProposalController::class, 'proposal'])->name('proposal.pdf')->middleware(['auth']);
Route::get('export/proposal', [ProposalController::class, 'export'])->name('proposal.export');

Route::resource('product-category', ProductServiceCategoryController::class)->middleware(['auth']);
Route::resource('taxes', TaxController::class)->middleware(['auth']);
Route::resource('product-unit', ProductServiceUnitController::class)->middleware(['auth']);

Route::post('product-category/getaccount', [ProductServiceCategoryController::class, 'getAccount'])->name('productServiceCategory.getaccount')->middleware(['auth']);

Route::get('productservice/index', [ProductServiceController::class, 'index'])->name('productservice.index');
Route::get('productservice/{id}/detail', [ProductServiceController::class, 'warehouseDetail'])->name('productservice.detail');
Route::post('empty-cart', [ProductServiceController::class, 'emptyCart'])->middleware(['auth']);
Route::post('warehouse-empty-cart', [ProductServiceController::class, 'warehouseemptyCart'])->name('warehouse-empty-cart')->middleware(['auth']);
Route::resource('productservice', ProductServiceController::class)->middleware(['auth']);
Route::get('export/productservice', [ProductServiceController::class, 'export'])->name('productservice.export');
Route::get('import/productservice/file', [ProductServiceController::class, 'importFile'])->name('productservice.file.import');
Route::post('import/productservice', [ProductServiceController::class, 'import'])->name('productservice.import');
Route::get('product-categories', [ProductServiceCategoryController::class, 'getProductCategories'])->name('product.categories')->middleware(['auth']);
Route::get('add-to-cart/{id}/{session}', [ProductServiceController::class, 'addToCart'])->middleware(['auth']);
Route::patch('update-cart', [ProductServiceController::class, 'updateCart'])->middleware(['auth']);
Route::delete('remove-from-cart', [ProductServiceController::class, 'removeFromCart'])->middleware(['auth']);
Route::get('name-search-products', [ProductServiceCategoryController::class, 'searchProductsByName'])->name('name.search.products')->middleware(['auth']);
Route::get('search-products', [ProductServiceController::class, 'searchProducts'])->name('search.products')->middleware(['auth']);

Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ], function ()
{
    Route::get('invoice/{id}/duplicate', [InvoiceController::class, 'duplicate'])->name('invoice.duplicate');
    Route::get('invoice/{id}/shipping/print', [InvoiceController::class, 'shippingDisplay'])->name('invoice.shipping.print');
    Route::get('invoice/{id}/payment/reminder', [InvoiceController::class, 'paymentReminder'])->name('invoice.payment.reminder');
    Route::get('invoice/index', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::post('invoice/product/destroy', [InvoiceController::class, 'productDestroy'])->name('invoice.product.destroy');
    Route::post('invoice/product', [InvoiceController::class, 'product'])->name('invoice.product');
    Route::post('invoice/customer', [InvoiceController::class, 'customer'])->name('invoice.customer');
    Route::get('invoice/{id}/sent', [InvoiceController::class, 'sent'])->name('invoice.sent');
    Route::get('invoice/{id}/resent', [InvoiceController::class, 'resent'])->name('invoice.resent');
    Route::get('invoice/{id}/payment', [InvoiceController::class, 'payment'])->name('invoice.payment');
    Route::post('invoice/{id}/payment', [InvoiceController::class, 'createPayment'])->name('invoice.payment');
    Route::post('invoice/{id}/payment/{pid}/destroy', [InvoiceController::class, 'paymentDestroy'])->name('invoice.payment.destroy');
    Route::get('invoice/items', [InvoiceController::class, 'items'])->name('invoice.items');
    Route::resource('invoice', InvoiceController::class);
    Route::get('invoice/create/{cid}', [InvoiceController::class, 'create'])->name('invoice.create');
}
);


Route::get('/invoices/preview/{template}/{color}', [InvoiceController::class, 'previewInvoice'])->name('invoice.preview');
Route::post('/invoices/template/setting', [InvoiceController::class, 'saveTemplateSettings'])->name('template.setting');
Route::get('/customer/invoice/{id}/', [InvoiceController::class, 'invoiceLink'])->name('invoice.link.copy');

Route::group(
    [
        'middleware' => [
            'auth',/*
            'XSS',
            'revalidate', */
        ],
    ], function ()
{
    Route::get('credit-note', [CreditNoteController::class, 'index'])->name('credit.note');
    Route::get('custom-credit-note', [CreditNoteController::class, 'customCreate'])->name('invoice.custom.credit.note');
    Route::post('custom-credit-note', [CreditNoteController::class, 'customStore'])->name('invoice.custom.credit.note');
    Route::get('credit-note/invoice', [CreditNoteController::class, 'getinvoice'])->name('invoice.get');
    Route::get('invoice/{id}/credit-note', [CreditNoteController::class, 'create'])->name('invoice.credit.note');
    Route::post('invoice/{id}/credit-note', [CreditNoteController::class, 'store'])->name('invoice.credit.note');
    Route::get('invoice/{id}/credit-note/edit/{cn_id}', [CreditNoteController::class, 'edit'])->name('invoice.edit.credit.note');
    Route::post('invoice/{id}/credit-note/edit/{cn_id}', [CreditNoteController::class, 'update'])->name('invoice.edit.credit.note');
    Route::delete('invoice/{id}/credit-note/delete/{cn_id}', [CreditNoteController::class, 'destroy'])->name('invoice.delete.credit.note');
}
);

Route::get('revenue/index', [RevenueController::class, 'index'])->name('revenue.index')->middleware(['auth']);

Route::resource('revenue', RevenueController::class)->middleware(['auth']);

Route::get('invoice/pdf/{id}', [InvoiceController::class, 'invoice'])->name('invoice.pdf')->middleware(['auth']);


//--------------------------------------------------------Import/Export Data Route-----------------------------------------------------------------


Route::get('export/productservice', [ProductServiceController::class, 'export'])->name('productservice.export');
Route::get('import/productservice/file', [ProductServiceController::class, 'importFile'])->name('productservice.file.import');
Route::post('import/productservice', [ProductServiceController::class, 'import'])->name('productservice.import');
Route::get('export/invoice', [InvoiceController::class, 'export'])->name('invoice.export');
Route::get('export/proposal', [ProposalController::class, 'export'])->name('proposal.export');


Route::get('export/bill', [BillController::class, 'export'])->name('bill.export');
Route::get('/vender/bill/{id}/', [BillController::class, 'invoiceLink'])->name('bill.link.copy');
Route::get('bill/pdf/{id}', [BillController::class, 'bill'])->name('bill.pdf')->middleware(['auth']);
Route::get('/bill/preview/{template}/{color}', [BillController::class, 'previewBill'])->name('bill.preview')->middleware(['auth']);
Route::post('/bill/template/setting', [BillController::class, 'saveBillTemplateSettings'])->name('bill.template.setting');


Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ], function ()
{
    Route::get('bill/{id}/duplicate', [BillController::class, 'duplicate'])->name('bill.duplicate');
    Route::get('bill/{id}/shipping/print', [BillController::class, 'shippingDisplay'])->name('bill.shipping.print');
    Route::get('bill/index', [BillController::class, 'index'])->name('bill.index');
    Route::post('bill/product/destroy', [BillController::class, 'productDestroy'])->name('bill.product.destroy');
    Route::post('bill/product', [BillController::class, 'product'])->name('bill.product');
    Route::post('bill/vender', [BillController::class, 'vender'])->name('bill.vender');
    Route::get('bill/{id}/sent', [BillController::class, 'sent'])->name('bill.sent');
    Route::get('bill/{id}/resent', [BillController::class, 'resent'])->name('bill.resent');
    Route::get('bill/{id}/payment', [BillController::class, 'payment'])->name('bill.payment');
    Route::post('bill/{id}/payment', [BillController::class, 'createPayment'])->name('bill.payment');
    Route::post('bill/{id}/payment/{pid}/destroy', [BillController::class, 'paymentDestroy'])->name('bill.payment.destroy');
    Route::get('bill/items', [BillController::class, 'items'])->name('bill.items');
    Route::resource('bill', BillController::class);
    Route::get('bill/create/{cid}', [BillController::class, 'create'])->name('bill.create');
}
);

Route::get('/projects/{id}/expense', [ExpenseController::class, 'index'])->name('projects.expenses.index')->middleware(['auth']);
Route::get('/projects/{pid}/expense/create', [ExpenseController::class, 'create'])->name('projects.expenses.create')->middleware(['auth']);
Route::post('/projects/{pid}/expense/store', [ExpenseController::class, 'store'])->name('projects.expenses.store')->middleware(['auth']);
Route::get('/projects/{id}/expense/{eid}/edit', [ExpenseController::class, 'edit'])->name('projects.expenses.edit')->middleware(['auth']);
Route::post('/projects/{id}/expense/{eid}', [ExpenseController::class, 'update'])->name('projects.expenses.update')->middleware(['auth']);
Route::delete('/projects/{eid}/expense/', [ExpenseController::class, 'destroy'])->name('projects.expenses.destroy')->middleware(['auth']);
Route::get('/expense-list', [ExpenseController::class, 'expenseList'])->name('expense.list')->middleware(['auth']);
//Expense Module
Route::get('expense/pdf/{id}', [ExpenseController::class, 'expense'])->name('expense.pdf')->middleware(['auth']);
Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ], function () {
    Route::get('expense/index', [ExpenseController::class, 'index'])->name('expense.index');
    Route::any('expense/customer', [ExpenseController::class, 'customer'])->name('expense.customer');
    Route::post('expense/vender', [ExpenseController::class, 'vender'])->name('expense.vender');
    Route::post('expense/employee', [ExpenseController::class, 'employee'])->name('expense.employee');

    Route::post('expense/product/destroy', [ExpenseController::class, 'productDestroy'])->name('expense.product.destroy');

    Route::post('expense/product', [ExpenseController::class, 'product'])->name('expense.product');
    Route::get('expense/{id}/payment', [ExpenseController::class, 'payment'])->name('expense.payment');
    Route::get('expense/items', [ExpenseController::class, 'items'])->name('expense.items');

    Route::resource('expense', ExpenseController::class);
    Route::get('expense/create/{cid}', [ExpenseController::class, 'create'])->name('expense.create');

}
);
Route::resource('payments', PaymentController::class);
Route::resource('payment', PaymentController::class);

Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ], function ()
{
    Route::get('debit-note', [DebitNoteController::class, 'index'])->name('debit.note');
    Route::get('custom-debit-note', [DebitNoteController::class, 'customCreate'])->name('bill.custom.debit.note');
    Route::post('custom-debit-note', [DebitNoteController::class, 'customStore'])->name('bill.custom.debit.note');
    Route::get('debit-note/bill', [DebitNoteController::class, 'getbill'])->name('bill.get');
    Route::get('bill/{id}/debit-note', [DebitNoteController::class, 'create'])->name('bill.debit.note');
    Route::post('bill/{id}/debit-note', [DebitNoteController::class, 'store'])->name('bill.debit.note');
    Route::get('bill/{id}/debit-note/edit/{cn_id}', [DebitNoteController::class, 'edit'])->name('bill.edit.debit.note');
    Route::post('bill/{id}/debit-note/edit/{cn_id}', [DebitNoteController::class, 'update'])->name('bill.edit.debit.note');
    Route::delete('bill/{id}/debit-note/delete/{cn_id}', [DebitNoteController::class, 'destroy'])->name('bill.delete.debit.note');
}
);

Route::resource('budget', BudgetController::class)->middleware(['auth']);
Route::resource('goal', GoalController::class)->middleware(['auth']);

Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ], function (){

    Route::post('journal-entry/account/destroy', [JournalEntryController::class, 'accountDestroy'])->name('journal.account.destroy');
    Route::delete('journal-entry/journal/destroy/{item_id}', [JournalEntryController::class, 'journalDestroy'])->name('journal.destroy');

    Route::resource('journal-entry', JournalEntryController::class);

}
);
//Route::get('export/transaction', [TransactionController::class,'export'])->name('transaction.export');
Route::get('export/accountstatement', [ReportController::class,'export'])->name('accountstatement.export');
Route::get('export/productstock', [ReportController::class,'stock_export'])->name('productstock.export');
Route::get('export/payroll', [ReportController::class,'PayrollReportExport'])->name('payroll.export');
Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ], function ()
{
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

}
);

Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ], function ()
{
    Route::resource('systems', SystemController::class);
    Route::post('email-settings', [SystemController::class, 'saveEmailSettings'])->name('email.settings');
    Route::post('company-settings', [SystemController::class, 'saveCompanySettings'])->name('company.settings');
    Route::post('system-settings', [SystemController::class, 'saveSystemSettings'])->name('system.settings');
    Route::post('zoom-settings', [SystemController::class, 'saveZoomSettings'])->name('zoom.settings');
    Route::post('tracker-settings', [SystemController::class, 'saveTrackerSettings'])->name('tracker.settings');
    Route::post('slack-settings', [SystemController::class, 'saveSlackSettings'])->name('slack.settings');
    Route::post('telegram-settings', [SystemController::class, 'saveTelegramSettings'])->name('telegram.settings');
    Route::post('twilio-settings', [SystemController::class, 'saveTwilioSettings'])->name('twilio.setting');
    Route::get('print-setting', [SystemController::class, 'printIndex'])->name('print.setting');
    Route::get('settings', [SystemController::class, 'companyIndex'])->name('settings');
    Route::post('business-setting', [SystemController::class, 'saveBusinessSettings'])->name('business.setting');
    Route::post('company-payment-setting', [SystemController::class, 'saveCompanyPaymentSettings'])->name('company.payment.settings');

    Route::get('test-mail', [SystemController::class, 'testMail'])->name('test.mail');
    Route::post('test-mail', [SystemController::class, 'testMail'])->name('test.mail');
    Route::post('test-mail/send', [SystemController::class, 'testSendMail'])->name('test.send.mail');

    Route::post('stripe-settings', [SystemController::class, 'savePaymentSettings'])->name('payment.settings');
    Route::post('pusher-setting', [SystemController::class, 'savePusherSettings'])->name('pusher.setting');
    Route::post('recaptcha-settings', [SystemController::class, 'recaptchaSettingStore'])->name('recaptcha.settings.store')->middleware(['auth']);
    Route::post('seo-settings', [SystemController::class, 'seoSettings'])->name('seo.settings.store')->middleware(['auth']);

    Route::get('webhook-settings/create', [SystemController::class, 'webhookCreate'])->name('webhook.create')->middleware(['auth']);
    Route::post('webhook-settings/store', [SystemController::class, 'webhookStore'])->name('webhook.store');
    Route::get('webhook-settings/{wid}/edit', [SystemController::class, 'webhookEdit'])->name('webhook.edit')->middleware(['auth']);
    Route::post('webhook-settings/{wid}/edit', [SystemController::class, 'webhookUpdate'])->name('webhook.update')->middleware(['auth']);
    Route::delete('webhook-settings/{wid}', [SystemController::class, 'webhookDestroy'])->name('webhook.destroy')->middleware(['auth']);

    Route::post('cookie-setting', [SystemController::class, 'saveCookieSettings'])->name('cookie.setting');

    Route::post('cache-settings', [SystemController::class, 'cacheSettingStore'])->name('cache.settings.store')->middleware(['auth']);


}
);
//Route::post('export/payslip', [PaySlipController::class,'export'])->name('payslip.export');

Route::post('storage-settings', [SystemController::class, 'storageSettingStore'])->name('storage.setting.store')->middleware(['auth']);
Route::post('setting/offerlatter/{lang?}', [SystemController::class, 'offerletterupdate'])->name('offerlatter.update');
Route::get('setting/offerlatter', [SystemController::class, 'companyIndex'])->name('get.offerlatter.language');
Route::post('setting/joiningletter/{lang?}', [SystemController::class, 'joiningletterupdate'])->name('joiningletter.update');
Route::get('setting/joiningletter/', [SystemController::class, 'companyIndex'])->name('get.joiningletter.language');
Route::post('setting/exp/{lang?}', [SystemController::class, 'experienceCertificateupdate'])->name('experiencecertificate.update');
Route::get('setting/exp', [SystemController::class, 'companyIndex'])->name('get.experiencecertificate.language');
Route::post('setting/noc/{lang?}', [SystemController::class, 'NOCupdate'])->name('noc.update');
Route::get('setting/noc', [SystemController::class, 'companyIndex'])->name('get.noc.language');
Route::post('setting/google-calender',[SystemController::class,'saveGoogleCalenderSettings'])->name('google.calender.settings');
Route::get('pos-print-setting', [SystemController::class, 'posPrintIndex'])->name('pos.print.setting')->middleware(['auth']);
Route::post('system-settings/note', [SystemController::class, 'footerNoteStore'])->name('system.settings.footernote')->middleware(['auth']);
Route::post('chatgpt-settings', [SystemController::class, 'chatgptSetting'])->name('chatgpt.settings');
Route::get('create/ip', [SystemController::class, 'createIp'])->name('create.ip')->middleware(['auth']);
Route::post('create/ip', [SystemController::class, 'storeIp'])->name('store.ip')->middleware(['auth']);
Route::get('edit/ip/{id}', [SystemController::class, 'editIp'])->name('edit.ip')->middleware(['auth']);
Route::post('edit/ip/{id}', [SystemController::class, 'updateIp'])->name('update.ip')->middleware(['auth']);
Route::delete('destroy/ip/{id}', [SystemController::class, 'destroyIp'])->name('destroy.ip')->middleware(['auth']);

Route::get('email_template_lang/{id}/{lang?}', [EmailTemplateController::class, 'manageEmailLang'])->name('manage.email.language')->middleware(['auth']);
Route::any('email_template_store/{pid}', [EmailTemplateController::class, 'storeEmailLang'])->name('store.email.language')->middleware(['auth']);
Route::any('email_template_store', [EmailTemplateController::class, 'updateStatus'])->name('status.email.language')->middleware(['auth']);
Route::resource('email_template', EmailTemplateController::class)->middleware(['auth']);
