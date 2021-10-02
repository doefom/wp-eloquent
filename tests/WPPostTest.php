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

	/**
	 * @beforeClass
	 *
	 * Init eloquent
	 */
	public static function insertPosts(): void {
		// Load dotenv
		$dotenv = Dotenv::createImmutable( __DIR__ );
		$dotenv->load();
		// Get .env variables. We use .env variables because the wp-config variables are not loaded when running tests.
		$DB_HOST     = $_ENV['DB_HOST'];
		$DB_NAME     = $_ENV['DB_NAME'];
		$DB_USER     = $_ENV['DB_USER'];
		$DB_PASSWORD = $_ENV['DB_PASSWORD'];
		// Init eloquent
		$app = new App();
		$app->initEloquent( $DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD );
	}

	public function testGetAllPosts() {
		$posts = WPPost::all();
		$this->assertGreaterThan( 0, $posts->count() );
	}

	public function testGetPostWithPostMeta() {
		$post = WPPost::find( 2 ); // Post with ID = 2 is in wp core installation by default and has postmeta value.
		$this->assertGreaterThan( 0, $post->postmeta->count() );
	}

	public function testInsertPost() {
		$post = $this->insertPost();
		$this->assertNotFalse($post);
		$post->delete();
	}

	public function testUpdatePost() {
		// Insert post
		$post = $this->insertPost();
		$this->assertNotFalse($post);
		// Update post
		$newTitle = "Updated Title";
		$post->post_title = $newTitle;
		$post->save();
		$this->assertEquals($newTitle, $post->post_title);
		// Delete post
		$post->delete();
	}

	public function testDeletePost() {
		// Insert post
		$post = $this->insertPost();
		$this->assertNotFalse($post);
		// Delete post
		$post->delete();
		$postDeleted = WPPost::where( 'ID', $post->ID )->first();
		$this->assertNull($postDeleted);
	}

	public function testInsertPostAndPostmeta() {
		// Create post
		$post = $this->insertPost();
		$this->assertNotFalse($post);
		// Add postmeta
		$post->postmeta()->save( new WPPostmeta([ 'meta_key' => 'some_key', 'meta_value' => 'some_value' ]) );
		$this->assertEquals( 1, $post->postmeta->count() );
		// Delete postmeta
		$post->postmeta()->delete();
		// Delete post
		$post->delete();
	}

	private function insertPost() {
		return WPPost::create( [
			'post_author'           => 1,
			'post_date'             => date_create(),
			'post_content'          => 'This is a test post and its content.',
			'post_title'            => 'Test post title',
			'post_excerpt'          => '',
			'to_ping'               => 1,
			'pinged'                => 1,
			'post_content_filtered' => '',
		] );
	}

}
