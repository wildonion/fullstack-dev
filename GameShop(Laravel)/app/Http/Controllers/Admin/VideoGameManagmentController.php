<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Video_Games;
use App\News;
use App\Comments;

class VideoGameManagmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show all video games with pageination and visitor counter
        $games = DB::table('video_games')->orderBy('id', 'desc')->paginate(5);
        return view('AdminDashboard.ShowGames', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create a video game, we're gonna use the store function to save a video game
        return view('AdminDashboard.AddGames');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store a video game
        $this->validate($request, [
            'tags' => 'required',
            'meta_desc' => 'required',
            'meta_descF_User' => 'required',
            'tagsF_User' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'titleF_User' => 'required|max:255',
            'descriptionF_User' => 'required',
            'picture_game_n1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'picture_game_n2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'picture_game_n3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'picture_game_n4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'picture_game_n5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'picture_game_n6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'caption_n2' => 'required|max:255',
            'caption_n3' => 'required|max:255',
            'caption_n4' => 'required|max:255',
            'caption_n2F_User' => 'required|max:255',
            'caption_n3F_User' => 'required|max:255',
            'caption_n4F_User' => 'required|max:255',
            'video_game' => 'required|mimetypes:video/mp4|max:250000'
        ]);

        $video = new Video_Games;
        $video->meta_desc = $request->meta_desc;
        $video->meta_descF_User = $request->meta_descF_User;
        $video->tags = $request->tags;
        $video->tagsF_User = $request->tagsF_User;
        $video->title        = Str::slug_utf8($request->title);
        $video->description  = $request->input('description');
        $video->titleFUser = Str::slug_utf8($request->titleF_User); 
        $video->descriptionFUser = $request->input('descriptionF_User');
        $video->caption_n2 = $request->caption_n2;
        $video->caption_n3 = $request->caption_n3;
        $video->caption_n4 = $request->caption_n4;
        $video->caption_n2F_User = $request->caption_n2F_User;
        $video->caption_n3F_User = $request->caption_n3F_User;
        $video->caption_n4F_User = $request->caption_n4F_User;
    
        $imagepath = base_path() . '/public/uploads/images/video_games/';
        $videopath = base_path() . '/public/uploads/videos/';
        
        if($request->has('picture_game_n2_check')){
            $video->picture_game_n2_status = 1;
        } if($request->has('picture_game_n3_check')){
            $video->picture_game_n3_status = 1;
        } if($request->has('picture_game_n4_check')){
            $video->picture_game_n4_status = 1;
        } if($request->has('picture_game_n5_check')){
            $video->picture_game_n5_status = 1;
        } if($request->has('picture_game_n6_check')){
            $video->picture_game_n6_status = 1;
        }

        if($request->hasFile('picture_game_n1')){
                // store image
                $imageName = $request->file('picture_game_n1')->getClientOriginalName();
                $request->file('picture_game_n1')->move($imagepath , $imageName);
                $video->picture_game_n1 = $imageName;
            } if($request->hasFile('picture_game_n2')){
                // store image
                $imageName = $request->file('picture_game_n2')->getClientOriginalName();
                $request->file('picture_game_n2')->move($imagepath , $imageName);
                $video->picture_game_n2 = $imageName;
            } if($request->hasFile('picture_game_n3')){
                // store image
                $imageName = $request->file('picture_game_n3')->getClientOriginalName();
                $request->file('picture_game_n3')->move($imagepath , $imageName);
                $video->picture_game_n3 = $imageName;
            } if($request->hasFile('picture_game_n4')){
                // store image
                $imageName = $request->file('picture_game_n4')->getClientOriginalName();
                $request->file('picture_game_n4')->move($imagepath , $imageName);
                $video->picture_game_n4 = $imageName;
            } if($request->hasFile('picture_game_n5')){
                // store image
                $imageName = $request->file('picture_game_n5')->getClientOriginalName();
                $request->file('picture_game_n5')->move($imagepath , $imageName);
                $video->picture_game_n5 = $imageName;
            } if($request->hasFile('picture_game_n6')){
                // store image
                $imageName = $request->file('picture_game_n6')->getClientOriginalName();
                $request->file('picture_game_n6')->move($imagepath , $imageName);
                $video->picture_game_n6 = $imageName;

            }

            if($request->hasFile('video_game')){
                $videoName = $request->file('video_game')->getClientOriginalName();
                $request->file('video_game')->move($videopath , $videoName);
                $video->video_game = $videoName;
            }

        $video->save();
        return redirect('/home')->with('alert-success','New Game Hasbeen Added !'); 
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
        // show inforamtion of a video game in a page 
        // in order to edit a video game, we're gonna 
        // use the update function to update a video game
        $game = Video_Games::find($id);
        return view('AdminDashboard.EditGames', compact('game'));

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
        // update information of a video game
        // store a video game
        $this->validate($request, [
            'tags' => 'required',
            'tagsF_User' => 'required',
            'meta_desc' => 'required',
            'meta_descF_User' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'titleF_User' => 'required|max:255',
            'descriptionF_User' => 'required',
            'picture_game_n1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'picture_game_n2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'picture_game_n3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'picture_game_n4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'picture_game_n5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'picture_game_n6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'caption_n2' => 'nullable|max:255',
            'caption_n3' => 'nullable|max:255',
            'caption_n4' => 'nullable|max:255',
            'caption_n2F_User' => 'nullable|max:255',
            'caption_n3F_User' => 'nullable|max:255',
            'caption_n4F_User' => 'nullable|max:255',
            'video_game' => 'nullable|mimetypes:video/mp4|max:250000'
        ]);

        $video = Video_Games::findOrFail($id);
        $video->meta_desc = $request->meta_desc;
        $video->meta_descF_User = $request->meta_descF_User;
        $video->tags = $request->tags;
        $video->tagsF_User = $request->tagsF_User;
        $video->title        = Str::slug_utf8($request->title);
        $video->description  = $request->input('description');
        $video->titleFUser = Str::slug_utf8($request->titleF_User); 
        $video->descriptionFUser = $request->input('descriptionF_User');

        $imagepath = base_path() . '/public/uploads/images/video_games/';
        $videopath = base_path() . '/public/uploads/videos/';

        if($request->caption_n2 != ''){
            $video->caption_n2 = $request->caption_n2;
        } if($request->caption_n3 != ''){
            $video->caption_n3 = $request->caption_n3;
        } if($request->caption_n4 != ''){
            $video->caption_n4 = $request->caption_n4;
        } if($request->caption_n2F_User != ''){
            $video->caption_n2F_User = $request->caption_n2F_User;
        } if($request->caption_n3F_User != ''){
            $video->caption_n3F_User = $request->caption_n3F_User;
        } if($request->caption_n4F_User != ''){
            $video->caption_n4F_User = $request->caption_n4F_User;
        }

        if($request->has('picture_game_n2_check')){
            $video->picture_game_n2_status = 1;
        }
        if(!$request->has('picture_game_n2_check')){
            $video->picture_game_n2_status = 0;
        } 
        if($request->has('picture_game_n3_check')){
            $video->picture_game_n3_status = 1;
        }
        if(!$request->has('picture_game_n3_check')){
            $video->picture_game_n3_status = 0;
        } 
        if($request->has('picture_game_n4_check')){
            $video->picture_game_n4_status = 1;
        } 
        if(!$request->has('picture_game_n4_check')){
            $video->picture_game_n4_status = 0;
        }
        if($request->has('picture_game_n5_check')){
            $video->picture_game_n5_status = 1;
        } 
        if(!$request->has('picture_game_n5_check')){
            $video->picture_game_n5_status = 0;
        }
        if($request->has('picture_game_n6_check')){
            $video->picture_game_n6_status = 1;
        }
        if(!$request->has('picture_game_n6_check')){
            $video->picture_game_n6_status = 0;
        }


        if($request->hasFile('picture_game_n1')){
                // store image
                $imageName = $request->file('picture_game_n1')->getClientOriginalName();
                $request->file('picture_game_n1')->move($imagepath , $imageName);
                if($video->picture_game_n1 != ''){
                    unlink($imagepath.$video->picture_game_n1);    
                }
                $video->picture_game_n1 = $imageName;
            } if($request->hasFile('picture_game_n2')){
                // store image
                $imageName = $request->file('picture_game_n2')->getClientOriginalName();
                $request->file('picture_game_n2')->move($imagepath , $imageName);
                if($video->picture_game_n2 != ''){
                    unlink($imagepath.$video->picture_game_n2);    
                }
                $video->picture_game_n2 = $imageName;
            } if($request->hasFile('picture_game_n3')){
                // store image
                $imageName = $request->file('picture_game_n3')->getClientOriginalName();
                $request->file('picture_game_n3')->move($imagepath , $imageName);
                if($video->picture_game_n3 != ''){
                    unlink($imagepath.$video->picture_game_n3);    
                }
                $video->picture_game_n3 = $imageName;
            } if($request->hasFile('picture_game_n4')){
                // store image
                $imageName = $request->file('picture_game_n4')->getClientOriginalName();
                $request->file('picture_game_n4')->move($imagepath , $imageName);
                if($video->picture_game_n4 != ''){
                    unlink($imagepath.$video->picture_game_n4);    
                }
                $video->picture_game_n4 = $imageName;
            } if($request->hasFile('picture_game_n5')){
                // store image
                $imageName = $request->file('picture_game_n5')->getClientOriginalName();
                $request->file('picture_game_n5')->move($imagepath , $imageName);
                if($video->picture_game_n5 != ''){
                    unlink($imagepath.$video->picture_game_n5);    
                }
                $video->picture_game_n5 = $imageName;
            } if($request->hasFile('picture_game_n6')){
                // store image
                $imageName = $request->file('picture_game_n6')->getClientOriginalName();
                $request->file('picture_game_n6')->move($imagepath , $imageName);
                if($video->picture_game_n6 != ''){
                    unlink($imagepath.$video->picture_game_n6);    
                }
                $video->picture_game_n6 = $imageName;

            }

            if($request->hasFile('video_game')){
                $videoName = $request->file('video_game')->getClientOriginalName();
                $request->file('video_game')->move($videopath , $videoName);
                if($video->video_game != ''){
                    unlink($videopath.$video->video_game);    
                }
                $video->video_game = $videoName;
            }
            

        $video->save();
        return redirect('/home')->with('alert-success','Game Hasbeen Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $video = Video_Games::findOrFail($id);

        if($video->picture_game_n1 != ''){
            unlink(base_path().'/public/uploads/images/video_games/'.$video->picture_game_n1);
        } if($video->picture_game_n2 != ''){
            unlink(base_path().'/public/uploads/images/video_games/'.$video->picture_game_n2);    
        } if($video->picture_game_n3 != ''){
            unlink(base_path().'/public/uploads/images/video_games/'.$video->picture_game_n3);    
        } if($video->picture_game_n4 != ''){
            unlink(base_path().'/public/uploads/images/video_games/'.$video->picture_game_n4);    
        } if($video->picture_game_n5 != ''){
            unlink(base_path().'/public/uploads/images/video_games/'.$video->picture_game_n5);    
        } if($video->picture_game_n6 != ''){
            unlink(base_path().'/public/uploads/images/video_games/'.$video->picture_game_n6);    
        } if(file_exists(public_path().'/uploads/videos/'.$video->video_game)){
            unlink(base_path().'/public/uploads/videos/'.$video->video_game);
        } 

        
        $video->delete();

        return redirect('/home')->with('alert-danger','Game Hasbeen Deleted!');
    }

    public function deleteall(){
        $image_dir = base_path().'/public/uploads/images/video_games';
        $video_dir = base_path().'/public/uploads/videos';

        if(file_exists($video_dir)){
            array_map('unlink', glob("$video_dir/*.*"));    
            rmdir($video_dir);
        } if(file_exists($image_dir)){
            array_map('unlink', glob("$image_dir/*.*"));
            rmdir($image_dir);
        }
        
        DB::table('video_games')->delete();

        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::table('kryptonit3_counter_page')->truncate();
        // DB::table('kryptonit3_counter_page_visitor')->truncate();
        // DB::table('kryptonit3_counter_visitor')->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    
        return redirect('/home')->with('alert-danger','All Data Hasbeen Deleted Successfully!');
    }
}
