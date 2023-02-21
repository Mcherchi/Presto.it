<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class PagesController extends Controller
{
    public function index()
    {
        $announcements = Announcement::take(6)->get()->sortByDesc('created_at');      
        return view('pages.index',compact('announcements'));
    }
}
