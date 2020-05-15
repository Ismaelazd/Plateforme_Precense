<?php

namespace App\Http\Controllers;

use App\Event;
use App\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        return view('event.create',compact('classes'));
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
        $presences = $event->getPresences()->get();
        // $precense = $presences->where('user_id',Auth::id());
        if ($event) {
            return view('event/show',compact('event','precense','presences'));
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
        $classes = Classe::all();
        return view('event.edit',compact('event','classes'));
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
