<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome()
    {
        // $announcements=Announcement::take(6)->get()->sortByDesc('created_at');
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at')->get();

        return view('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category)
    {
        
        $announcements = Announcement::where('is_accepted', true)->where('category_id',$category->id)->orderBy('created_at')->get();
        return view('categoryShow', compact('category','announcements'));
    }
    
    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(6);
        
      
        return view('announcements.index', compact('announcements'));
    }

    public function setLanguage($lang)
    { 
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
