<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use App\Mail\FormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Form::all();
        return view('message.index',compact('messages'));
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
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:105',
            'name' => 'required',
            'firstname' => 'required',
            'sujet' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->to(url()->previous().'#footer')
                        ->withErrors($validator)
                        ->withInput();
        }
   
        $formulaire = new Form();
        $formulaire->name = $request->input('name');
        $formulaire->firstname = $request->input('firstname');
        $formulaire->email = $request->input('email');
        $formulaire->sujet = $request->input('sujet');
        $formulaire->message = $request->input('message');
        $formulaire->save();

        Mail::to($formulaire->email)->send(new FormMail($formulaire));
        return redirect()->to(url()->previous().'#footer')->with('formSent','Votre message a bien été envoyé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        $messages = Form::all();
        return view('message.show',compact('form','messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }
}
