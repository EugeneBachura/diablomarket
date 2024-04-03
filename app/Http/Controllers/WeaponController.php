<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('term');
        $results = Weapon::where('title', 'LIKE', '%' . $search . '%')->take(9)->get();

        return response()->json($results);
    }
}
