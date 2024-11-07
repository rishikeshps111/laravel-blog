<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::paginate(10)->fragment('blogs');
        return view('pages.blog.blog', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();

        $image = $data['image'] ?? null;
        if($image){
            $data['image'] = $image->store('blog/'.Str::random(), 'public');
        }
        Blog::create($data);
        return to_route('blog.index')->with('success', 'Blog was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        // $blog = Blog::find($blog);
        return view('pages.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->validated();
        // dd($data);
        $blog->update($data);
        $image = $data['image'] ?? null;
        if($image){
            if($blog->image){
                Storage::disk('public')->deleteDirectory($blog->image);
            }
            $data['image'] = $image->store('project/'.Str::random(), 'public');
        }

        return to_route('blog.index')->with('success', 'Blog was Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $name = $blog->name;
        $blog->delete();
        if ($blog->image) {
            Storage::disk('public')->deleteDirectory(dirname($blog->image));
        }
        return to_route('blog.index')
            ->with('success', "Blog \"$name\" was deleted");
    }
}
