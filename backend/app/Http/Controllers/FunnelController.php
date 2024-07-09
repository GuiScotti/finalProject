<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funnel;
use Illuminate\Support\Facades\Auth;


class FunnelController extends Controller
{
    public function index()
    {
        $funnel = Funnel::where('user_id', Auth::id())->paginate(10);
        
        return response()->json($funnel);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $funnel = new Funnel();
        $funnel->user_id = Auth::id();
        $funnel->name = $request->name;
        $funnel->save();
    
        return response()->json($funnel, 201);
    }

    public function search(Request $request)
    {
        $name = $request->query('name');
        $funnel = Funnel::where('user_id', Auth::id())
                         ->where('name', 'like', "%$name%")
                         ->get();
         return response()->json($funnel);
    }

    public function destroy($id)
    {
        $funnel = Funnel::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        $funnel->delete();

        return response()->json(null, 204);
    }
}