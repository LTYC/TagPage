<?php namespace TagPage\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        Blade::extend(function($view, $compiler) {
			$pattern = $compiler->createPlainMatcher('partials');

			return preg_replace($pattern, '$1<?php if(View::exists("partials")) echo View::fetch("partials"); ?>', $view);
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        //
	}

}
