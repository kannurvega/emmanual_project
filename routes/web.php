<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\db_controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', [HomeController::class, 'purchase_order'])->name('purchase_order');
Route::get('/', [HomeController::class, 'login'])->name('login');
Route::post('/check_login', [LoginController::class, 'check_login'])->name('check_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/run_query', [db_controller::class, 'run_query'])->name('run_query');
Route::post('/load_data', [db_controller::class, 'load_data'])->name('load_data');
Route::post('/fetch_sp_nd_tbl', [db_controller::class, 'fetch_sp_nd_tbl'])->name('fetch_sp_nd_tbl');
Route::middleware('check_user_session')->group(function () {

    Route::get('/backend_index', [HomeController::class, 'backend_index'])->name('backend_index');
    Route::get('/purchase_order/{id}/{typ}', [HomeController::class, 'purchase_order'])->name('purchase_order');
    Route::get('/subGroup/{id}/{typ}', [HomeController::class, 'subGroup'])->name('subGroup');
    Route::get('/batchGroup/{id}/{typ}', [HomeController::class, 'batchGroup'])->name('batchGroup');
    Route::post('/batch_nd_sub_grp_save', [DataController::class, 'batch_nd_sub_grp_save'])->name('batch_nd_sub_grp_save');
    Route::post('/fetch_table_view', [DataController::class, 'fetch_table_view'])->name('fetch_table_view');
    Route::post('/get_supplier_det', [DataController::class, 'get_supplier_det'])->name('get_supplier_det');
    Route::post('/fetch_product_details', [DataController::class, 'fetch_product_details'])->name('fetch_product_details');
    Route::post('/load_batch_group', [DataController::class, 'load_batch_group'])->name('load_batch_group');
    Route::post('/load_batch_sub_group', [DataController::class, 'load_batch_sub_group'])->name('load_batch_sub_group');
    Route::post('/load_purchase_order_list', [DataController::class, 'load_purchase_order_list'])->name('load_purchase_order_list');
    Route::post('/load_products_of_po', [DataController::class, 'load_products_of_po'])->name('load_products_of_po');
    Route::post('/load_po_header_det', [DataController::class, 'load_po_header_det'])->name('load_po_header_det');
    Route::post('/load_product_det', [DataController::class, 'load_product_det'])->name('load_product_det');
    Route::post('/load_branches', [DataController::class, 'load_branches'])->name('load_branches');
    Route::post('/load_brnch_split', [DataController::class, 'load_brnch_split'])->name('load_brnch_split');







    Route::post('/save_pu_header', [TransactionController::class, 'save_pu_header'])->name('save_pu_header');
    Route::post('/save_product_po', [TransactionController::class, 'save_product_po'])->name('save_product_po');
    Route::post('/save_branch_split_qty', [TransactionController::class, 'save_branch_split_qty'])->name('save_branch_split_qty');
    Route::post('/validate_po_order', [TransactionController::class, 'validate_po_order'])->name('validate_po_order');




});

