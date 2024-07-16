<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;

class StageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'funnel_id' => 'required|exist:funnel,id',
        ]);

        return Stage::create($request->all());
    }

    public function updateOrder(Request $request)
    {
        $request->validate(['order' => 'required|array']);
        foreach ($request->order as $index => $id){
            Stage::where('id, $id')->update(['order' => $index]);
        }

        return response()->json(['message' => 'Ordem alterada com sucesso']);
    }
}
