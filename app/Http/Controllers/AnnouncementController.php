<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function createAnnouncement()
    {
        return view('announcements.create');
    }

    public function showAnnouncement(Announcement $announcement)
    {   
        if($announcement->is_accepted){
            return view('announcements.announcementShow', compact('announcement'));
        }else{
            abort(403);
        }
    }

    public function indexAnnouncements()
    {
        $announcements = Announcement::where('is_accepted', true)->paginate(10);
        return view('announcements.index', compact('announcements'));
    }
}
