<?php

namespace App\Http\Controllers;

use App\Info;
use App\User;
use App\Validationchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ValidationchangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach', ['except' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Info::first();

        if (Auth::user()->role_id == 1 ) {
            # code...
            $changements = Validationchange::all();
        } else {
            // Auth::user()->classe_id == $validation->user->classe_id 
            $users = User::where('classe_id',Auth::user()->classe_id)->get();
            $changements = Validationchange::whereIn('user_id',$users->pluck('id'))->get();
        }
        // $changements = Validationchange::all();
        return view('validationchange.index',compact('changements','info'));
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
    public function store(Request $request,$id)
    {
        $user = User::find($id);
        
        $this->authorize('mine', $user, User::class);

        $request->validate([
            'name'=> 'required',
            'firstname'=> 'required',
            'email'=>'required|unique:users,email,'.$id,
            'image' => 'sometimes|image',
            'tel'=> 'sometimes|max:150',
            'rue'=> 'sometimes|max:150',
            'ville'=> 'sometimes|max:150',
        ]);
        if ($user->role_id == 1 || $user->role_id ==2) {
            $user->name = $request->input('name');
            $user->firstname = $request->input('firstname');
            $user->email = $request->input('email');
            if ($request->hasFile('image')) {
                $imageNew=Storage::disk('public')->put('', $request->image);
                $user->image=$imageNew;           
            } else {
                $user->image=$user->image;
            }
            $user->tel = $request->input('tel');
            $user->rue = $request->input('rue');
            $user->ville = $request->input('ville');
            $user->save();
        } else {
            $validationchange = new Validationchange();
            $validationchange->user_id = $id;
            $validationchange->name = $request->input('name');
            $validationchange->firstname = $request->input('firstname');
            $validationchange->email = $request->input('email');
            if ($request->hasFile('image')) {
                $imageNew=Storage::disk('public')->put('', $request->image);
                $validationchange->image=$imageNew;           
            } else {
                $validationchange->image=$user->image;
            }
            $validationchange->tel = $request->input('tel');
            $validationchange->rue = $request->input('rue');
            $validationchange->ville = $request->input('ville');
            $validationchange->save();
        }
        return redirect()->route('myProfil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Validationchange  $validationchange
     * @return \Illuminate\Http\Response
     */
    public function show(Validationchange $validationchange)
    {
        $info = Info::first();

        return view('validationchange.show',compact('validationchange','info'));
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
        if ($user->image== 'avatar.png') {
            $user->image=$validationchange->image;
        }else {
            Storage::disk('public')->delete($user->image);
            $user->image=$validationchange->image;
        }
        $user->save();
        $validationchange->delete();
        return redirect()->route('validationchange.index');
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
        return redirect()->route('validationchange.index');

    }
}
