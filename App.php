<?php

namespace WPEloquent;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

require_once 'models/WPComment.php';
require_once 'models/WPCommentmeta.php';
require_once 'models/WPLink.php';
require_once 'models/WPOption.php';
require_once 'models/WPPost.php';
require_once 'models/WPPostmeta.php';
require_once 'models/WPTerm.php';
require_once 'models/WPTermmeta.php';
require_once 'models/WPTermRelationship.php';
require_once 'models/WPTermTaxonomy.php';
require_once 'models/WPUser.php';
require_once 'models/WPUsermeta.php';

class App {

	/**
	 * Initialise the Eloquent query builder.
	 * Follow the instructions of the official documentation for more information: https://github.com/illuminate/database
	 */
	public function initEloquent($DB_HOST = DB_HOST, $DB_NAME = DB_NAME, $DB_USER = DB_USER, $DB_PASSWORD = DB_PASSWORD) {
		$capsule = new Capsule;
		$capsule->addConnection( [
			'driver'    => 'mysql',
			'host'      => $DB_HOST,
			'database'  => $DB_NAME,
			'username'  => $DB_USER,
			'password'  => $DB_PASSWORD,
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
