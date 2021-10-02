<?php

use Motivast\WP_CLI\Seed\AbstractSeeder;

require_once __DIR__ . '/../vendor/autoload.php'; // Note: Necessary to use faker
require_once __DIR__ . '/Posts.php';

class Seeder extends AbstractSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $this->call( Posts::class );
    }
}
