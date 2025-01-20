<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('dashboard.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'logo' => 'sometimes|image|mimes:jpg,png,jpeg'
        ]);

        $data = $request->only('title_ar', 'title_en');

        if($request->hasFile('logo')){
            $data['logo'] = Storage::disk('public')->put('tags_logos',$request->file('logo'));
        }

        Tag::create($data);

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::find($id);
        return view('dashboard.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
        ]);

        $tag = Tag::findOrFail($id);
        $data = $request->only('title_ar', 'title_en');

        if($request->hasFile('logo')){
            if($tag->logo && Storage::disk('public')->exists($tag->logo)){
                Storage::disk('public')->delete($tag->logo);
            }

            $data['logo'] = Storage::disk('public')->put('tags_logos', $request->file('logo'));
        }

        $tag->update($data);

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);
        if($tag->logo && Storage::disk('public')->exists($tag->logo)){
            Storage::disk('public')->delete($tag->logo);
        }

        $tag->delete();
        return back();
    }
}
