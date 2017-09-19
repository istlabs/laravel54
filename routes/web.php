<?php

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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('articles','ArticleController',['middleware' => 'auth']);
//216466 45730 33221 12113
/* Projuct crud ajax */
Route::get('productajaxCRUD', function (Request $request) {
	//print_R($request->session());
    $products = App\Product::all();
    return view('ajax.index')->with('products',$products);
});
Route::get('productajaxCRUD/{product_id?}',function($product_id){
    $product = App\Product::find($product_id);
    return response()->json($product);
});
Route::post('productajaxCRUD',function(Request $request){   
    $product = App\Product::create($request->input());
    return response()->json($product);
});
Route::put('productajaxCRUD/{product_id?}',function(Request $request,$product_id){
    $product = App\Product::find($product_id);
    $product->name = $request->name;
    $product->details = $request->details;
    $product->save();
    return response()->json($product);
});
Route::delete('productajaxCRUD/{product_id?}',function($product_id){
    $product = App\Product::destroy($product_id);
    return response()->json($product);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
