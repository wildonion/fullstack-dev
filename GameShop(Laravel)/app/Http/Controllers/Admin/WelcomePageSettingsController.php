<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\News;
use App\BodySetting;
use App\Brand;
use App\Footer;
// use App\NSTag;

class WelcomePageSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdminDashboard.WelcomePageSettingsShow');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminDashboard.HeaderLatestNews');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tags' => 'required',
            'tagsF_User' => 'required',
            'meta_desc' => 'required',
            'meta_descF_User' => 'required',
            'title' => 'required|unique:latest_news|max:255',
            'description' => 'required',
            'titleF_User' => 'required|unique:latest_news|max:255',
            'descriptionF_User' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'blog_video' => 'nullable|mimetypes:video/mp4|max:250000'
        ]);

        $videopath = base_path('/public/uploads/images/news/videos/');

        $news = new News;
        $news->tags = $request->tags;
        $news->tagsF_User = $request->tagsF_User;
        $news->meta_desc = $request->meta_desc;
        $news->meta_descF_User = $request->meta_descF_User;
        $news->title        = Str::slug_utf8($request->title);
        $news->description  = $request->input('description');
        $news->titleF_User        = Str::slug_utf8($request->titleF_User);
        $news->descriptionF_User  = $request->input('descriptionF_User');

        //-----------------------------------------------------------------

        if($request->hasFile('picture')){ 
            // store image
            $imageName = $request->file('picture')->getClientOriginalName();
            $path = base_path('/public/uploads/images/news/');
            $request->file('picture')->move($path , $imageName);
            $news->picture = $imageName;
        } if($request->hasFile('blog_video')){

            $videoName = $request->file('blog_video')->getClientOriginalName();
            $request->file('blog_video')->move($videopath , $videoName);
            $news->blog_video = $videoName;

            } 

        //-----------------------------------------------------------------
            

        $news->save();
        return redirect('/home')->with('alert-success','Blog Hasbeen Added !');
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
        $news = News::find($id);
        return view('AdminDashboard.EditNews', compact('news'));
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
            'tags' => 'required',
            'tagsF_User' => 'required',
            'meta_desc' => 'required',
            'meta_descF_User' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'titleF_User' => 'required|max:255',
            'descriptionF_User' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'blog_video' => 'nullable|mimetypes:video/mp4|max:250000'
        ]); 

          $videopath = base_path('/public/uploads/images/news/videos/');

        $news = News::findOrFail($id);
        $news->meta_desc = $request->meta_desc;
        $news->meta_descF_User = $request->meta_descF_User;
        $news->tags = $request->tags;
        $news->tagsF_User = $request->tagsF_User;
        $news->title        = Str::slug_utf8($request->title);
        $news->description  = $request->input('description');
        $news->titleF_User        = Str::slug_utf8($request->titleF_User);
        $news->descriptionF_User  = $request->input('descriptionF_User');

        //-----------------------------------------------------------------

        if($request->hasFile('picture')){ 
            // store image
            $imageName = $request->file('picture')->getClientOriginalName();
            $path = base_path('/public/uploads/images/news/');
            $request->file('picture')->move($path , $imageName);
            if($news->picture != ''){
                unlink(base_path().'/public/uploads/images/news/'.$news->picture);    
            } 
            $news->picture = $imageName;
        }

            if($request->hasFile('blog_video')){
            

            $videoName = $request->file('blog_video')->getClientOriginalName();
                $request->file('blog_video')->move($videopath , $videoName);
                if($news->blog_video != ''){
                    unlink($videopath.$news->blog_video);    
                }
                $news->blog_video = $videoName;

            } 

        //-----------------------------------------------------------------

        $news->save();
        return redirect('/home')->with('alert-success','News Hasbeen Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if($news->picture != ''){
            unlink(base_path().'/public/uploads/images/news/'.$news->picture);    
        } if($news->blog_video != ''){
            unlink(base_path().'/public/uploads/images/news/videos/'.$news->blog_video);    
        }
        $news->delete();
        DB::table('comments')->where('news_ID', $id)->delete();
        return redirect('/home')->with('alert-danger','Blog Hasbeen Deleted!');
    }

    public function latestnewsshow(){
        $news = DB::table('latest_news')->orderBy('created_at', 'desc')->paginate(5);
        return view('AdminDashboard.ShowNews', ['news' => $news]);
    }

    public function headershow(){
        return view('AdminDashboard.Header');
    }

    public function footershow($id){
        $footer = Footer::find($id);
        return view('AdminDashboard.Footer', compact('footer'));
    }

    public function tagsshow($id){
        $tags = DB::table('nstag_setting')->where('user_id', $id)->get();
        return view('AdminDashboard.Tags', compact('tags'));
    }

    public function tagupdate(Request $request, $id){
        $this->validate($request, [
            'tags' => 'required',
            'tagsF_User' => 'required',
            'tagsF_User' => 'required',
            'meta_desc' => 'required'
        ]);
        
        $page = $request->page;
        
        DB::table('nstag_setting')->where('user_id', $id)->where('page', $page)
        ->update(['tags' => $request->tags, 
                  'tagsF_User' => $request->tagsF_User,
                  'meta_desc' => $request->meta_desc,
                  'meta_descF_User' => $request->meta_descF_User]);
    return redirect()->action('Admin\WelcomePageSettingsController@tagsshow', ['id' => $id])
     ->with('alert-success','Meta Tags For '.$page.' Hasbeen Updated !');

    }

    public function updatefooter(Request $request, $id){
        $this->validate($request, [
            'description' => 'required',
            'descriptionF_User' => 'required'
        ]);

        $footer = Footer::findOrFail($id);
        $footer->descriptionF_User = $request->input('descriptionF_User');
        $footer->description = $request->input('description');

        $footer->save();
        return redirect('/home')->with('alert-success','Footer Hasbeen Updated !');

    }

    public function showoneblog($id){
        $news = News::find($id);
        return view('AdminDashboard.ShowOneNews', compact('news'));
    }

    public function bodysettingshow($id){
        $body = BodySetting::find($id);
        return view('AdminDashboard.BodySetting',  compact('body'));   
    }

    public function disablebody(Request $request, $id){
        $this->validate($request, [
            'title' => 'nullable|max:255',
            'description' => 'required',
            'titleF_User' => 'nullable|max:255',
            'descriptionF_User' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384'
            
        ]); 

        $body = BodySetting::findOrFail($id);

        if($request->title != ''){
            $body->title = $request->title;
        } if($request->description != ''){
            $body->description = $request->description;
        } if($request->titleF_User != ''){
            $body->titleF_User = $request->titleF_User;
        } if($request->descriptionF_User != ''){
            $body->descriptionF_User = $request->descriptionF_User;
        }

        $body->status = 0;

        if($request->hasFile('picture')) {
            // store image
            $imageName = $request->file('picture')->getClientOriginalName();
            $path = base_path() . '/public/uploads/images/body_setting/';
            $request->file('picture')->move($path , $imageName);
            if($body->picture != ''){
                unlink($path.$body->picture);    
            }
            $body->picture = $imageName;
        } 

        $body->save();
        return redirect('/home')->with('alert-success','Site Hasbeen Deactivated !');

    }

    public function enablebody($id){

        $body = BodySetting::findOrFail($id);
        $body->status = 1;
   
        $body->save();
        return redirect('/home')->with('alert-success','Site Hasbeen Activated !');

    }

    public function updatebrandshow($id){
        $brand = Brand::find($id);
        return view('AdminDashboard.BrandSetting',  compact('brand'));
    }

    public function updatebrand(Request $request, $id){
        $this->validate($request, [
            'brand' => 'nullable',
            'brandF_User' => 'nullable',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384'
        ]);
        
        $brand = Brand::findOrFail($id);
        $brand->brand = $request->input('description');
        $brand->brandF_User = $request->input('descriptionF_User');

        if($request->hasFile('picture')) {
            // store image
            $imageName = $request->file('picture')->getClientOriginalName();
            $path = base_path() . '/public/uploads/images/brand/';
            $request->file('picture')->move($path , $imageName);
            if($brand->picture != ''){
                unlink($path.$brand->picture);    
            }
            $brand->picture = $imageName;
        } 

        $brand->save();
        return redirect('/home')->with('alert-success','Brand Hasbeen Updated !');
    }

    public function deleteall(){
        $image_dir = base_path().'/public/uploads/images/news';
        $video_dir = base_path().'/public/uploads/images/news/videos';
        if(file_exists($video_dir)){
            array_map('unlink', glob("$video_dir/*.*"));
            rmdir($video_dir);
        } if(file_exists($image_dir)){
            array_map('unlink', glob("$image_dir/*.*"));
            rmdir($image_dir);
        } 

        DB::table('comments')->delete();
        DB::table('latest_news')->delete();
        
        return redirect('/home')->with('alert-danger','All Data Hasbeen Deleted Successfully!');
    }

}
