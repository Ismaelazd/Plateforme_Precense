<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Event;
use App\Info;
use App\Messagerie;
use Illuminate\Http\Request;
use App\User;
use App\Presence;
use App\Role;
use App\Validationchange;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Foreach_;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['show','update']]);
        $this->middleware('coach', ['only' => ['show','update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::where('role_id',3)->get();
        return view('user.students',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coachs = User::where('role_id',2)->get();
        return view('user.coachs',compact('coachs'));
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
    public function show(User $user)
    { 
        $info = Info::first();

        if (!Auth::check() || Auth::user()->role_id ==1) {
            $changements = Validationchange::all();

        } else {
            $users = User::where('classe_id',Auth::user()->classe_id)->get();
            $changements = Validationchange::whereIn('user_id',$users->pluck('id'))->get();
        }
        $messageries = Messagerie::where('student_id', $user->id)->get();

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
        

        return view('user.show',compact('user','messageries','changements','presences','info','presencesDuMois')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $classes = Classe::all();
        return view('user.edit',compact('user','roles','classes')); 
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
        $request->validate([
            'name'=> 'required',
            'firstname'=> 'required',
            'image'=> 'sometimes|image',
            'tel'=> 'sometimes|max:150',
            'rue'=> 'sometimes|max:150',
            'ville'=> 'sometimes|max:150',
            'email'=>'required|unique:users,email,'.$user->id,
            'facebook'=> 'sometimes|max:150',
            'twitter'=> 'sometimes|max:150',
            'linkedin'=> 'sometimes|max:150',
            'instagram'=> 'sometimes|max:150',
            'github'=> 'sometimes|max:150',
        ]);
        $user->name = $request->input('name');
        $user->firstname = $request->input('firstname');
        $user->email = $request->input('email');
        if($request->hasFile('image')) {
            if ($user->image== 'avatar.png') {
                $imageNew=Storage::disk('public')->put('', $request->image);
                $user->image=$imageNew;
            }else {
                Storage::disk('public')->delete($user->image);
                $imageNew=Storage::disk('public')->put('', $request->image);
                $user->image=$imageNew;
            }
            
        }
        $user->classe_id = $request->input('classe_id');
        $user->tel = $request->input('tel');
        $user->rue = $request->input('rue');
        $user->ville = $request->input('ville');
        $user->facebook = $request->input('facebook');
        $user->twitter = $request->input('twitter');
        $user->linkedin = $request->input('linkedin');
        $user->instagram = $request->input('instagram');
        $user->github = $request->input('github');
        $user->save();
        
        if ($user->id==Auth::id()) {
            return redirect()->route('myProfil.index');
            //coach
        } else {

            if ($user->role_id==2) {
                return redirect()->route('user.create');
                //coach
            } else {
                if ($request->input('role_id')==3) {
                    return redirect()->route('user.index');
                    //student
                } else {
                    return redirect()->to('visiteurs');
                    //visiteurs
                }         
            }
        }
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->image!= 'avatar.png') {
            Storage::disk('public')->delete($user->image);
        }
        $user->delete();
        return redirect()->back();
    }

    public function visiteur(){
        $visiteurs = User::where('role_id',4)->get();
        return view('user.visiteurs',compact('visiteurs'));
    }

    public function bigCoach(User $user)
    {

        $coachs = User::where('role_id',2)->get();
        foreach ($coachs as $coach) {
            $coach->bigcoach = false;
            $coach->save();
        }

        $user->bigcoach = true;
       
        
        $user->save();
        return redirect()->route('user.create');
    }
}
 