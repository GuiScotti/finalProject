<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Contact::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'funnel_id' => 'required|exists:funnel,id',
            'stage' => 'required|string',
            'email' => 'required|email',
            'phoneNumber' => 'nullable|string',
            'dateOfBirth' => 'nullable|date', 
            'address' => 'nullable|string',
            'buyValue' => 'nullable|numeric',
        ]);

        $contact = Contact::create($request->all());

        return response()->json([
            'message' => 'contato adicionado com sucesso', 
            'data' => $contact
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return response()->json($contact);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string',
            'funnel_id' => 'required|exists:funnel,id',
            'stage' => 'required|string',
            'email' => 'required|email',
            'phoneNumber' => 'nullable|string',
            'dateOfBirth' => 'nullable|date',
            'address' => 'nullable|string',
            'buyValue' => 'nullable|numeric',
        ]);

        $contact->update($request->all());
        
        return response()->json([
            'message' => 'contato atualizado com sucesso"',
            'data' => $contact
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response()->json('contanto excluido', 204);
    }
}
