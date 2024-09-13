<?php

namespace App\Http\Controllers\Site\abdudhabi;

use App\Models\Blog;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as FacadesRequest;

class blogIndexController extends Controller
{
    public function blogIndex()
    {


        $allblog = Blog::all();



        return view("site.abudhabi.blogs.index", [
            'blogs' => $allblog,
            'allblog' => $allblog
        ]);
    }


    

    public function blogDetail($id)
{
    // Retrieve the blog post by ID
    $blog = Blog::findOrFail($id);

    $allblog = Blog::all();


    
    // Get the current URL
    $currentUrl = FacadesRequest::url();

    // Determine the place based on the URL
    if (strpos($currentUrl, 'abudhabi') !== false) {
        $placeFor = 'abu_dhabi';
    } elseif (strpos($currentUrl, 'dubai') !== false) {
        $placeFor = 'dubai';
    } else {
        
        $placeFor = null;

    }

    // Filter social media links based on the determined place
    $socialMedia = $placeFor ? SocialMedia::where('placefor', $placeFor)->get() : collect([]);



    // Pass the blog post and filtered social media links to the view
    return view('site.abudhabi.blogs.details', compact('blog', 'socialMedia', 'allblog'));
}


}
