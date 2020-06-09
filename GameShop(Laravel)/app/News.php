<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'latest_news';
    protected $fillable = ['title', 'titleF_User', 'picture','description', 
     						'meta_desc', 'meta_descF_User', 'tags', 'tagsF_User'
                               , 'descriptionF_User', 'blog_video'];
    
    /**
     * Get the comments for the blog post.
    */
    public function comments(){
    	return $this->hasMany('App\Comments', 'news_ID');
    }
}
