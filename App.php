<?php

namespace WPEloquent;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

require 'Models/WPComment.php';
require 'Models/WPCommentmeta.php';
require 'Models/WPLink.php';
require 'Models/WPOption.php';
require 'Models/WPPost.php';
require 'Models/WPPostmeta.php';
require 'Models/WPTerm.php';
require 'Models/WPTermmeta.php';
require 'Models/WPTermRelationship.php';
require 'Models/WPTermTaxonomy.php';
require 'Models/WPUsermeta.php';
require 'Models/WPUsermeta.php';

class App {

	/**
	 * Initialise the Eloquent query builder.
	 * Follow the instructions of the official documentation for more information: https://github.com/illuminate/database
	 */
	public function initEloquent() {
		$capsule = new Capsule;
		$capsule->addConnection( [
			'driver'    => 'mysql',
			'host'      => DB_HOST,
			'database'  => DB_NAME,
			'username'  => DB_USER,
			'password'  => DB_PASSWORD,
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		] );
		// Set the event dispatcher used by Eloquent models... (optional)
		$capsule->setEventDispatcher( new Dispatcher( new Container ) );
		// Make this Capsule instance available globally via static methods... (optional)
		$capsule->setAsGlobal();
		// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
		$capsule->bootEloquent();
	}

}
