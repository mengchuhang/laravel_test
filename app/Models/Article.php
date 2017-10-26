<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	public $table = 'article';

	public function user()
	{
		return $this->belongsTo('App\User', 'uid');
	}
}
