<?php

namespace App\Http\Controllers;

use App\Http\Requests\RejectedRequest;
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

    public function showDetails (Announcement $announcement)
    {
        $revisor = Auth::user();
        if($announcement->is_accepted == null && $announcement->user_id !== $revisor->id){
            return view('revisor.showDetails', compact('announcement'));
        }else{
            return redirect()->route('revisor.index');
        }
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->route('revisor.index')->with('success', 'Annuncio accettato');
    }

    public function rejectAnnouncement(Announcement $announcement, RejectedRequest $request)
    {
        $announcement->setAccepted(false);
        $announcement->increment('count_rejected');
        $announcement->setRejectionReason($request->input('rejection_reason'));
        $announcement->save();
        return redirect()->route('revisor.index')->with('success', 'Annuncio rifiutato');
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
