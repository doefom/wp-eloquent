<?php

namespace WPEloquent\Models;

use Illuminate\Database\Eloquent\Model;

class WPTermmeta extends Model {

	protected $table = 'wp_termmeta';
	protected $primaryId = 'meta_id';

	public function term() {
		return $this->belongsTo( WPTerm::class );
	}

}
