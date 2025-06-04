<?php

use App\Models\Business;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


    Route::post('pos/take-away', function (Request $request) {

        // return $request->business_id;

        $business = Business::where('id', $request->business_id)->with('categories.products')->first();

        // return $business;
        return view('pos.take-away', ['business' => $business]);
    })->name('pos/take-away');


    Route::post('pos/delivery', function (Request $request) {

        $business = Business::where('id', $request->business_id)->with('categories.products')->first();

        return view('pos.delivery', ['business' => $business]);
    })->name('pos/delivery');


    Route::post('pos/tables', function (Request $request) {
        // return $request;
        $tables = Table::where('business_id', $request->business_id)->get();
        // $tables=Table::get();
        // return $tables;

        $business = Business::where('id', $request->business_id)->with('categories.products')->first();

        // return $business;
        // return $tables;
        return view('pos.tables', ['business' => $business, 'tables' => $tables]);
    })->name('tables');


    Route::post('pos/take-away/store', [OrderController::class, "store"])->name('api_take_away_store');
    Route::post('pos/table/store', [OrderController::class, "tablestore"])->name('pos/table/store');

    Route::post('pos/delivery/store', [OrderController::class, "deliveryStore"])->name('api_delivery_store');
