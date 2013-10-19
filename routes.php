<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Setup route example
Route::get('/myapp/install/{key?}',  array('as' => 'install', function($key = null)
{
	if($key == "appSetup_key"){
		try {

			echo '<br>init migrate:install...';
			Artisan::call('migrate:install');
			echo 'done migrate:install';
			
			echo '<br>init with Sentry tables migrations...';
			Artisan::call('migrate', [
				'--package'=>'cartalyst/sentry'
				]);
			echo 'done with Sentry';


			echo '<br>init with app tables migrations...';
			Artisan::call('migrate', [
				'--path'     => "app/database/migrations"
				]);
			echo '<br>done with app tables migrations';

			echo '<br>init with Sentry tables seader...';
			Artisan::call('db:seed');
			echo '<br>done with Sentry tables seader';

		} catch (Exception $e) {
			Response::make($e->getMessage(), 500);
		}
	}else{
		App::abort(404);
	}
}
}));

