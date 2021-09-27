<?php

namespace WPEloquent\Models;

use Illuminate\Database\Eloquent\Model;

class WPTerm extends Model {

	protected $table = 'wp_terms';
	protected $primaryId = 'term_id';

	public function term_taxonomy() {
		return $this->hasMany( WPTermTaxonomy::class, 'term_id', 'term_id' );
	}

	public function termmeta() {
		return $this->hasMany( WPTermmeta::class, 'term_id', 'term_id' );
	}

}
