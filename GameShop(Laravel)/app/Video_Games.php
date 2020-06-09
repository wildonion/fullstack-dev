<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video_Games extends Model
{
    protected $table = 'video_games';
    protected $fillable = ['title', 'tags', 'tagsF_User', 'titleFUser', 'meta_desc', 'meta_descF_User',
    						'picture_game_n1','picture_game_n2','picture_game_n3','picture_game_n4','picture_game_n5','picture_game_n6', 
    						'video_game', 'description', 'descriptionFUser'
    						];
}
