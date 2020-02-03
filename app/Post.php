<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  //  use SoftDeletes,
  //  Eloquence,
 //   DatePresenter;

protected $dates = ['deleted_at'];

protected $fillable = ['body', 'image', 'user_id'];

protected $searchableColumns = ['body'];

public function user()
{
  return $this->belongsTo('App\User');
}

public function comments()
{
  return $this->hasMany('App\Comment');
}
}
