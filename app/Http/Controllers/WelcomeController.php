<?php

namespace App\Http\Controllers;

// use App\Event;

use App\About;
use App\Classe;
use App\Info;
use App\Slide;
use App\Testimonial;
use App\User;
use App\Validationchange;
// use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        // $events = Event::whereDate('end', '=', Carbon::now())->where('end', '<',Carbon::now()->format('Y-m-d H:i'))->get();
        // dd($events->getPresences());
        // $events->getPresences();
        // $events->getClasses();
        // $classes = [];
        // foreach ($events as $event) {
        //     $classes += $event->classe_id;
        // }
        if (!Auth::check() || Auth::user()->role_id ==1) {
            $changements = Validationchange::all();

        } else {
            $users = User::where('classe_id',Auth::user()->classe_id)->get();
            $changements = Validationchange::whereIn('user_id',$users->pluck('id'))->get();
        }
        
        $testimonials = Testimonial::inRandomOrder()->take(8)->get();
        $slides = Slide::all();
        $info = Info::first();
        $about = About::first();
        $coachs = User::where('role_id',2)->where('bigcoach',false)->inRandomOrder()->take(4)->get();
        $bigcoach = User::where('bigcoach',true)->first();
        $allCoachs = User::where('role_id',2)->get();
        $allStudents = User::where('role_id',3)->get();
        $allClasses = Classe::all();
        return view('welcome',compact('coachs','info','about','testimonials','slides','changements','bigcoach','allCoachs','allStudents','allClasses'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
