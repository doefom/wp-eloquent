<?php

namespace WPEloquent\Models;

use Illuminate\Database\Eloquent\Model;

class WPCommentmeta extends Model {

	protected $table = 'wp_commentmeta';
	protected $primaryKey = 'meta_id';

	public function comment() {
		return $this->belongsTo( WPComment::class );
	}

}
