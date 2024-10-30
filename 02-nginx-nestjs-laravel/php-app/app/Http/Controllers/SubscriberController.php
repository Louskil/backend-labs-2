<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Subscriber::all();
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
        $subscriber = Subscriber::create($request->all());
    	return response()->json($subscriber, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Subscriber::findOrFail($id);
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
    public function update(Request $request, string $id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->update($request->all());
        return response()->json($subscriber, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Subscriber::destroy($id);
        return response()->json(null, 204);
    }
}
