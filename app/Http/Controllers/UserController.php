<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Event;
use App\Messagerie;
use Illuminate\Http\Request;
use App\User;
use App\Presence;
use App\Role;
use App\Validationchange;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['show']]);
        $this->middleware('coach', ['only' => ['show']]);
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
        
        $changements = Validationchange::all();

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
        

        return view('user.show',compact('user','messageries','changements','presences')); 
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
        dd('heloo');
        $request->validate([
            'name'=> 'required',
            'firstname'=> 'required',
            'image'=> 'sometimes|image',
            'tel'=> 'sometimes|max:150',
            'rue'=> 'sometimes|max:150',
            'ville'=> 'sometimes|max:150',
            'email'=>'required|unique:users,email,'.$user->id,
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
        $user->save();
        if ($request->input('role_id')==2) {
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
}
 