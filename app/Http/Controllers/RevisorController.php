<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index()
    {   
        $revisor = Auth::user();
        $announcment_to_check = Announcement::where('is_accepted', null)
                                ->where('user_id', '!=', $revisor->id)
                                ->get();
       
        return view('revisor.index', compact('announcment_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('success', 'Annuncio accettato');
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        $announcement->increment('count_rejected');
        return redirect()->back()->with('success', 'Annuncio rifiutato');
    }

    public function becomeRevisor()
    {  
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with(['success' => 'Richiesta di diventare revisore inviata con successo']);      
    }

    public function makeRevisor(User $user)
    {   
        Artisan::call('presto:makeUserRevisor', ['email'=>$user->email]);
        return redirect('/')->with('message', 'Complimenti! L\'utente è diventato revisore');
    }

}
