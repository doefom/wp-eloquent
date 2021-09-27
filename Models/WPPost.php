<?php

namespace WPEloquent\Models;

use Illuminate\Database\Eloquent\Model;

class WPPost extends Model {

	protected $table = 'wp_posts';
	protected $primaryId = 'ID';

	public function postmeta() {
		return $this->hasMany( WPPostmeta::class, 'post_id', 'ID' );
	}

	public function user() {
		return $this->belongsTo( WPUser::class );
	}

	public function term_relationships() {
		return $this->hasMany( WPTermRelationship::class, 'object_id', 'ID' );
	}

}
