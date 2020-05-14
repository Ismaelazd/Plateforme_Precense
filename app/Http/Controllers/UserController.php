<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Presence;

class UserController extends Controller
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
        $totals = Presence::where('user_id',$user->id);
        $presences = $totals->where('etatfinal_id',1)->count();
        $retards = $totals->where('etatfinal_id',2)->count();
        $absences = $totals->where('etatfinal_id',3)->count();
        $justifiées = $totals->where('etatfinal_id',4)->count();
        $injustifiées = $totals->where('etatfinal_id',5)->count();
        $annoncées = $totals->where('etatfinal_id',6)->count();
        return view('user.show',compact('user','totals','total','presences','retards','absences','justifiées','injustifiées','annoncées')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
