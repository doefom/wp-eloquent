<?php

namespace WPEloquent\Models;

use Illuminate\Database\Eloquent\Model;

class WPTermRelationship extends Model {

	protected $table = 'wp_term_relationships';
	protected $primaryKey = 'object_id';

	public function term_taxonomy() {
		return $this->belongsTo( WPTermTaxonomy::class );
	}

}
