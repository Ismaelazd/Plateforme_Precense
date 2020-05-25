<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Event;
use App\Presence;
use App\User;
use App\Validationchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check() || Auth::user()->role_id ==1) {
            $changements = Validationchange::all();

        } else {
            $users = User::where('classe_id',Auth::user()->classe_id)->get();
            $changements = Validationchange::whereIn('user_id',$users->pluck('id'))->get();
        }
        if (!Auth::check() || Auth::user()->role_id ==1) {
            $events = Event::all();

        } else {
            $events = Event::where('classe_id',Auth::user()->classe_id)->get();
        }
        return view('event.index',compact('events','changements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check() || Auth::user()->role_id ==1) {
            $changements = Validationchange::all();

        } else {
            $users = User::where('classe_id',Auth::user()->classe_id)->get();
            $changements = Validationchange::whereIn('user_id',$users->pluck('id'))->get();
        }
        $classes = Classe::all();
        return view('event.create',compact('classes','changements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom'=>'required|max:70',
            'classe_id'=>'required',
            'description'=>'sometimes|max:300',
            'start'=>'required',
            'end'=>'required',
        ]);

        $event = new Event();
        $event->nom = $request->input('nom');
        $event->classe_id = $request->input('classe_id');
        $event->description = $request->input('description');
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        $event->save();

        $students = User::where('classe_id', $request->input('classe_id'))->where('role_id', 3)->get();
        foreach ($students as $student) {
            $presence = new Presence();
            $presence->user_id = $student->id;
            $presence->event_id = $event->id;
            $presence->etat_id = 2;
            $presence->etatfinal_id = 5;
            $presence->save();
        }

        return redirect()->route('calendrier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        if (!Auth::check() || Auth::user()->role_id ==1) {
            $changements = Validationchange::all();

        } else {
            $users = User::where('classe_id',Auth::user()->classe_id)->get();
            $changements = Validationchange::whereIn('user_id',$users->pluck('id'))->get();
        }
        $presences = $event->getPresences()->get();
        $precense = $presences->where('user_id',Auth::id());
        if ($event) {
            return view('event/show',compact('event','precense','presences','changements'));
        }else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        
        if (!Auth::check() || Auth::user()->role_id ==1) {
            $changements = Validationchange::all();

        } else {
            $users = User::where('classe_id',Auth::user()->classe_id)->get();
            $changements = Validationchange::whereIn('user_id',$users->pluck('id'))->get();
        }
        $classes = Classe::all();
        return view('event.edit',compact('event','classes','changements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'nom'=>'required|max:70',
            'classe_id'=>'required',
            'description'=>'sometimes|max:300',
            'start'=>'required',
            'end'=>'required',
        ]);

        $event->nom = $request->input('nom');
        $event->classe_id = $request->input('classe_id');
        $event->description = $request->input('description');
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        $event->save();

        return redirect()->route('event.show',$event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('calendrier');
    }
}
