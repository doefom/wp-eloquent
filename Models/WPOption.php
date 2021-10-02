<?php

namespace WPEloquent\Models;

use Illuminate\Database\Eloquent\Model;

class WPOption extends Model {

	protected $table = 'wp_options';
	protected $primaryKey = 'option_id';

}
