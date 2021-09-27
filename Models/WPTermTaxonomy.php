<?php

namespace WPEloquent\Models;

use Illuminate\Database\Eloquent\Model;

class WPTermTaxonomy extends Model {

	protected $table = 'wp_term_taxonomy';
	protected $primaryId = 'term_taxonomy_id';

	public function term_relationships() {
		return $this->hasMany( WPTermRelationship::class, 'term_taxonomy_id', 'ID' );
	}

	public function term() {
		return $this->belongsTo( WPTerm::class );
	}

}
