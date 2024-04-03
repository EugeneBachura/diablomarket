<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Elixir;
use Illuminate\Http\Request;

class ElixirController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('term');
        $results = Elixir::where('title', 'LIKE', '%' . $search . '%')->take(9)->get();

        return response()->json($results);
    }
}
