<?php

namespace App\Http\Controllers\Admin\abdudhabi;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Session\Session;

class BlogController extends Controller
{
    public function index()
    {

        return view('pages.blog.index', [
            "data" => Blog::all(),
        ]);
        
    }





    public function store(Request $request)
    {
        // Validate the incoming request with image
        $validatedData = $request->validate([
            'title' => 'required',
            'placefor' => 'required',
            'content' => 'required',
            'blog_img' => 'nullable', // Validation rule for the image
        ]);

        try {
            $blog = new Blog();
            $blog->title = $validatedData['title'];
            $blog->placefor = $validatedData['placefor'];
            $blog->content = $validatedData['content'];

            // Handle blog image upload
            if ($request->hasFile('blog_img')) {
                // Store the image and set the 'blog_img' attribute to the path
                $blog->blog_img = $request->file('blog_img')->store('storage/uploads/blogs');
            }

            $blog->save();
            session()->flash('success', 'Blog created successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error creating blog: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while creating the blog. Please try again.');
            return redirect()->back();
        }
    }





    // edit blog

    public function edit($id)
    {
        $record = Blog::findOrFail($id);
        // Fetch any additional data needed for the form here if required
        return view('pages.blog._edit', ['record' => $record]);
    }





    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'placefor' => 'required|in:dubai,abudhabi',
    //         'description' => 'required', // Corrected field name to description
    //     ]);

    //     $blog = Blog::findOrFail($id);

    //     $blog->update([
    //         'title' => $request->title,
    //         'placefor' => $request->placefor,
    //         'content' => $request->description, // Corrected field name to description
    //     ]);

    //     session()->flash('message', 'Blog updated successfully!');
    //     return redirect()->back();
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'placefor' => 'required|in:dubai,abudhabi',
            'description' => 'required',
            'blog_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for the image
        ]);


        $blog = Blog::findOrFail($id);

        $blog->title = $request->title;
        $blog->placefor = $request->placefor;
        $blog->content = $request->description;

        // Handle blog image update
        if ($request->hasFile('blog_img')) {
            // Delete the old image if exists
            if ($blog->blog_img && Storage::exists($blog->blog_img)) {
                Storage::delete($blog->blog_img);
            }

            // Store the new image and update the blog_img attribute
            $path = $request->file('blog_img')->store('storage/uploads/blogs', 'public');
            $blog->blog_img = $path;
        }

        $blog->save();

        return redirect()->back()->with('message', 'Blog updated successfully!');
    }


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        session()->flash('message', 'Blog deleted successfully.');
        return redirect()->back();
    }
}
