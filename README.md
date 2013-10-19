l4-artisan-online
=================

Run artisan commands from routes or controller. If you want run your migrations or seed a database on shared hosting environment you can create a route and put you commands like this:

----

<nowiki>

	echo '<br>init migrate:install...';
	Artisan::call('migrate:install');
	echo 'done migrate:install';
	
	echo '<br>init with Sentry tables migrations...';
	Artisan::call('migrate', ['--package'=>'cartalyst/sentry']);
	echo 'done with Sentry';

	echo '<br>init with app tables migrations...';
	Artisan::call('migrate', ['--path'=> "app/database/migrations"]);
	echo '<br>done with app tables migrations';

	echo '<br>init with Sentry tables seader...';
	Artisan::call('db:seed');
	echo '<br>done with Sentry tables seader';
</nowiki>
