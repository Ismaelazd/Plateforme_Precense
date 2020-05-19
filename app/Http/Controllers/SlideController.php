<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('slide.index',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slide.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sous_titre'=> 'required|max:100',
            'titre_un'=> 'required|max:100',
            'titre_deux'=> 'required|max:100',
            'image'=> 'required|image',
        ]);
        $slide = new Slide();
        $slide->sous_titre = $request->input('sous_titre');
        $slide->titre_un = $request->input('titre_un');
        $slide->titre_deux = $request->input('titre_deux');
        Storage::disk('public')->delete($slide->image);
        $imageNew=Storage::disk('public')->put('', $request->image);
        $slide->image=$imageNew;
        
        $slide->save();
        return redirect()->route('slide.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        return view('slide.edit',compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'sous_titre'=> 'required|max:100',
            'titre_un'=> 'required|max:100',
            'titre_deux'=> 'required|max:100',
            'image'=> 'sometimes|image',
        ]);
        $slide->sous_titre = $request->input('sous_titre');
        $slide->titre_un = $request->input('titre_un');
        $slide->titre_deux = $request->input('titre_deux');
        if($request->hasFile('image')) {
            $imageNew=Storage::disk('public')->put('', $request->image);
            $slide->image=$imageNew;
        }
        $slide->save();
        return redirect()->route('slide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        Storage::disk('public')->delete($slide->image);
        $slide->delete();
        return redirect()->route('slide.index');
    }
}
