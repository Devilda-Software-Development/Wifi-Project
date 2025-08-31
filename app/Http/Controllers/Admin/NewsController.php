<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all()->sortByDesc('created_at');
        return view('admin.pages.news', [
            'news' => $news
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ], [
            'title.required' => 'Title is required',
            'content.required' => 'Content is required',
        ]);

        $news = new News();
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->slug = Str::slug($request->input('title'), '-');
        $news->save();

        return redirect()->back()->with('success', 'News created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ], [
            'title.required' => 'Title is required',
            'content.required' => 'Content is required',
        ]);

        $news = News::findOrFail($id);
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->slug = Str::slug($request->input('title'), '-');
        $news->save();

        return redirect()->back()->with('success', 'News updated successfully.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->back()->with('success', 'News deleted successfully.');
    }
}
