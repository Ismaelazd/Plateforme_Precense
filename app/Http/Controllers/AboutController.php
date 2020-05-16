<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::first();
        return view('index.about',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        $about = About::first();
        return view('edit.about',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required|max:105',
            'texte' => 'required|max:305',
            'img' => 'sometimes|image',
        ]);
        $about->titre = $request->input('titre');
        $about->texte = $request->input('texte');
        if($request->hasFile('img')){
            $img = $request->file('img');
            $newName = Storage::disk('public')->put('',$img);	  
            $about->img = $newName;
        }
        $about->save();
        return redirect()->route('about.index');
    }

}
