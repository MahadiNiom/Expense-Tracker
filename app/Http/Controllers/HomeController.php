<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashIn;
use App\Models\CashInTag;
use App\Models\CashOut;
use App\Models\CashOutTag;

class HomeController extends Controller
{
    //
    public function index()
    {
        $cashins = CashIn::with('cashInTag')->get();
        $cashouts = CashOut::with('cashOutTag')->get();
        $cashintags = CashInTag::all();
        $cashouttags = CashOutTag::all();
        $revenew = CashIn::sum('amount') - CashOut::sum('amount');

        return view('home', compact('cashins', 'cashouts', 'cashintags', 'cashouttags', 'revenew'));
    }

    public function filter(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after_or_equal:start_datetime',
        ]);
        $cashins = CashIn::with('cashInTag')
                    ->where('created_at','>=',$request->start_datetime)
                    ->where('created_at', '<=', $request->end_datetime)
                    ->get();
        $cashouts = CashOut::with('cashOutTag')
                    ->where('created_at','>=',$request->start_datetime)
                    ->where('created_at', '<=', $request->end_datetime)
                    ->get();
        $cashintags = CashInTag::all();
        $cashouttags = CashOutTag::all();
        $revenew = $cashins->sum('amount') - $cashouts->sum('amount');

        return view('home', compact('cashins', 'cashouts', 'cashintags', 'cashouttags', 'revenew'));

    }


}
