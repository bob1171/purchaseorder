<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('form');
});



Route::post('/purchaseorder', function (Request $request) {


    $quantities = [];
    $items = [];
    $prices = [];

    foreach ($request->all() as $key => $value) {

        //echo $key . ': ' . $value . '<br/>';

        if (substr($key, 0, 1) == 'q') {
            array_push($quantities, $value);
        }
        if (substr($key, 0, 1) == 'i') {
            array_push($items, $value);
        }
        if (substr($key, 0, 1) == 'p') {
            array_push($prices, $value);
        }
    }

    $total = 0;
    foreach ($prices as $key => $value) 
        $total += $value * $quantities[$key];
    
    $quantities = array_pad($quantities, 12, '');
    $items = array_pad($items, 12, '');
    $prices = array_pad($prices, 12, '');
    $company = $request->input('company');
    $type = $request->input('type');
    $date = date('m/d/Y');
    $department = $request->input('department');
    $school = $request->input('school');
    


    return view('purchaseorder', 
    [
        'quantities'=> $quantities, 
        'items'=> $items,
        'prices'=> $prices,
        'company' => $company,
        'type'=> $type,
        'date'=> $date,
        'department'=> $department,
        'school'=> $school,
        'total'=> $total,

    ]);
    
});

