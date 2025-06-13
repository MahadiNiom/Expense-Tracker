<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashIn;
use App\Models\CashInTag;

class CashInController extends Controller
{
    //
    public function index()
    {
        $cashins = CashIn::with('cashInTag')->get();
        $total = CashIn::sum('amount');
        return view('cashins.index', compact('cashins', 'total'));
    }
    public function create()
    {
        $tags = CashInTag::all();
        return view('cashins.create', compact('tags'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'nullable|string|max:1000',
            'cash_in_tag_id' => 'required|exists:cash_in_tags,id',
        ]);
        CashIn::create($request->all());
        return redirect()->route('cashins.index')->with('success', 'Cash In created successfully.');
    }
    public function show($id)
    {
        $cashin = CashIn::with('cashInTag')->findOrFail($id);
        return view('cashins.show', compact('cashin'));
    }
    public function edit($id)
    {
        $cashin = CashIn::findOrFail($id);
        $tags = CashInTag::all();
        return view('cashins.edit', compact('cashin', 'tags'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'nullable|string|max:1000',
            'cash_in_tag_id' => 'required|exists:cash_in_tags,id',
        ]);

        $cashin = CashIn::findOrFail($id);
        $cashin->update($request->all());

        return redirect()->route('cashins.index')->with('success', 'Cash In updated successfully.');
    }
    public function destroy($id)
    {
        
        $cashin = CashIn::findOrFail($id);
        $cashin->delete();

        return redirect()->route('cashins.index')->with('success', 'Cash In deleted successfully.');
    }
}
