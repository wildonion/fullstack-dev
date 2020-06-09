<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $fillable = ['name', 'email','content', 'status','news_ID'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

     /**
      * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo('App\News', 'news_ID');
    }
}
