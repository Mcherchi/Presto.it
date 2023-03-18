<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Category;

class PagesController extends Controller
{
    public function index()
    {   
        $announcements = Announcement::where('is_accepted', true)->take(6)->get()->sortByDesc('created_at');      
        return view('pages.index',compact('announcements'));
    }

    public function aboutUs()
    {
        return view('pages.aboutUs');
    }
    
    public function categoryShow(Category $category)
    {
        $announcements = $category->announcements()->where('is_accepted', true)->get();
        return view('pages.categoryShow', compact('category','announcements'));
    }

    public function welcome()
    {
        return view('pages.welcome');
    }

    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);

        return view('announcements.index',compact('announcements'));
    }

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
