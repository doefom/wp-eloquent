<?php

namespace WPEloquent\Models;

use Illuminate\Database\Eloquent\Model;

class WPUser extends Model {

	protected $table = 'wp_users';
	protected $primaryId = 'ID';

	public function posts() {
		return $this->hasMany( WPPost::class, 'post_author', 'ID');
	}

	public function usermeta() {
		return $this->hasMany( WPUsermeta::class, 'user_id', 'ID' );
	}

	public function comments() {
		return $this->hasMany( WPComment::class, 'user_id', 'ID' );
	}

}
