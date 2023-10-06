<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->paginate(10);

        return view('dashboard.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        $clients = new Client();

        return view('dashboard.clients.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:webp|max:2048',
        ]);
        $clients = new Client();
        $clients->name = $request->name;
        $clients->company = $request->company;
        $clients->position = $request->position;
        $clients->message = $request->message;
        
        $imageName = $request->image->getClientOriginalName();
        $request->image->storeAs('public/clients', $imageName);
        $clients->image = $imageName;
        $clients->save();

        return redirect()->route('clients.index')->withSuccessMessage('Client Added Successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clients = Client::find($id);
        return view('dashboard.clients.edit', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $clients = Client::find($id);
        $clients->name = $request->name;
        $clients->company = $request->company;
        $clients->position = $request->position;
        $clients->message = $request->message;

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('clients/'.$clients->image);
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/clients', $filename);
            $clients->image = $filename;
        }
        $clients->save();
        return redirect()->route('clients.index')->withSuccessMessage('Client Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clients = Client::find($id);
        Storage::disk('public')->delete('clients/'.$clients->image);
        $clients->delete();

        return redirect()->route('clients.index')->withSuccessMessage('Client  Deleted Successfully!');
    }

}