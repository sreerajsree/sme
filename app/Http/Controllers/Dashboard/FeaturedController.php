<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Featured;
use Illuminate\Support\Facades\Storage;

class FeaturedController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featured = Featured::orderBy('id', 'desc')->paginate(10);

        return view('dashboard.featured.index', compact('featured'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        $featured = new Featured();

        return view('dashboard.featured.create', compact('featured'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:webp,jpg,png,jpeg|max:2048',
        ]);
        $featured = new Featured();
        $featured->name = $request->name;
        $featured->url = $request->url;
        $imageName = $request->image->getClientOriginalName();
        $request->image->storeAs('featured', $imageName);
        $featured->image = $imageName;
        $featured->save();

        return redirect()->route('featured.index')->withSuccessMessage('Client Added Successfully!');

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
        $featured = Featured::find($id);
        return view('dashboard.featured.edit', compact('featured'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $featured = Featured::find($id);
        $featured->name = $request->name;
        $featured->url = $request->url;

        if ($request->hasFile('image')) {
            Storage::delete('featured/'.$featured->image);
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('featured', $filename);
            $featured->image = $filename;
        }
        $featured->save();
        return redirect()->route('featured.index')->withSuccessMessage('Client Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $featured = Featured::find($id);
        Storage::delete('featured/'.$featured->image);
        $featured->delete();

        return redirect()->route('featured.index')->withSuccessMessage('Client  Deleted Successfully!');
    }

}