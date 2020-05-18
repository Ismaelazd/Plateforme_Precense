<?php

namespace App\Http\Controllers;

use App\User;
use App\Validationchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ValidationchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $validationchanges = Validationchange::all();
        return view('validationchange.index',compact('validationchanges'));
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
        $Validationchange = new Validationchange();
        $request->validate([
            'name'=> 'required',
            'firstname'=> 'required',
            'email'=>'required|unique:users,email,'.$Validationchange->id,
            'password'=> 'required',
            'image' => 'sometimes|image',
        ]);
        $Validationchange->name = $request->input('name');
        $Validationchange->firstname = $request->input('firstname');
        $Validationchange->email = $request->input('email');
        $Validationchange->password = Hash::make( $request->input('password'));
        $Validationchange->role_id = $request->input('role_id');
   
            $imageNew=Storage::disk('public')->put('', $request->image);
            $Validationchange->image=$imageNew;
      
        $Validationchange->classe_id = $request->input('classe_id');
        $Validationchange->save();
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
     * Display the specified resource.
     *
     * @param  \App\Validationchange  $validationchange
     * @return \Illuminate\Http\Response
     */
    public function show(Validationchange $validationchange)
    {
        return view('validationchange.show',compact('validationchange'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Validationchange  $validationchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Validationchange $validationchange)
    {

        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Validationchange  $validationchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Validationchange $validationchange)
    {
        $user = User::find($validationchange->user_id);

        $user->name = $validationchange->name;
        $user->firstname = $validationchange->firstname;
        $user->email = $validationchange->email;
        $user->password = $validationchange->password;
        $user->role_id = $validationchange->role_id; 
        if ($validationchange->image== 'team/team-3.jpg') {
            $user->image=$validationchange->image;
        }else {
            Storage::disk('public')->delete($user->image);
            $user->image=$validationchange->image;
        }
        
        $user->classe_id = $validationchange->classe_id;
        $user->save();
        $validationchange->delete();
        return redirect()->route('classe_id.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Validationchange  $validationchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Validationchange $validationchange)
    {
        $validationchange->delete();
        return redirect()->route('classe_id.index');

    }
}
