<?php

use Motivast\WP_CLI\Seed\AbstractSeeder;
use Faker\Factory;

class Posts extends AbstractSeeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// Setup defaults for posts
		$defaults = [
			'post_type'   => 'post',
			'post_status' => 'publish',
		];
		// Create faker instance
		$faker = Factory::create();
		for ( $i = 0; $i < 10; $i ++ ) {
			// Insert post
			$postId = wp_insert_post( wp_parse_args( [
				'post_title'   => $faker->realText( 20 ),
				'post_content' => $faker->realText( 50 ),
			], $defaults ) );
			// Add postmeta
			add_post_meta( $postId, $faker->text( '5' ), $faker->text( 5 ) );
		}
	}
}
