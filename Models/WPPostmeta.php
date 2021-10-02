<?php

namespace WPEloquent\Models;

use Illuminate\Database\Eloquent\Model;

class WPPostmeta extends Model {

	public $timestamps = false;
	protected $table = 'wp_postmeta';
	protected $primaryKey = 'meta_id';
	protected $fillable = [
		'meta_id',
		'post_id',
		'meta_key',
		'meta_value',
	];

	public function post() {
		return $this->belongsTo( WPPost::class );
	}
}
