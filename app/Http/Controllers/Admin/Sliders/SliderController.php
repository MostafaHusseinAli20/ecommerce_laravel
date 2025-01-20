<?php

namespace App\Http\Controllers\Admin\Sliders;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view("dashboard.sliders.index", compact("sliders"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.sliders.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $this->validate($request,[
            'image' =>  'required|image'
        ]);

        $data['image'] = Storage::disk('public')->put('slider_images', $request->file('image'));
        Slider::query()->create($data);
        return redirect()->route('sliders.index');
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
    public function edit(Slider $slider)
    {
        return view("dashboard.sliders.edit", compact("slider"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $data = $request->except('_token','image');
        $this->validate($request,[
            'image' =>  'nullable|image'
        ]);

        if ($request->hasFile('image')){
            if($slider->image && Storage::disk('public')->exists($slider->image)){
                Storage::disk('public')->delete($slider->image);
            }

            $data['image'] = Storage::disk('public')->put('slider_images',$request->file('image'));
        }

        $slider->update($data);
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if($slider->image && Storage::disk('public')->exists($slider->image)){
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();
        return redirect()->route('sliders.index');
    }
}
