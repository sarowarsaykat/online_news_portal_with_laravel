<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class ShareCategories
{
    public function handle($request, Closure $next)
    {
        // Share categories globally
        View::share('categories', Category::latest()->get());

        return $next($request);
    }
}

