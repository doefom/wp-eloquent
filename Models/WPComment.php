<?php

namespace WPEloquent\Models;

use Illuminate\Database\Eloquent\Model;

class WPComment extends Model {

	protected $table = 'wp_comments';
	protected $primaryId = 'comment_ID';

	public function user() {
		return $this->belongsTo( WPUser::class );
	}

	public function commentmeta() {
		return $this->hasMany( WPCommentmeta::class, 'comment_id', 'ID' );
	}

}
