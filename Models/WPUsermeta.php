<?php

namespace WPEloquent\Models;

use Illuminate\Database\Eloquent\Model;

class WPUsermeta extends Model {

	protected $table = 'wp_usermeta';
	protected $primaryId = 'umeta_id';

	public function user() {
		return $this->belongsTo( WPUser::class );
	}

}
