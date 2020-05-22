<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Event;
use Carbon\Carbon;

class PDFMaker extends Controller
{
    function gen($id){
        /**
         * domPDF
         */
        $pdf = App::make('dompdf.wrapper');
        $events = Event::where('end','<',new Carbon( 'friday 23:00:00'))->where('start','>',new Carbon( 'last monday 05:00:00'))->where('classe_id',$id)->get();

        $pdf->loadView('pdf.weekly',compact('events'));
        return $pdf->stream();
    }
}
