<?php

namespace WPEloquent\Models;

use Illuminate\Database\Eloquent\Model;

class WPPost extends Model {

	public $timestamps = false;
	protected $table = 'wp_posts';
	protected $primaryId = 'ID';
	protected $fillable = [
		'post_author',
		'post_date',
		'post_date_gmt',
		'post_content',
		'post_title',
		'post_excerpt',
		'post_status',
		'comment_status',
		'ping_status',
		'post_password',
		'post_name',
		'to_ping',
		'pinged',
		'post_modified',
		'post_modified_gmt',
		'post_content_filtered',
		'post_parent',
		'guid',
		'menu_order',
		'post_type',
		'post_mime_type',
		'comment_count',
	];

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
