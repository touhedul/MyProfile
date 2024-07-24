<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Helpers\FileHelper;
use App\Http\Requests;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Http\Controllers\AppBaseController;

class BlogController extends AppBaseController
{

    private $icon = 'pe-7s-menu';


    public function index(BlogDataTable $blogDataTable)
    {
        $this->authorize('Blog-view');
        $icon = $this->icon;
        return $blogDataTable->render('admin.blogs.index', compact('icon'));
    }


    public function create()
    {
        $this->authorize('Blog-create');
        return view('admin.blogs.create')->with('icon', $this->icon);
    }


    public function store(BlogCreateRequest $request)
    {
        $this->authorize('Blog-create');
        $imageName = FileHelper::uploadImage($request);
        Blog::create(array_merge($request->all(), ['image' => $imageName]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.blogs.index'));
    }


    public function show(Blog $blog)
    {
        $this->authorize('Blog-view');
        return view('admin.blogs.show', compact('blog'))->with('icon', $this->icon);
    }


    public function edit(Blog $blog)
    {
        $this->authorize('Blog-update');
        return view('admin.blogs.edit', compact('blog'))->with('icon', $this->icon);
    }


    public function update(Blog $blog, BlogUpdateRequest $request)
    {
        $this->authorize('Blog-update');
        $imageName = FileHelper::uploadImage($request, $blog);
        $blog->fill(array_merge($request->all(), ['image' => $imageName]))->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.blogs.index'));
    }


    public function destroy(Blog $blog)
    {
        $this->authorize('Blog-delete');
        FileHelper::deleteImage($blog);
        $blog->delete();
    }
}
