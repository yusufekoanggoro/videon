<?php
namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Movie;

class DestroyMovieCommand extends Command implements SelfHandling {
	public $id;

	public function __construct($id) {
		$this->id = $id;
	}

	public function handle() {
		return Movie::where('id', $this->id)->delete();
	}
}