<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Validator;
use Toastr;
use File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::with('category')->latest()->get();
        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:255',
                'category_id' => 'required|integer',
                'date' => 'required|date',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'slider' => 'required|boolean',
                'is_active' => 'boolean',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed');
            }
            return back()->withInput();
        }

        $news = new News();
        $news->title = $request->title;
        $news->category_id = $request->category_id;
        $news->date = $request->date;
        $news->description = $request->description;
        // Handle image upload if available
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/news/', $filename);
            $news->image = $filename;
        }
        $news->slider = (bool)$request->slider;
        $news->is_active = $request->is_active ?? true;
        $news->created_by = auth()->id();
        $save = $news->save();
        if ($save) {
            Toastr::success('Success', 'News added successfully!');
            return redirect()->route('news.index');
        } else {
            Toastr::error('Error', 'Any Problem Occured');
            return redirect()->back();
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::all();

        return view('backend.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:255',
                'category_id' => 'required|integer',
                'date' => 'required|date',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'slider' => 'required|boolean',
                'is_active' => 'boolean',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed');
            }
            return back()->withInput();
        }

        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->category_id = $request->category_id;
        $news->date = $request->date;
        $news->description = $request->description;
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            $destination = 'uploads/news/' . $news->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/news/', $filename);
            $news->image = $filename;
        }
        $news->slider = (bool)$request->slider;
        $news->is_active = $request->is_active ?? true;
        $news->updated_by = auth()->id();
        $save = $news->save();
        if ($save) {
            Toastr::success('Success', 'News updated successfully!');
            return redirect()->route('news.index');
        } else {
            Toastr::error('Error', 'Any Problem Occured');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        // Delete the news image if it exists
        $imagePath = 'uploads/news/' . $news->image;
        if ($news->image && File::exists($imagePath)) {
            File::delete($imagePath); // Delete the image file
        }

        $delete = $news->delete();
        if ($delete) {
            Toastr::success('Success', 'News deleted successfully!');
            return redirect()->route('news.index');
        } else {
            Toastr::error('Error', 'Any Problem Occured');
            return redirect()->back();
        }
    }

}
