<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Magazine;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class MagazineController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $magazine = Magazine::orderBy('id', 'desc')->paginate(10);

        return view('dashboard.magazine.index', compact('magazine'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        $mag = new Magazine();

        return view('dashboard.magazine.create', compact('mag'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:webp,png,jpg|max:2048',
        ]);
        $magazine = new Magazine();
        $magazine->name = $request->name;
        $magazine->issue = $request->issue;
        $magazine->type = $request->type;
        $magazine->year = $request->year;
        $magazine->url = $request->url;
        $magazine->title = $request->title;
        $magazine->description = $request->description;
        $magazine->keywords = $request->keywords;
        $magazine->date = $request->date;
        $magazine->published = $request->published;

        $imageName = $request->image->getClientOriginalName();
        $request->image->storeAs('magazines/'.$magazine->year.'/'.$magazine->issue.'/'.$magazine->type, $imageName);
        $magazine->image = $imageName;
        $magazine->save();

        return redirect()->route('magazine.index')->withSuccessMessage('Magazine Added Successfully!');

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
        $mag = Magazine::find($id);
        return view('dashboard.magazine.edit', compact('mag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:webp,png,jpg|max:2048',
        ]);
        $mag = Magazine::find($id);
        $mag->name = $request->name;
        $mag->issue = $request->issue;
        $mag->type = $request->type;
        $mag->year = $request->year;
        $mag->url = $request->url;
        $mag->title = $request->title;
        $mag->description = $request->description;
        $mag->keywords = $request->keywords;
        $mag->date = $request->date;
        $mag->published = $request->published;

        if ($request->hasFile('image')) {
            Storage::delete('magazines/'.$mag->year.'/'.$mag->issue.'/'.$mag->type.'/'.$mag->image);
            
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('magazines/'.$mag->year.'/'.$mag->issue.'/'.$mag->type, $filename);
            $mag->image = $filename;
        }
        $mag->save();
        return redirect()->route('magazine.index')->withSuccessMessage('Magazine Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mag = Magazine::find($id);
        Storage::delete('magazines/'.$mag->year.'/'.$mag->issue.'/'.$mag->type.'/'.$mag->image);
        $mag->delete();

        return redirect()->route('magazine.index')->withSuccessMessage('Magazine Deleted Successfully!');
    }

    public function profile(string $id)
    {
        $mag = Magazine::find($id);
        $profiles = Profile::where('mag_id', $id)->get();
        return view('dashboard.profile.index', compact('mag', 'profiles'));
    }

    public function createProfile(string $id)
    {
        $profile = new Profile();
        $mag = Magazine::find($id);
        return view('dashboard.profile.create', compact('profile', 'mag'));
    }

    public function storeProfile(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:webp,png,jpg|max:2048',
        ]);

        $profile = new Profile();
        $profile->mag_id = $request->mag_id;
        $profile->name = $request->name;
        $profile->body = $request->body;
        $profile->url = $request->url;
        $profile->title = $request->title;
        $profile->description = $request->description;
        $profile->type = $request->type;
        $profile->author = $request->author;
        $profile->keywords = $request->keywords;
        $profile->date = $request->date;
        $profile->published = $request->published;

        $mag = Magazine::find($profile->mag_id);

        if ($request->hasFile('image')) {
            Storage::delete('magazines/'.$mag->year.'/'.$mag->issue.'/'.$mag->type.'/profiles/'.$profile->image);
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('magazines/'.$mag->year.'/'.$mag->issue.'/'.$mag->type.'/profiles/', $filename);
            $profile->image = $filename;
        }
        $profile->save();

        return redirect('dashboard/sme/magazine/'.$mag->id.'/profile')->withSuccessMessage('Profile Added Successfully!');
    }

    public function editProfile(string $id)
    {
        $profile = Profile::find($id);
        $mag = Magazine::find($profile->mag_id);
        return view('dashboard.profile.edit', compact('profile', 'mag'));
    }

    public function updateProfile(Request $request, string $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:webp,png,jpg|max:2048',
        ]);
        $profile = Profile::find($id);
        $profile->mag_id = $request->mag_id;
        $profile->name = $request->name;
        $profile->body = $request->body;
        $profile->url = $request->url;
        $profile->title = $request->title;
        $profile->description = $request->description;
        $profile->type = $request->type;
        $profile->author = $request->author;
        $profile->keywords = $request->keywords;
        $profile->date = $request->date;
        $profile->published = $request->published;

        $mag = Magazine::find($profile->mag_id);

        if ($request->hasFile('image')) {
            Storage::delete('magazines/'.$mag->year.'/'.$mag->issue.'/'.$mag->type.'/profiles/'.$profile->image);
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('magazines/'.$mag->year.'/'.$mag->issue.'/'.$mag->type.'/profiles/', $filename);
            $profile->image = $filename;
        }
        $profile->save();

        return redirect('dashboard/sme/magazine/'.$mag->id.'/profile')->withSuccessMessage('Magazine Updated Successfully!');
    }

    public function destroyProfile(string $id)
    {
        $profile = Profile::find($id);
        $mag = Magazine::find($profile->mag_id);
        Storage::delete('magazines/'.$mag->year.'/'.$mag->issue.'/'.$mag->type.'/profiles/'.$profile->image);
        $profile->delete();

        return redirect('dashboard/sme/magazine/'.$mag->id.'/profile')->withSuccessMessage('Profile Deleted Successfully!');
    }

}
