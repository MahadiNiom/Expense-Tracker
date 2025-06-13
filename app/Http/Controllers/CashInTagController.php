<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashIn;
use App\Models\CashInTag;

class CashInTagController extends Controller
{
    //
    public function index()
    {
        return view('cashintags.index');
    }
    public function create()
    {
        return view('cashintags.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        CashInTag::create($request->all());

        return redirect()->route('tags')->with('success', 'Cash In Tag created successfully.');
    }
    public function edit($id)
    {
        $cashintag = CashInTag::findOrFail($id);
        return view('cashintags.edit', compact('cashintag'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $tag = CashInTag::findOrFail($id);
        $tag->update($request->all());

        return redirect()->route('tags')->with('success', 'Cash In Tag updated successfully.');
    }
    public function destroy($id)
    {
        $tag = CashInTag::findOrFail($id);
        $tag->delete();

        return redirect()->route('tags')->with('success', 'Cash In Tag deleted successfully.');
    }
    public function show($id)
    {
        $tag = CashInTag::findOrFail($id);
        return view('cashintags.show', compact('tag'));
    }
    
}
