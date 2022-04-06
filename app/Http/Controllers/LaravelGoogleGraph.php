<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LaravelGoogleGraph extends Controller
{
    function index()
    public function index()
{

$data = DB::table('orders')
    ->select(
    DB::raw('order_status as order_status'),
    DB::raw('count(*) as number'))
    ->groupBy('order_status')
    ->get();
    $array[] = ['Order_status', 'Number'];
    foreach($data as $key => $value)
{
    $array[++$key] = [$value->order_status, $value->number];
}
    return view('order.index')->with('order_status', json_encode($array));
}
}
