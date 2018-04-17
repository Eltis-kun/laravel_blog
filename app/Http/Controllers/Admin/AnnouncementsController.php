<?php

namespace App\Http\Controllers\Admin;

use App\Announcement;
use App\Tag;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::all();
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.announcements.index', [
            'announcements' => $announcements,
            'categories' => $categories,
            'tags' => $tags,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.announcements.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'date' => 'required',
            'image' => 'required|image',
        ]);
        $announcement = Announcement::add($request->all());
        $announcement->uploadImage($request->file('image'));
        $announcement->setCategory($request->get('category_id'));
        $announcement->setTags($request->get('tags'));
        $announcement->toggleStatus($request->get('status'));
        return redirect()->route('announcements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        $selectedTags = $announcement->tags->pluck('id')->all();
        return view('admin.announcements.edit', compact(
            'categories',
            'tags',
            'announcement',
            'selectedTags'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>'required',
            'content'   =>  'required',
            'date'  =>  'required',
            'image' =>  'nullable|image'
        ]);

        $announcement = Announcement::findOrFail($id);
        $announcement->edit($request->all());
        $announcement->uploadImage($request->file('image'));
        $announcement->setCategory($request->get('category_id'));
        $announcement->setTags($request->get('tags'));
        $announcement->toggleStatus($request->get('status'));

        return redirect()->route('announcements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Announcement::findOrFail($id)->remove();
        return redirect()->route('posts.index');
    }


}
