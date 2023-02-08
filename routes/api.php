<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// this is the api for customer table

Route::post('create-customer', [App\Http\Controllers\FoodController::class, 'create']);
Route::put('update-customer', [App\Http\Controllers\FoodController::class, 'update']);
Route::get('get-customer', [App\Http\Controllers\FoodController::class, 'get']);
Route::get('getall-customer', [App\Http\Controllers\FoodController::class, 'getALL']);
Route::delete('delete-customer', [App\Http\Controllers\FoodController::class, 'delete']);

//this is the api for delivery route.
Route::post('create-delivery', [App\Http\Controllers\FoodController::class, 'create_Delivery']);
Route::put('update-delivery', [App\Http\Controllers\FoodController::class, 'update_Delivery']);
Route::get('get-table-delivery', [App\Http\Controllers\FoodController::class, 'get_table_delivery']);
Route::delete('delete-delivery', [App\Http\Controllers\FoodController::class, 'delete_delivery']);
Route::get('get_all', [App\Http\Controllers\FoodController::class, 'get_all']);


//this is route for food_product api route
Route::post('create-food-product', [App\Http\Controllers\FoodController::class, 'create_food_product']);
Route::put('update-food-product', [App\Http\Controllers\FoodController::class, 'update_food_product']);
Route::get('get-food-product', [App\Http\Controllers\FoodController::class, 'get_food_product']);
Route::delete('delete-food-product', [App\Http\Controllers\FoodController::class, 'delete_food_product']);
Route::get('getAll_food_product', [App\Http\Controllers\FoodController::class, 'getAll_food_product']);


//this is the route for the api food supply
Route::post('create-food-supply', [App\Http\Controllers\FoodController::class, 'create_food_supply']);
Route::put('update-food-supply', [App\Http\Controllers\FoodController::class, 'update_food_supply']);
Route::get('get-food-supply', [App\Http\Controllers\FoodController::class, 'get_food_supply']);
Route::delete('delete-food-supply', [App\Http\Controllers\FoodController::class, 'delete_food_supply']);
Route::get('getAll_food_supply', [App\Http\Controllers\FoodController::class, 'getAll_food_supply']);


//this is th route for order details
Route::post('create-order-details', [App\Http\Controllers\FoodController::class, 'create_order_details']);
Route::put('update-order-details', [App\Http\Controllers\FoodController::class, 'update_order_details']);
Route::get('get-order-details', [App\Http\Controllers\FoodController::class, 'get_order_details']);
Route::delete('delete-order-details', [App\Http\Controllers\FoodController::class, 'delete_order_details']);
Route::get('getAll_order_details', [App\Http\Controllers\FoodController::class, 'getAll_order_details']);


//ths is the api route for transaction reports

Route::post('create-transaction-reports', [App\Http\Controllers\FoodController::class, 'create_transaction_reports']);
Route::put('update-transaction-reports', [App\Http\Controllers\FoodController::class, 'update_transaction_reports']);
Route::get('get-transaction-reports', [App\Http\Controllers\FoodController::class, 'get_transaction_reports']);
Route::delete('delete-transaction-reports', [App\Http\Controllers\FoodController::class, 'delete_transaction_reports']);
Route::get('getAll_transaction_reports', [App\Http\Controllers\FoodController::class, 'getAll_transaction_reports']);
