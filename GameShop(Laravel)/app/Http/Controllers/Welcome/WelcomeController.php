<?php

namespace App\Http\Controllers\Welcome;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\BodySetting;
use App\Brand;
use App\Admin_Contact_Info;
use App\Video_Games;
use App\Comments;
use App\News;
use App\Footer;

class WelcomeController extends Controller
{
    public function index()
    {	
        $tags = DB::table('nstag_setting')->where('user_id', 1)->where('page', 'main_page')->first();
        $body = BodySetting::find(1); 
    	$aci = Admin_Contact_Info::find(1);
        $videos = Video_Games::orderBy('id', 'desc')->take(3)->get();
        $comments = Comments::orderBy('id', 'desc')->take(8)->where('status', 1)->get();
        $blogs = News::orderBy('created_at', 'desc')->take(8)->get();
        $brand = Brand::find(1);
        $footer = Footer::find(1);
        return view('index', compact('aci', 'videos', 'body', 'brand', 'comments', 'blogs', 'footer', 'tags'));
    }

    public function portfolio()
    {
        $body = BodySetting::find(1);
    	if(Auth::guest() && $body->status == 0){
            return $this->index();
        }
        $tags = DB::table('nstag_setting')->where('user_id', 1)->where('page', 'portfolio_page')->first();
    	$g_videos = DB::table('video_games')->orderBy('id', 'desc')->paginate(5);
        $videos = Video_Games::orderBy('id', 'desc')->take(8)->get();
        $comments = Comments::orderBy('id', 'desc')->take(8)->where('status', 1)->get();
        $blogs = News::orderBy('created_at', 'desc')->take(8)->get();
        $brand = Brand::find(1);
        $footer = Footer::find(1);
        return view('games_body', compact('videos', 'brand', 'comments', 'blogs', 'g_videos', 'footer', 'tags'));
    }
}
