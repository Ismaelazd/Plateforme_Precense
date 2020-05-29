<?php

namespace App\Http\Controllers;

use App\Presence;
use App\Event;
use App\Etat;
use App\Etatfinal;
use App\Info;
use App\User;
use App\Validationchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DateTime;

class PresenceController extends Controller
{

    public function __construct()
    {
        $this->middleware('notMember');
        $this->middleware('coach', ['except' => ['edit','update','longueabsenceblade','longueabsence','download']]);
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
        $info = Info::first();

        $me = User::find($presence->user_id);
        $this->authorize('mineOrAdmin', $me, User::class);
        
        if (!Auth::check() || Auth::user()->role_id ==1) {
            $changements = Validationchange::all();

        } else {
            $users = User::where('classe_id',Auth::user()->classe_id)->get();
            $changements = Validationchange::whereIn('user_id',$users->pluck('id'))->get();
        }
        $etats = Etat::all();
        $etatfinals = Etatfinal::all();
        return view('presence.edit',compact('presence','etats','etatfinals','changements','info'));
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
        $me = User::find($presence->user_id);
        $this->authorize('mineOrAdmin', $me, User::class);

        $validatedData = $request->validate([
             'note' => 'sometimes|max:300',
        ]);
        $presence->etat_id = $request->input('etat_id');
        if($request->hasFile('file')){
            $fichier = $request->file('file');
            $newName = Storage::disk('public')->put('',$fichier);	  
            $presence->file = $newName;
        }
        $presence->note = $request->input('note');
        if (Auth::id()!=3) {
            $presence->etatfinal_id = $request->input('etatfinal_id');
        } else {
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
                        if ($request->input('etat_id')==2 && (!$request->hasFile('file') && empty($request->input('note'))) && (Carbon::now()->format('Y-m-d H:i:s') < Event::find($presence->event_id)->start) ) {
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
    }
        $presence->save();
        return redirect()->route('event.show',$presence->event_id);


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presence $presence)
    {
  

        $id =$presence->user_id;
        $presence->delete();  
        return redirect()->route('user.show',$id);
    }

    public  function  download($id)
    {
        $presence = Presence::find($id);
        $user = User::find($presence->user_id);
        $this->authorize('mineOrAdmin', $user, User::class);

	$extension = pathinfo(storage_path($presence->file), PATHINFO_EXTENSION);
	return  Storage::disk('public')->download($presence->file,$presence->file.'.'.$extension);
    }




    public function longueabsenceblade(){
        $etats = Etat::all();
        $etatfinals = Etatfinal::all();
        return view('longueabsenceblade',compact('etatfinals','etats'));
    }

    public function longueabsence(Request $request){

        $date1 = new Carbon($request->input('debut'));
        $date2 = new Carbon($request->input('fin'));
        $events = Event::where('start','>=',$date1)->where('end','<=',$date2)->get()->pluck('getPresences');
        $related = $events->first();
        if($events->first()){
            foreach ($events as $item) {
                $related = $related->merge($item);
            }
        }
        
        $presences = $related->where('user_id',Auth::id());
        if($request->hasFile('file')){
            $fichier = $request->file('file');
            $newName = Storage::disk('public')->put('',$fichier);	  
        }
 
        foreach ($presences as $presence) {


            $validatedData = $request->validate([
                'note' => 'sometimes|max:300',
           ]);
           $presence->etat_id = $request->input('etat_id');

           if($request->hasFile('file')){
            $presence->file = $newName;
            }
           $presence->note = $request->input('note');

            if (Auth::id()!=3) {
                $presence->etatfinal_id = $request->input('etatfinal_id');
            } else {
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
                            if ($request->input('etat_id')==2 && (!$request->hasFile('file') && empty($request->input('note'))) && (Carbon::now()->format('Y-m-d H:i:s') < Event::find($presence->event_id)->start) ) {
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
            }
            $presence->save();
        }
        return redirect()->route('calendrier');
        
    }
}
