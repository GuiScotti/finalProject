<?php

namespace App\Core\Funnel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\ImplicitReturnPass;


class FunnelController extends Controller
{
    public function index()
    {   
        return response()->json($FunnelRepository->getFunnel(Auth::id()));
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

    public function contactsValueReport()
    {
        $contactsValue = Funnel::with('contacts')
            ->get()
            ->map(function ($funnel) {
                return [
                    'funnel' => $funnel->name,
                    'total_value' => $funnel->contacts->sum('value')
                ];
            });
    
        return response()->json($contactsValue);
    }

    public function createdContactsReport()
{
    $createdContacts = Funnel::with('contacts')
        ->get()
        ->map(function ($funnel) {
            return [
                'funnel' => $funnel->name,
                'created_contacts' => $funnel->contacts->count()
            ];
        });

    return response()->json($createdContacts);
}
}