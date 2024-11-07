<?php

namespace App\Http\Controllers;

use view;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\SubComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $blogs = Blog::get();
        return view('1_WebFrontend.2_Pages.blogs', compact('blogs'));
    }

    public function blog_info($id)
    {
        $blog = Blog::find($id);
        $comments = Comment::where('blog_id', $id)->with('user')->with('sub_comments')->get();
        return view('1_WebFrontend.2_Pages.blogDetail', compact('blog', 'comments'));
    }

    public function comment(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        Comment::create([
            'comment' => $validatedData['comment'],
            'blog_id' => $request->blog_id,
            'user_id' => Auth::user()->id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comment was added successfully.',
        ], 200);
    }

    public function edit_comment(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $comment = Comment::find($request->id);

        $comment->update([
            'comment' => $validatedData['comment']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comment was updated successfully.',
        ], 200);
    }

    public function delete_comment(Request $request)
    {
        $comment = Comment::findOrFail($request->id);
        $comment->sub_comments()->delete();
        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comment was deleted successfully.',
        ], 200);
    }

    public function subcomment(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        SubComment::create([
            'comment' => $validatedData['comment'],
            'comment_id' => $request->comment_id,
            'user_id' => Auth::user()->id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comment was added successfully.',
        ], 200);
    }

    public function edit_subcomment(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $comment = SubComment::find($request->id);

        $comment->update([
            'comment' => $validatedData['comment']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comment was updated successfully.',
        ], 200);
    }

    public function delete_subcomment(Request $request)
    {
        $comment = SubComment::findOrFail($request->id);
        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comment was deleted successfully.',
        ], 200);
    }
}
