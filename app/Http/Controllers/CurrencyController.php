<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Http\Requests\CurrencyUpdate;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Currency::create([
            'name' => $request->name,
            'value' => $request->value,
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function change(Request $request)
    {
        if($request->currency == 'dollar'){
            session()->put('currency', 'dollar');
        } else {
            session()->remove('currency');
        }
        return redirect()->back();
    }

    public function update(CurrencyUpdate $request,Currency $id)
    {
        $id->value = $request->value;
        $id->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
