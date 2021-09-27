<?php

namespace WPEloquent\Models;

use Illuminate\Database\Eloquent\Model;

class WPPostmeta extends Model {

	protected $table = 'wp_postmeta';
	protected $primaryId = 'meta_id';

	public function post() {
		return $this->belongsTo( WPPost::class );
	}
}
