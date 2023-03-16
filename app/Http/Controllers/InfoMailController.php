<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoRequest;
use App\Mail\InfoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InfoMailController extends Controller
{
    public function infoSend(InfoRequest $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'announcement_id' => $request->announcement_id,
            'announcement_title' => $request->announcement_title,

        ];

        Mail::to('admin@presto.it')->send(new InfoMail($details));
        return redirect()->back()->with(['success' => 'Richiesta informazioni inviata con successo']);
    }
}
