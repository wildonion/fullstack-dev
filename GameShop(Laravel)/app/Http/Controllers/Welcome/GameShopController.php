<?php

// a controller for like, dislike and comments on a video game

namespace App\Http\Controllers\Welcome;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Video_Games;
use App\Admin_Contact_Info;
use App\Comments;
use App\News;
use App\Likes;
use App\ShopSetting;
use App\Brand;
use App\Footer;
use App\BodySetting;
use App\Helpers\FilterString;
//use App\Helpers\IpDetails;

class GameShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 // =====================SHOP-STORE-VIEW==========================
    public function shop()
    {
        $body = BodySetting::find(1);
        if(Auth::guest() && $body->status == 0){
            return $this->gotoIndex();
        }
        $tags = DB::table('nstag_setting')->where('user_id', 1)->where('page', 'shop_page')->first();        
        $videos = Video_Games::orderBy('id', 'desc')->take(8)->get();
        $comments = Comments::orderBy('id', 'desc')->take(8)->where('status', 1)->get();
        $blogs = News::orderBy('created_at', 'desc')->take(8)->get();
        $brand = Brand::find(1);
        $footer = Footer::find(1);
        $shop = ShopSetting::find(1);
        return view('shopstore_body', 
            compact('shop', 'tags', 'videos', 'comments', 'blogs', 'brand', 'footer'));
    }
 // ==============================================================
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // =====================STORE-COMMENTS==========================
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store a comment on a specific video blog 
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required'
        ]); 

        $comment = new Comments;
        $comment->user_ip = $request->user_ip;
        $comment->agent_info = $request->agent_info;
        $comment->news_ID = Crypt::decrypt($request->news_id);
        $comment->news_title = $request->news_title;
        $comment->news_title_F_User = $request->news_titleF_User; 
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->content = FilterString::censor($request->input('content'));

        $comment->save();
        return redirect()->back()->with('alert-success','نظر شما بعد از تایید توسط من نمایش داده خواهد شد');
    }
    // =====================SHOW-A-SINGLE-VIDEO-GAME==========================
    public function showonegame($id, $title)
    {
        $body = BodySetting::find(1);
        if(Auth::guest() && $body->status == 0){
            return $this->gotoIndex();
        }
        $id = Video_Games::where('title', $title)->orWhere('titleFUser', $title)->firstOrFail()->id;
        $video = Video_Games::findOrFail($id);
        $videos = Video_Games::orderBy('id', 'desc')->take(8)->get();
        $comments = Comments::orderBy('id', 'desc')->take(8)->where('status', 1)->get();
        $blogs = News::orderBy('created_at', 'desc')->take(8)->get();
        $brand = Brand::find(1);
        $footer = Footer::find(1);
        return view('game', compact('video', 'brand', 'videos', 'comments', 'blogs', 'footer'));
    }
    // =====================THE-RESULT-OF-USER-SEARCH==========================
    public function searchresult(Request $request){
        $body = BodySetting::find(1);
        if(Auth::guest() && $body->status == 0){
            return $this->gotoIndex();
        }
        if($request->session()->has('game') && $request->session()->get('game') == 'true'){
            if($request->games_search){
                $q = $request->games_search;
                $tags = DB::table('nstag_setting')->where('user_id', 1)->where('page', 'portfolio_page')->first();
                $videos = Video_Games::orderBy('id', 'desc')->take(8)->get();
                $comments = Comments::orderBy('id', 'desc')->take(8)->where('status', 1)->get();
                $blogs = News::orderBy('created_at', 'desc')->take(8)->get();
                $brand = Brand::find(1);
                $footer = Footer::find(1);
                $games = DB::table('video_games')
                ->where('title', 'LIKE', '%' . str_replace(' ', '-', $request->games_search) . '%')
                ->orWhere('titleFUser','LIKE','%'. str_replace(' ', '-', $request->games_search) .'%')->paginate(5);
                return view('game_search_result_body', 
                    compact('games', 'videos', 'comments', 'blogs', 'brand', 'footer', 'tags', 'q'));
             } if($request->games_search == ''){
                return view('please_search');
           } 
       } 
        if($request->session()->has('blog') && $request->session()->get('blog') == 'true'){
          if($request->blogs_search){
                $q = $request->blogs_search;
                $tags = DB::table('nstag_setting')->where('user_id', 1)->where('page', 'blogs_page')->first();
                $videos = Video_Games::orderBy('id', 'desc')->take(8)->get();
                $comments = Comments::orderBy('id', 'desc')->take(8)->where('status', 1)->get();
                $blogs = News::orderBy('created_at', 'desc')->take(8)->get();
                $brand = Brand::find(1);
                $footer = Footer::find(1);
                $Blogs = DB::table('latest_news')
                ->where('title', 'LIKE', '%' . str_replace(' ', '-', $request->blogs_search) . '%')
                ->orWhere('titleF_User','LIKE','%'.str_replace(' ', '-', $request->blogs_search).'%')->paginate(5);
                return view('blog_search_result_body', 
                    compact('Blogs', 'videos', 'comments', 'blogs', 'brand', 'footer', 'tags', 'q'));
          } if($request->blogs_search == ''){
                return view('please_search');
          }
       } 
    }
    // ===========================CONTACT-ME-PAGE==============================
    public function contactshow(){
        $body = BodySetting::find(1);
        if(Auth::guest() && $body->status == 0){
            return $this->gotoIndex();
        }
        $tags = DB::table('nstag_setting')->where('user_id', 1)->where('page', 'contact_page')->first();
        $acis = Admin_Contact_Info::all();
        $brand = Brand::find(1);
        $footer = Footer::find(1);
        return view('contact_body', compact('acis', 'brand', 'footer', 'tags'));
    }
    // =====================SHOW-ALL-BLOGS==========================
    public function newsshow(){
        $body = BodySetting::find(1);
        if(Auth::guest() && $body->status == 0){
            return $this->gotoIndex();
        }
        $tags = DB::table('nstag_setting')->where('user_id', 1)->where('page', 'blogs_page')->first();
        $news = DB::table('latest_news')->orderBy('id', 'desc')->paginate(5);
        $videos = Video_Games::orderBy('id', 'desc')->take(8)->get();
        $comments = Comments::orderBy('id', 'desc')->take(8)->where('status', 1)->get();
        $blogs = News::orderBy('created_at', 'desc')->take(8)->get();
        $brand = Brand::find(1);
        $footer = Footer::find(1);
        return view('blogs_body', compact('news', 'brand', 'videos', 'comments', 'blogs', 'footer', 'tags'));
    }
    // =====================BEST-OF-ALL-GAMES==========================
    public function bestOfgames(){
        $body = BodySetting::find(1);
        if(Auth::guest() && $body->status == 0){
            return $this->gotoIndex();
        }
        $best_of_games = DB::table('video_games')->orderBy('id', 'desc')->paginate(5);
        $tags = DB::table('nstag_setting')->where('user_id', 1)->where('page', 'portfolio_page')->first();
        $videos = Video_Games::orderBy('id', 'desc')->take(8)->get();
        $comments = Comments::orderBy('id', 'desc')->take(8)->where('status', 1)->get();
        $blogs = News::orderBy('created_at', 'desc')->take(8)->get();
        $brand = Brand::find(1);
        $footer = Footer::find(1);
        return view('best_of_games', 
            compact('best_of_games', 'videos', 'comments', 'blogs', 'footer', 'tags', 'brand'));
    }
    // =====================BEST-OF-ALL-BLOGS==========================
    public function bestOfblogs(){
        $body = BodySetting::find(1);
        if(Auth::guest() && $body->status == 0){
            return $this->gotoIndex();
        }
        $best_of_blogs = DB::table('latest_news')->orderBy('id', 'desc')->paginate(5);
        $tags = DB::table('nstag_setting')->where('user_id', 1)->where('page', 'blogs_page')->first();
        $videos = Video_Games::orderBy('id', 'desc')->take(8)->get();
        $comments = Comments::orderBy('id', 'desc')->take(8)->where('status', 1)->get();
        $blogs = News::orderBy('created_at', 'desc')->take(8)->get();
        $brand = Brand::find(1);
        $footer = Footer::find(1);
        return view('best_of_blogs', 
            compact('best_of_blogs', 'videos', 'comments', 'blogs', 'footer', 'tags', 'brand'));
    }
    // =====================SHOW-A-SINGLE-BLOG==========================
    public function showonenews($id, $title){
        $body = BodySetting::find(1);
        if(Auth::guest() && $body->status == 0){
            return $this->gotoIndex();
        }
        $news = News::findOrFail(News::where('title', $title)->orWhere('titleF_User', $title)->firstOrFail()->id);
        $b_comments = News::find($id)->comments()->orderBy('id', 'desc')->where('status', 1)->get();
        $videos = Video_Games::orderBy('id', 'desc')->take(3)->get();
        $comments = Comments::orderBy('id', 'desc')->take(8)->where('status', 1)->get();
        $blogs = News::orderBy('created_at', 'desc')->take(3)->get();
        $brand = Brand::find(1);
        $footer = Footer::find(1);
        return view('blog', compact('news', 'b_comments', 'brand', 'comments', 'videos', 'blogs', 'footer'));
    }
    // =====================DOWNLOAD-VIDEO-GAME==========================
    public function download($id){
        $game = Video_Games::findOrFail($id);
        $download_path = base_path().'/public/uploads/videos/'.$game->video_game;
        return response()->download($download_path);
    }
    // =====================DOWNLOAD-VIDEO-BLOG==========================
    public function downloadblog($id){
        $news = News::findOrFail($id);
        $download_path = base_path().'/public/uploads/images/news/videos/'.$news->blog_video;
        return response()->download($download_path);
    }
    // =====================BLOG-LIKE-PROCCESS==========================
    public function like(Request $request) {
        
        if ($request->news_id != '') {
            
            $news_id = $request->news_id;
            $user_ip = $request->user_ip;
            

            if (DB::table('likes')->where('news_id', $news_id)->where('user_ip', $user_ip)->count() > 0) {
                DB::table('likes')->where('news_id', $news_id)->where('user_ip', $user_ip)->delete();
                return response()->json([
                    "result" => "1",
                    "isunlike" => "0",
                    "text" => "Like",
                    "number_of_likes" => DB::table('likes')->where('news_id', $request->news_id)->count()
                ]);

            } else {
                $like = new Likes;
                $like->user_ip = $user_ip;
                $like->news_id = $news_id;
                $like->save();
                return response()->json([
                    "result" => "1", 
                    "isunlike" => "1", 
                    "text" => "Unlike",
                    "number_of_likes" => DB::table('likes')->where('news_id', $request->news_id)->count()
                ]);
            }
            return response()->json([
                    "result" => "1", 
                    "isunlike" => "1", 
                    "text" => "Unlike",
                    "number_of_likes" => DB::table('likes')->where('news_id', $request->news_id)->count()
                ]);

        } else {
            return response()->json([
                    "result" => "0",
                    "number_of_likes" => DB::table('likes')->where('news_id', $request->news_id)->count()
                ]);
        }
    }
    // =====================BLOG-LIVE-SEARCH-SHOW==========================
    public function livesearchshow(){
        $body = BodySetting::find(1);
        if(Auth::guest() && $body->status == 0){
            return $this->gotoIndex();
        }
        return view('live-search');
    }
    // =====================BLOG-LIVE-SEARCH-PROCCESS==========================
    public function livesearch(Request $request){
        $search = $request->id;

        if (is_null($search))
        {
           echo "PLZ search sth!";        
        }
        else
        {
            // use join method to join tables as many as you want!
            // so, how to fetch data from two tables with one query in where clause??
            $posts = News::where('title', 'LIKE', '%' .str_replace(' ', '-', $search) . '%')
                    ->orWhere('titleF_User','LIKE','%'.str_replace(' ', '-', $search).'%')
                    ->get();

            return view('live-search-result')->withPosts($posts);
        }
    }
    // =====================CHECK-AUTH-USER==========================
    public function gotoIndex(){
        $tags = DB::table('nstag_setting')->where('user_id', 1)->where('page', 'main_page')->first();
        $body = BodySetting::find(1); 
        $aci = Admin_Contact_Info::find(1); // for about-me section in index page
        $videos = Video_Games::orderBy('id', 'desc')->take(3)->get();
        $comments = Comments::orderBy('id', 'desc')->take(8)->where('status', 1)->get();
        $blogs = News::orderBy('created_at', 'desc')->take(8)->get();
        $brand = Brand::find(1);
        $footer = Footer::find(1);
        return view('index', compact('aci', 'videos', 'body', 'brand', 'comments', 'blogs', 'footer', 'tags'));

    }
    
}
