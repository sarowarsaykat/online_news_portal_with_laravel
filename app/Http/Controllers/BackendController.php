<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function Backend(){
        $totalNews = News::count();
        $todaysNews = News::whereDate('created_at', today())->count();
        $totalCategories = Category::count();
        $totalMessages = Contact::count();
        return view('backend.backend', compact('totalNews', 'todaysNews', 'totalCategories', 'totalMessages'));
    }

    //dashbord
    

    
}
