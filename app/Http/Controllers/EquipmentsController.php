<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentsController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('term');
        $results = Equipment::where('title', 'LIKE', '%' . $search . '%')->take(9)->get();

        return response()->json($results);
    }
}
