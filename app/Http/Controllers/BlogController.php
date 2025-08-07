<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //Blog Categories
    public function index()
    {
        $categories = BlogCategory::all();
        return view('superadmin.blog-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('superadmin.blog-categories.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255']);
        BlogCategory::create($request->only('title'));
        return redirect()->route('blog-categories.index')->with('success', 'Category created');
    }

    public function editCategory($id)
    {
        $category = BlogCategory::findOrFail($id);
        return view('superadmin.blog-categories.edit-category', compact('category'));
    }


    public function updateCategory(Request $request, $id)
    {
        $request->validate(['title' => 'required|string|max:255']);
        $category = BlogCategory::findOrFail($id);
        $category->update($request->only('title'));
        return redirect()->route('blog-categories.index')->with('success', 'Category updated');
    }

    public function destroyCategory($id)
    {
        BlogCategory::destroy($id);
        return back()->with('success', 'Category deleted');
    }

    public function createBlog()
    {
        $categories = BlogCategory::all();
        return view('superadmin.blogs.create', compact('categories'));
    }

    public function storeBlog(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'content' => 'required|string',
            'image' => 'nullable|image|max:5020|mimes:jpeg,png,jpg,webp',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $data['user_id'] = auth()->id();

        Blog::create($data);

        return redirect()->route('superadmin.blogs.index')->with('success', 'Blog created successfully');
    }

    public function publish($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = 'published';
        $blog->save();

        return back()->with('success', 'Blog published');
    }

    public function unpublish($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = 'unpublished';
        $blog->save();

        return back()->with('success', 'Blog unpublished');
    }


    // List all blogs
    public function listAllBlogs()
    {
        $blogs = Blog::with('category', 'author')->get();
        return view('superadmin.blogs.index', compact('blogs'));
    }



    public function blogs()
    {
        $blogs = Blog::where('status', 'published')->latest()->get();
        return view('blogs.index', compact('blogs'));
    }


    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view('superadmin.blogs.edit', compact('blog', 'categories'));
    }

    public function updateBlog(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5020',
        ]);

        if ($request->hasFile('image')) {
            // Optional: delete old image if needed
            if ($blog->image && \storage::disk('public')->exists($blog->image)) {
                \Storage::disk('public')->delete($blog->image);
            }

            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('superadmin.blogs.index')
            ->with('success', 'Blog updated successfully');
    }


    public function destroyBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return back()->with('success', 'Blog deleted');
    }




    public function blogDetail($slug)
    {
        $blog = Blog::with('category', 'author')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('blogs.blog-details', compact('blog'));
    }
}
