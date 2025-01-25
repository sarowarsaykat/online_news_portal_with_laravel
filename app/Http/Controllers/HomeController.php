<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        // Share categories with all views
        View::share('categories', Category::latest()->get());
    }

    // Home
    public function Home()
    {
        $data = [
            'sliders' => News::where('slider', 1)->latest()->take(5)->get(),
            'readNews' => News::orderBy('id', 'DESC')->take(9)->get(),
            'latest_news' => News::latest()->take(3)->get(),
        ];

        return view('home', $data);
    }

    // Category details
    public function categoryDetails($id)
    {
        $category = Category::findOrFail($id);
        $news = News::where('category_id', $id)->latest()->paginate(4);
        return view('category_details', compact('category', 'news'));
    }

    // News details
    public function newsDetails($id)
    {
        $news = News::findOrFail($id);
        // Increment the views count
        $news->increment('views');

        $data = [
            'news' => $news,
            'related_news' => News::where('category_id', $news->category_id)
                ->where('id', '!=', $news->id)
                ->take(6)
                ->get(),
            'latest_news' => News::latest()->take(5)->get(),
        ];

        return view('news_details', $data);
    }

    // Search function
    public function searchNews(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query');

        // Search logic to look through title, description, and category name
        $news = News::query()
            ->where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhereHas('category', function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%');
            })
            ->latest()
            ->paginate(10);

        // Return search results to the view
        return view('search_results', compact('news'));
    }

    // Contact Us
    public function showForm()
    {
        return view('contact');
    }
}
