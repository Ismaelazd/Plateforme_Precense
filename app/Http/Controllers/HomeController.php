<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Event;
use App\Form;
use App\Helpers\Calendar\Events;
use App\Newsletter;
use App\Presence;
use App\Testimonial;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::all();
        $students = User::where('role_id',3)->get();
        $coachs = User::where('role_id',2)->get();
        $messages = Form::all();
        $testimonials =Testimonial::all();
        $newsletters =Newsletter::all();
        $classes =Classe::all(); 
        $futurevents = Event::where('start','>',new Carbon())->paginate(6);
        $events = Event::where('end','<',new Carbon())->get()->pluck('getPresences');
        $related = $events->first();
        if($events->first()){
            foreach ($events as $item) {
                $related = $related->merge($item);
            }
        }
        $presences = $related;



        return view('home',compact('events','students','coachs','messages','futurevents','testimonials','newsletters','classes','presences'));
    }
}
