<?php

namespace App\Http\Controllers;

use App\Event;
use App\Info;
use App\Messagerie;
use App\Role;
use App\User;
use App\Validationchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class MyProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $this->authorize('mine', $user, User::class);

        if (!Auth::check() || Auth::user()->role_id ==1) {
            $changements = Validationchange::all();

        } else {
            $users = User::where('classe_id',Auth::user()->classe_id)->get();
            $changements = Validationchange::whereIn('user_id',$users->pluck('id'))->get();
        }
        $messageries = Messagerie::where('student_id' , Auth::id())->get();
        $user = Auth::user();
        $roles = Role::all();

        $total = Event::where('end','<', new Carbon())->where('classe_id',$user->classe_id)->get()->pluck('getPresences');
        $related = $total->first();
        if($total->first()){
            foreach ($total as $item) {
                    $related = $related->merge($item);
            }
        }
        $toutespresences = $related;
        if ($toutespresences) {
            $presences = $toutespresences->where('user_id',$user->id);
        } else {
            $presences = collect();
        }        

        $totalOfTheMonth = Event::where('end','<', new Carbon())->where('start','>',new Carbon('first day of this month'))->where('classe_id',$user->classe_id)->get()->pluck('getPresences');
        $relat = $totalOfTheMonth->first();
        if($totalOfTheMonth->first()){
            foreach ($totalOfTheMonth as $item) {
                    $relat = $relat->merge($item);
            }
        }
        $monthly = $relat;
        if ($monthly) {
            $presencesDuMois = $monthly->where('user_id',$user->id);
        } else {
            $presencesDuMois = collect();
        }



        $info = Info::first();

        return view('profil.myProfil',compact('user','roles','messageries','changements','presences','info','presencesDuMois'));
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
    public function edit(User $user)
    {
        $info = Info::first();

        $this->authorize('mine', $user, User::class);

        if (!Auth::check() || Auth::user()->role_id ==1) {
            $changements = Validationchange::all();

        } else {
            $users = User::where('classe_id',Auth::user()->classe_id)->get();
            $changements = Validationchange::whereIn('user_id',$users->pluck('id'))->get();
        }       
        
        // $user = Auth::user();

        return view('profil.editMyProfil',compact('user','roles','changements','info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('mine', $user, User::class);

        $request->validate([
            'password'=>'required|min:8',
        ]);
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('myProfil.index');
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
 