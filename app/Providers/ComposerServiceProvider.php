<?php
namespace App\Providers;
use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {
	public function boot() {
		View::composer('*', 'App\Http\Composers\MainComposer');
	}

	public function register() {

	}
}