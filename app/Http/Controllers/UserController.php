<?php

namespace App\Http\Controllers;

use App\Classe;
use Illuminate\Http\Request;
use App\User;
use App\Presence;
use App\Role;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
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

        $total = Presence::where('user_id',$user->id)->count();
        $presences = Presence::where('user_id',$user->id);

        return view('user.show',compact('user','total','presences')); 
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
            'email'=>'required|unique:users,email,'.$user->id,
        ]);
        $user->name = $request->input('name');
        $user->firstname = $request->input('firstname');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');
        if($request->hasFile('image')) {
            if ($request->input('image')== 'team/team-3.jpg') {
                $imageNew=Storage::disk('public')->put('', $request->image);
                $user->image=$imageNew;
            }
            Storage::disk('public')->delete($user->image);
            $imageNew=Storage::disk('public')->put('', $request->image);
            $user->image=$imageNew;
        }
        $user->classe_id = $request->input('classe_id');
        $user->save();
        if ($request->input('role_id')==2) {
            return redirect()->route('user.coachs');
        } else {
            if ($request->input('role_id')==3) {
                return redirect()->route('user.students');
            } else {
                return redirect()->to('user.visiteurs');
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
        if ($user->image!= 'team/team-3.jpg') {
            Storage::disk('public')->delete($user->image);
        }
        $user->save();
        return redirect()->back();
    }
}
 