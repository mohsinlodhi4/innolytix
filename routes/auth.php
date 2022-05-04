<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
    App\Http\Controllers\DashboardController::class, 'index'
])->name('dashboard');

Route::resource('permissions', App\Http\Controllers\PermissionController::class);
Route::post('permissions/loadFromRouter', [App\Http\Controllers\PermissionController::class, 'LoadPermission'])->name('permissions.load-router');

Route::resource('roles', App\Http\Controllers\RoleController::class);

Route::get('profile', [App\Http\Controllers\UserController::class, 'showProfile'])->name('users.profile');
Route::patch('profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('users.updateProfile');

Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('attendances', App\Http\Controllers\AttendanceController::class);

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('generator_builder.index');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('generator_builder.field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('generator_builder.relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('generator_builder.generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('generator_builder.rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('generator_builder.from_file');


Route::resource('fileUploads', App\Http\Controllers\FileUploadController::class);

Route::resource('clients', App\Http\Controllers\ClientsController::class);

Route::resource('vendors', App\Http\Controllers\VendorController::class);

Route::resource('taxes', App\Http\Controllers\TaxController::class);


Route::resource('officeDetails', App\Http\Controllers\OfficeDetailsController::class);


Route::resource('quotations', App\Http\Controllers\QuotationsController::class);


Route::resource('quotationProducts', App\Http\Controllers\QuotationProductsController::class);


Route::resource('quotationProducts', App\Http\Controllers\QuotationProductsController::class);


Route::resource('jobOrders', App\Http\Controllers\JobOrderController::class);


Route::resource('banks', App\Http\Controllers\BanksController::class);


Route::resource('invoices', App\Http\Controllers\InvoicesController::class);


Route::resource('invoicesProducts', App\Http\Controllers\InvoicesProductsController::class);


Route::resource('transections', App\Http\Controllers\TransectionsController::class);


Route::resource('purchaseOrders', App\Http\Controllers\PurchaseOrderController::class);


Route::resource('purchaseorderproducts', App\Http\Controllers\PurchaseorderproductsController::class);


Route::resource('chartofaccounts', App\Http\Controllers\ChartofaccountsController::class);


Route::resource('ledgers', App\Http\Controllers\LedgersController::class);


Route::resource('reciptvouchers', App\Http\Controllers\ReciptvoucherController::class);


Route::resource('paymentvouchers', App\Http\Controllers\PaymentvoucherController::class);


Route::resource('generalvouchers', App\Http\Controllers\GeneralvoucherController::class);


Route::resource('accountsHeads', App\Http\Controllers\AccountsHeadController::class);

Route::get('trialbalance', [App\Http\Controllers\BalanceController::class, 'trialbalance'])->name('trialbalance');
