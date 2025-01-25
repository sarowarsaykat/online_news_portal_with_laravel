<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public static function lodeNewsUsingCategoryId($category_id){
        $news = News::where('category_id',$category_id)->get();
        return $news;
    }

    public static function popularNews(){
       $popular_news=  News::orderBy('views', 'desc')->take(5)->get();
       return $popular_news;
    }

    public static function latestNews(){
        $latest_news=  News::latest()->take(5)->get();
        return $latest_news;
     }
}