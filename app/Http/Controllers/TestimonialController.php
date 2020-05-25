<?php

namespace App\Http\Controllers;

use App\Testimonial;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {

    
        $this->authorize('mine', $id,User::class);
        

        $request->validate([
            'avis'=> 'required|max:300',
        ]);

        $testimonial = new Testimonial();
        $testimonial->user_id = $id;
        $testimonial->message = $request->input('avis');
        $testimonial->note = $request->input('note');
        $testimonial->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        $this->authorize('mineT', $testimonial,Testimonial::class);
        return view('testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */  
    public function update(Request $request, Testimonial $testimonial)
    {
        $this->authorize('mineT', $testimonial,Testimonial::class);

        $request->validate([
            'avis'=> 'required|max:300',
        ]);   

        $testimonial->message = $request->input('avis');
        $testimonial->note = $request->input('note');
        $testimonial->save();
        if ($testimonial->user_id == Auth::id()) {
           
            return redirect()->route('myProfil.index');
        }else{
            return redirect()->route('user.show',$testimonial->user_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $this->authorize('mineT', $testimonial,Testimonial::class);
        $testimonial->delete(); 
        return redirect()->back();
    }
}
  