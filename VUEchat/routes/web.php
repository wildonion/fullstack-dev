<?php

use App\Events\MessagePosted;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/*typing - notification - online offline status - broadcast user can't chat event - delete account feature - position of chat*/
// TODO: we have to broadcast can't chat event cause we don't want to refresh the page when this dirty thing had happened!
/*https://pusher.com/tutorials/online-presence-laravel*/





Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat', function () {
    return view('chat');
});

// Route::resource('user','UserController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('user/register', 'UserController@register');
// get stored messages
Route::get('/messages/{userId}', function($userId) {
	$authUserId = Auth::user()->id;
	$output = DB::table('messages')
		->leftJoin('users','users.id',	'=',	'messages.user_id')
		->join('receivers','receivers.message_id','=','messages.id')
		->where('messages.user_id','=',$authUserId)
		->where('receivers.user_id','=',$userId)
		->orWhere('messages.user_id','=',$userId)
		->where('receivers.user_id','=',$authUserId)
		->select('users.name as user','users.image','users.image_path','users.id as userId','messages.message','messages.file_path','messages.file_name','messages.type','messages.created_at as time','receivers.user_id as r_user_id')
		->orderBy("messages.id","asc")
		->get();
	return $output;
})->middleware('auth');


// post new messages
Route::post('/messages/{userId}', function($userId) {
	$user = Auth::user();
	$message = $user->messages()->create([
		'message'=>request()->get('message'),
		'type'=>request()->get('type'),
	]);

	$message->receivers()->create([
			'user_id'=>$userId
		]);
	// // new message has been posted
	broadcast(new MessagePosted($message,$user,$userId))->toOthers();
	$output['message'] = $message;
	$output['user'] = $user;
	return ['output'=> $output];
})->middleware('auth');


Route::post('/fileUpload/{userId}', function($userId){
	$file = request('file');
	$user = Auth::user();
	if (!empty($file)) {
        $fileName = $file->getClientOriginalName();
        // file with path
        $filePath = url('uploads/chats/'.$fileName);
        //Move Uploaded File
        $destinationPath = 'uploads/chats';
        if($file->move($destinationPath,$fileName)) {
            $request['file_path'] = $filePath;
            $request['file_name'] = $fileName;
            $request['message'] = 'file';
            $request['type'] = request('type');
        }

        $message = $user->messages()->create($request);

		$message->receivers()->create([
				'user_id'=>$userId
			]);

		$output = [];
		broadcast(new MessagePosted($message,$user,$userId))->toOthers();

		$output['message'] = $message;
		$output['user'] = $user;
		return ['output'=> $output];

    }

})->middleware('auth');

Route::get('/users', function() {
	$authUserId = Auth::user()->id;
	$users = DB::table('users')
			->where('users.id','!=',$authUserId) // you can't chat with yourself! unless u want to build a cloud like telegram ;-)
			->get();
	return $users;
})->middleware('auth');

Route::get('/offusers', function() {
	$users = DB::table('conversation')
			->where('status','off')
			->get();
	return $users;
})->middleware('auth');



Route::post('/conversation/{userId}', function($userId) {

	// $user = Auth::user();
	$user_one = request()->get('user_one');
	$user_two = $userId;

$users = DB::table('conversation')->where([
    	['user_one', '=', $user_one],
    	['user_two', '=', $user_two],
	])->orWhere([
    	['user_one', '=', $user_two],
    	['user_two', '=', $user_one],
	])->first();

if($users === null){
	$id = DB::table('conversation')->insertGetId(
    	['user_one' => $user_one, 'user_two' => $user_two]
	);
		return ['id' => $id]; // for later usages like turn status on/off for two users

  } else{return ['id' => "no id need!"];}


})->middleware('auth');