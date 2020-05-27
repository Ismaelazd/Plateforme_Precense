<?php

namespace App\Http\Controllers;

use App\Testimonial;
use App\User;
use App\Validationchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{

    public function __construct()
    {
        $this->middleware('notMember');
    }

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
        
        $user = User::find($id);
        $this->authorize('mine', $user, User::class);
        

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
        if (!Auth::check() || Auth::user()->role_id ==1) {
            $changements = Validationchange::all();

        } else {
            $users = User::where('classe_id',Auth::user()->classe_id)->get();
            $changements = Validationchange::whereIn('user_id',$users->pluck('id'))->get();
        }
        return view('testimonial.edit',compact('testimonial','changements'));
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
  