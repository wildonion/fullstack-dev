<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Comments;
use App\Video_Games;

class CommentsManagmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show all comments with papgeination
        $comments = DB::table('comments')->orderBy('id', 'desc')->paginate(5);
        return view('AdminDashboard.ShowComments', compact('comments'));
    }

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // show a single comment in order to update/edit that
        $comment = Comments::find($id);
        return view('AdminDashboard.EditComment', compact('comment'));

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
        // edit/update a comment
        $this->validate($request, [
            'comment_description' => 'required'
        ]); 

        $comment = Comments::findOrFail($id);
        $comment->content = $request->input('comment_description');

        $comment->save();
        return redirect()->route('comments.edit', ['id' => $id])->with('alert-success','Comments Hasbeen Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete a comment
        $comment = Comments::findOrFail($id);
        $comment->delete();
        return redirect('/home')->with('alert-danger','Comments Hasbeen Deleted!');
    }

    public function updatestatus(Request $request, $id){
        $comment = Comments::findOrFail($id);
        $comment->status = 1;
        $comment->save();
        return redirect()->route('comments.edit', ['id' => $id]);
    }

    public function truncate(){
        DB::table('comments')->truncate();
        return redirect('/home')->with('alert-danger','Table Truncated Successfully!');
    }
}
