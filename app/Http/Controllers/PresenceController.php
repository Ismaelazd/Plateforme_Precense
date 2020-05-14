<?php

namespace App\Http\Controllers;

use App\Presence;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class PresenceController extends Controller
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
    public function store(Request $request,$event)
    {
        
        $validatedData = $request->validate([
            'file'=>'sometimes|max:70',
            'note'=>'sometimes|max:300',
        ]);

        $presence = new Presence();
        $presence->user_id = Auth::id();
        $presence->event_id = $event;
        $presence->etat_id = $request->input('etat_id');
        if($request->hasFile('file')){
            $fichier = $request->file('file');
            $newName = Storage::disk('public')->put('',$fichier);	  
            $presence->file = $newName;
        }
        $presence->note = $request->input('note');
        if ($request->input('etat_id')==1) {
            $presence->etatfinal_id = 1;
        }else{
            if ($request->input('etat_id')==3) {
                //si etat = retard => etat final = present avec retard 
                $presence->etatfinal_id = 2; 
            } else {
                if ($request->input('etat_id')==2 && ($request->hasFile('file') || !empty($request->input('note')))) {
                    //si etat = absent et que note ou justificatif est present => etat final = Absences avec justificatif 
                    $presence->etatfinal_id = 4; 
                } else {
                    if ($request->input('etat_id')==2 && (!$request->hasFile('file') && empty($request->input('note'))) && (Carbon::now()->format('Y-m-d H:i:s') < Event::find($event)->start) ) {
                        //si etat = absent et que ni note ni justificatif mais a prevenu => etat final = Absences annoncées 
                        $presence->etatfinal_id = 6; 
                    } else {
                        if ($request->input('etat_id')==2 && (!$request->hasFile('file') && empty($request->input('note')))) {
                            //si etat = absent et que ni note ni justificatif est present => etat final = Absences injustifiée 
                            $presence->etatfinal_id = 5; 
                        } 
                    } 
                } 
            } 
        }

        
        $presence->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function show(Presence $presence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function edit(Presence $presence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presence $presence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presence $presence)
    {
        //
    }
}
