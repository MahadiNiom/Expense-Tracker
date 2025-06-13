<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashOut;
use App\Models\CashOutTag;

class CashOutController extends Controller
{
    //
    public function index()
    {
        $cashouts = CashOut::with('cashOutTag')->get();
        $total = CashOut::sum('amount');
        return view('cashouts.index', compact('cashouts', 'total'));
    }
    public function create()
    {
        $tags = CashOutTag::all();
        return view('cashouts.create', compact('tags'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'nullable|string|max:1000',
            'cash_out_tag_id' => 'required|exists:cash_out_tags,id',
        ]);
        CashOut::create($request->all());
        return redirect()->route('cashouts.index')->with('success', 'Cash Out created successfully.');
    }
    public function show($id)
    {
        $cashout = CashOut::with('cashOutTag')->findOrFail($id);
        return view('cashouts.show', compact('cashout'));
    }
    public function edit($id)
    {
        $cashout = CashOut::findOrFail($id);
        $tags = CashOutTag::all();
        return view('cashouts.edit', compact('cashout', 'tags'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'nullable|string|max:1000',
            'cash_out_tag_id' => 'required|exists:cash_out_tags,id',
        ]);

        $cashout = CashOut::findOrFail($id);
        $cashout->update($request->all());

        return redirect()->route('cashouts.index')->with('success', 'Cash Out updated successfully.');
    }
    public function destroy($id)
    {
        $cashout = CashOut::findOrFail($id);
        $cashout->delete();

        return redirect()->route('cashouts.index')->with('success', 'Cash Out deleted successfully.');
    }

    

}
