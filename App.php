<?php

namespace WPEloquent;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

require_once 'Models/WPComment.php';
require_once 'Models/WPCommentmeta.php';
require_once 'Models/WPLink.php';
require_once 'Models/WPOption.php';
require_once 'Models/WPPost.php';
require_once 'Models/WPPostmeta.php';
require_once 'Models/WPTerm.php';
require_once 'Models/WPTermmeta.php';
require_once 'Models/WPTermRelationship.php';
require_once 'Models/WPTermTaxonomy.php';
require_once 'Models/WPUser.php';
require_once 'Models/WPUsermeta.php';

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
