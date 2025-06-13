<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashIn;
use App\Models\CashInTag;
use App\Models\CashOut;
use App\Models\CashOutTag;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Perform your search logic here
        // For example, you can search in the CashIn and CashOut models
        $cashins = CashIn::where('description', 'LIKE', "%$query%")
            ->orWhere('amount', 'LIKE', "%{$query}%")
            ->orWhere('created_at', 'LIKE', "%{$query}%")
            ->get();
        $cashouts = CashOut::where('description', 'LIKE', "%$query%")
            ->orWhere('amount', 'LIKE', "%{$query}%")
            ->orWhere('created_at', 'LIKE', "%{$query}%")
            ->get();

        return view('searchresult', compact('cashins', 'cashouts'));
    }
}
