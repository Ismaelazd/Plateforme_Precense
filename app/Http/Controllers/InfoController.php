<?php

namespace App\Http\Controllers;

use App\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Info::first();
        return view('info.index',compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        $info = Info::first();
        return view('info.edit',compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        $validator = Validator::make($request->all(), [
            'adress_un' => 'required|max:105',
            'adresse_deux' => 'required|max:105',
            'tel' => 'required',
            'email' => 'required',
        ]);
        $info->adress_un = $request->input('adress_un');
        $info->adresse_deux = $request->input('adresse_deux');
        $info->tel = $request->input('tel');
        $info->email = $request->input('email');
        $info->save();
        return redirect()->route('info.index');
    }

}
