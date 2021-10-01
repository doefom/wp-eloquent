<?php declare( strict_types=1 );

use Dotenv\Dotenv;
use Faker\Factory;
use PHPUnit\Framework\TestCase;
use WPEloquent\App;
use WPEloquent\Models\WPPost;
use WPEloquent\Models\WPPostmeta;

require_once '../vendor/autoload.php';
require_once '../App.php';

final class WPPostTest extends TestCase {

	private static $numOfPostsToInsert = 1;

	/**
	 * @beforeClass
	 *
	 * Insert n posts.
	 */
	public static function insertPosts(): void {
		// Load dotenv
		$dotenv = Dotenv::createImmutable( __DIR__ );
		$dotenv->load();
		// Get .env variables
		$DB_HOST     = $_ENV['DB_HOST'];
		$DB_NAME     = $_ENV['DB_NAME'];
		$DB_USER     = $_ENV['DB_USER'];
		$DB_PASSWORD = $_ENV['DB_PASSWORD'];
		// Init eloquent
		$app = new App();
		$app->initEloquent( $DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD );
		// Create some posts
		$faker = Factory::create();
		for ( $i = 0; $i < self::$numOfPostsToInsert; $i ++ ) {
			// Create post
			$post = WPPost::create( [
				'post_author'           => 1,
				'post_date'             => date_create(),
				'post_content'          => $faker->text( 200 ),
				'post_title'            => $faker->text( 20 ),
				'post_excerpt'          => '',
				'to_ping'               => 1,
				'pinged'                => 1,
				'post_content_filtered' => '',
			] );
			// Create postmeta
			WPPostmeta::create( [
				'post_id'    => $post->id, // must be 'id' although custom primary key is 'ID'
				'meta_key'   => $faker->text( '8' ),
				'meta_value' => $faker->text( '8' ),
			] );
		}
	}

	public function testGetAllPosts() {
		$posts = WPPost::all();
		$this->assertGreaterThan( 0, $posts->count() );
	}

	public function testGet() {
	}

	/**
	 * @afterClass
	 *
	 * Delete the n posts we've inserted in the beforeClass method.
	 */
	public
	static function deleteInsertedPosts(): void {
		$postsToDelete = WPPost::all()->reverse()->take( self::$numOfPostsToInsert );
		var_dump( $postsToDelete->count() );
		foreach ( $postsToDelete as $post ) {
			// Delete related postmeta
			$post->postmeta()->delete();
			// Delete post
//			WPPost::where( 'ID', $post->ID )->delete();
		}
	}

}
