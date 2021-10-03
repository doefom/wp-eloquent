# WP Eloquent

Use Laravel's query builder "Eloquent" in any WordPress plugin.

## What is this plugin?

This plugin is meant to provide a quick start template for anyone who would like to use the Eloquent query builder
(https://github.com/illuminate/database) known from the Laravel framework in a WordPress plugin.

By installing this plugin you can start developing your own WordPress plugin with the use of Eloquent. Of course you
don't have to use Eloquent to build your queries but if you decide not to you're probably better off not using this plugin
and just querying with plain SQL.

## Prerequisites

To use this plugin you need to have:
- **composer** installed (https://getcomposer.org/)

## Installation

Clone this repository inside your WordPress installation's plugin directory. Usually this folder is located at
`/wp-content/plugins/`

After cloning the repository navigate to wp-eloquent:
```
cd wp-eloquent
```

Install dependencies:
```
composer install
```

The most important package we need for this plugin is `Illuminate Database` which will be installed by the above command.
For further information visit: https://github.com/illuminate/database

## Usage

```php
// wp-eloquent.php

use WPEloquent\App;

require plugin_dir_path(__FILE__) . 'vendor/autoload.php';
require 'App.php';

$app = new App();
$app->initEloquent();

// ----------------------------------------------------
// YOUR CODE FROM HERE
// ----------------------------------------------------

// Example: Get all posts from the table wp_posts.
$posts = \WPEloquent\Models\WPPost::all();

// Example: Get all postmeta entries from the table wp_postmeta where post_id equals 2.
$postmeta = \WPEloquent\Models\WPPostmeta::where('post_id', 2)->get();
```

## Testing this plugin

### PHPUnit

Tests for this plugin are written for **PHPUnit** (https://phpunit.de/).
By default, when running `composer install` PHPUnit is required as a dev dependency. So basically you should be good to go.

Keep in mind that tests require a database connection. So in order for the tests to work you need to provide the correct
database credentials in your `wp-config.php` file.


### Setting up the database for testing

Having enough data in the database is important for testing. Therefore, this plugin uses seeders.
New seeders can be created by using the **WP CLI** tools (https://wp-cli.org/) and additionally installing the **WP CLI Seed Command** (https://github.com/motivast/wp-cli-seed-command).

#### WP CLI

WordPress CLI is an awesome tool that let's you interact with WordPress without the need of a heavyweight UI.
We use WP CLI to install, seed and reset the database for this plugin.

#### WP CLI Seed Command (Seeding the database)

After installing the WP CLI Seed Command to seed the database run:
```
wp seed
```
You may write additional seeders for you specific project.
For now we only have seeders for the tables _wp_posts_ and _wp_postmeta_.

#### Reset the database

To reset the database by **deleting all tables in the database** run:
```
wp db reset
```

So make sure you don't accidentally run this command.

#### WordPress Core Installation

For a basic core install of WordPress run the following command:
```shell
wp core install --url=localhost:8000 --title=WordPress_Playground --admin_user=admin --admin_password=qwe123 --admin_email=example@example.org
```

This command will perform the WordPress 5 minute installation just without the UI.
Usually this command is used after resetting the database to get back to a basic WordPress installation.

You may adapt the parameters `--url`, `--title`, etc. according to your needs.

### Doing all at once (Reset DB, Core installation, Seed DB)

Run this command to completely reset your database for testing:
```
wp db reset --yes && wp core install --url=localhost:8000 --title=WordPress_Playground --admin_user=admin --admin_password=qwe123 --admin_email=example@example.org && wp seed
```

## LICENSE

This project is licensed under the MIT license.
