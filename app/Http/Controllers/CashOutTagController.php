<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashOutTag;

class CashOutTagController extends Controller
{
    //
    public function index()
    {
        return view('cashouts.index');
    }
    public function create()
    {
        return view('cashouttags.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        CashOutTag::create($request->all());

        return redirect()->route('tags')->with('success', 'Cash Out Tag created successfully.');
    }
    public function edit($id)
    {
        $cashouttag = CashOutTag::findOrFail($id);
        return view('cashouts.edit', compact('cashouttag'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $tag = CashOutTag::findOrFail($id);
        $tag->update($request->all());

        return redirect()->route('tags')->with('success', 'Cash Out Tag updated successfully.');
    }
    public function destroy($id)
    {
        $tag = CashOutTag::findOrFail($id);
        $tag->delete();

        return redirect()->route('tags')->with('success', 'Cash Out Tag deleted successfully.');
    }
    public function show($id)
    {
        $tag = CashOutTag::findOrFail($id);
        return view('cashouts.show', compact('tag'));
    }
}
