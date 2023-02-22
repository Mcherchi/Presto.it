<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Category;

class PagesController extends Controller
{
    public function index()
    {   
        $announcements = Announcement::take(6)->get()->sortByDesc('created_at');      
        return view('pages.index',compact('announcements'));
    }
    
    public function categoryShow(Category $category)
    {
        return view('pages.categoryShow', compact('category'));
    }
}
