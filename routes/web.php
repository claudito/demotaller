<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
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


Route::get('demo',function(){


	return view('demo');


});


Route::post('importar',function(Request $request){


	//return 'importación spaces';

	//dd( $request->file('archivo') );
	$fecha = Carbon::now();
	$name  = $request->file('archivo')->getClientOriginalName();
	$name  = md5($fecha.$name. rand() );

	$extension = $request->file('archivo')->extension();

	$name = $name.'.'.$extension;

	$path = Storage::disk('spaces')->putFileAs(

    	'archivos', 
    	 $request->file('archivo'),
    	  $name,
    	  'public'

	);

	dd( env('DO_SPACES_URL').'/'.$path );


})->name('importar');