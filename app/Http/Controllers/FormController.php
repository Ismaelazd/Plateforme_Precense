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
        $unread = Form::where('read',false)->get();
        $deletedMsg = Form::onlyTrashed()->get();
        return view('message.index',compact('messages','unread','deletedMsg'));
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
        $formulaire->read = false;
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
        
        
        $form->read = true;
        $form->save();
        $unread = Form::where('read',false)->get();
        $deletedMsg = Form::onlyTrashed()->get();

        return view('message.show',compact('form','unread','deletedMsg'));
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

 
    // pour delete et donc mettre dans la corbeil

    public function destroy(Form $form)
    {
        $form->delete();
        return  redirect()->route('form.index');
    }

    // pour delete definitivement 
    public  function  forceDestroy( $id)
    {
        $form = Form::withTrashed()->whereId($id)->firstOrFail();
        Form::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
        return  back()->with('info','Le message a été supprimé définitivement');
    }

    // pour restaurer 
    public  function  restore( $id)
    {
        Form::withTrashed()->whereId($id)->firstOrFail()->restore();
        return  back()->with('info','Le message a été restauré');
    }
    // pour afficher le tableau des services deleté 
    public  function  trash(){
        
        $messages = Form::onlyTrashed()->get();
        $unread = Form::where('read',false)->get();
        
        return  view('message/trashed',compact('unread','messages'));
    }
}
